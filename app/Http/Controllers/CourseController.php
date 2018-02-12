<?php

namespace App\Http\Controllers;

use Image;
use Request;
use Storage;
use App\Course;
use App\Module;
use Vinkla\Vimeo\Facades\Vimeo;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filter = $request::input('filter');
        
        if(isset($filter) && !empty($filter)){
            $courses = Course::where('state', $filter)->orderBy('created_at', 'desc')->get();
        }else{
            $courses = Course::orderBy('created_at', 'desc')->get();
        }      

        $published_counter = Course::where('state', 'published')->orderBy('created_at', 'desc')->count();
        $draft_counter = Course::where('state', 'draft')->orderBy('created_at', 'desc')->count();

        return view('courses.index', compact('courses', 'published_counter', 'draft_counter', 'filter'));
    }

    public function enroll(Request $request)
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        $client_id = $request::input('client-id');
        
        return view('courses.enroll', compact('courses', 'client_id'));
    }

    public function show($course_id)
    {
        $course = Course::find($course_id);
        $modules = Course::find($course_id)->moduleWithLessons()->get();

        $video_uris = [];

        $video_uris = collect($modules)->map(function ($module) use ($video_uris) {

            return collect($module->lessons)->map(function ($topic) {
                return $topic->video_uri;
            });

        })->flatten(1);

        $video_uris = implode(',', array_filter(collect($video_uris)->toArray()));

        if(!empty($video_uris)){
        	$videos = Vimeo::request('/videos?uris='.$video_uris)['body']['data'];
        }else{
        	$videos = [];
        }
        

        return view('courses.show', compact('course','modules', 'videos'));
    }

    public function create()
    {
        return view('courses.create');
    }    

    public function store(Request $request)
    {

        $image_name = '';

        if(Input::file())
        {

            $image = Input::file('course-image');
            
            Image::make($image->getRealPath())->widen(318, function ($constraint) {
                $constraint->upsize();
            })->crop(318, 180, 0, 0);

            if($image->guessClientExtension() == 'jpeg' || $image->guessClientExtension() == 'jpg'){
                
                Image::make($image)->encode('jpg', 60);
            
            }else if($image->guessClientExtension() == 'png'){
                
                Image::make($image)->encode('png', 60);
            
            }

            $image_name = 'courses/crs_'.time().uniqid().'.'.$image->guessClientExtension();
            
            Storage::disk('s3')->put($image_name, file_get_contents($image), 'public');

            $image_name = env('AWS_URL').$image_name;
        }


        $course = Course::create([
	                'title' => $request::input('course-title'),
	                'overview' => $request::input('course-overview'),
	                'announcement' => 'Welcome to "' . $request::input('course-title') . '". Complete lessons in their order to unlock other modules.',
        		    'img' => $image_name
                ]);

        $module = Module::create([
	                'title' => 'Introduction'
        		]);

        $course->modules()->sync($module);

        return redirect()->route('course-list');
    }

    public function edit($course_id)
    {
        $course = Course::find($course_id);
        $modules = Course::find($course_id)->moduleWithLessons()->get();

        $moduleCount = $course->modules->count();
        $lessonCount = $course->modules->reduce(function ($count, $module) {
            return $count + $module->lessons->count();
        }, 0);

        $video_uris = [];

        $video_uris = collect($modules)->map(function ($module) use ($video_uris) {

            return collect($module->lessons)->map(function ($topic) {
                return $topic->video_uri;
            });

        })->flatten(1);

        $video_uris = implode(',', array_filter(collect($video_uris)->toArray()));

        if(!empty($video_uris)){
        	$videos = Vimeo::request('/videos?uris='.$video_uris)['body']['data'];
        }else{
        	$videos = [];
        }
        

        return view('courses.edit', compact('course','modules', 'videos', 'moduleCount', 'lessonCount'));
    }

    public function update(Request $request, $course_id)
    {

        $filename = '';
        $image_name = '';

        if(Input::file())
        {
            $old_image_path = str_replace(env('AWS_URL'), '', $request::input('current-course-image'));

            if(Storage::disk('s3')->exists( $old_image_path )) {
                Storage::disk('s3')->delete( $old_image_path );
            }

            $image = Input::file('course-image');
            
            Image::make($image->getRealPath())->widen(318, function ($constraint) {
                $constraint->upsize();
            })->crop(318, 180, 0, 0);

            $image_name = 'courses/crs_'.time().uniqid().'.'.$image->guessClientExtension();
            
            Storage::disk('s3')->put($image_name, file_get_contents($image), 'public');

            $image_name = env('AWS_URL').$image_name;

        }



        $course = Course::find($course_id)->update([
	                'title' => $request::input('course-title'),
	                'overview' => $request::input('course-overview'),
	                'announcement' => $request::input('course-announcement'),
                    'img' => $image_name
        		]);

        //Get The New Module Arrangement
        $arrangement = json_decode( $request::input('arrangement') , true );

        //If We Have A New Arrangement Lets Continue 
        if(isset($arrangement) && !empty($arrangement)){
	        //For Each Module Lets Save The New Arrangement
	        for($x = 0; $x < $arrangement['length']; $x++){

	            //Get The Lesson IDS
	            $lesson_ids  = $arrangement[$x]['lesson_ids'];

	            //Find The Associated Module
	            $module = Module::find($arrangement[$x]['module_id']);

	            //If The Module Has Lessons Lets Continue
	            if(COUNT($lesson_ids)){

	                //Map Out The New Lesson Positions
	                $positions = json_decode( collect( range(1, count($lesson_ids)) )->map(function ($position) {
	                    return array('position' => $position);
	                }) , true );

	                //Pair Each Lesson With Its Position
	                $syncData  = array_combine($lesson_ids, $positions);

	                //return $syncData;

	                $module->lessons()->sync($syncData);

	            }else{
	            	//If The Module Has No Lessons Then Lets Clear 

	                $module->lessons()->sync([]);

	            }

	        }
        } 

        return redirect('/courses/'.$course_id.'/edit');
    }

    public function delete($course_id)
    {

        $course = Course::find($course_id);

        $image = str_replace(env('AWS_URL'), '', $course->img);

        if(Storage::disk('s3')->exists( $image )) {
            Storage::disk('s3')->delete( $image );
        }

        $course->delete();

        return redirect()->route('course-list');
    }


}
