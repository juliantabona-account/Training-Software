<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Request;
use Storage;
use App\Course;
use App\Module;
use Exception;
use Vinkla\Vimeo\Facades\Vimeo;
use Illuminate\Support\Facades\Input;
use App\Notifications\CourseCreated;
use App\Notifications\CourseUpdated;
use App\Notifications\CourseTrashed;
use Illuminate\Support\Facades\Validator;

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

        try{

            if( Auth::user()->hasRole('client') ){

                $courses = Auth::user()->courses;

            }else{

                $courses = Course::orderBy('created_at', 'desc')->get();

            }

            return view('courses.index', compact('courses'));

        }catch(Exception $e){

            return view('error.connection_fail');
        
        }     

    }

    public function enroll(Request $request)
    {

        try{

            $courses = Course::orderBy('created_at', 'desc')->get();
            $client_id = $request::input('client-id');
            
            return view('courses.enroll', compact('courses', 'client_id'));

        }catch(Exception $e){

            return view('error.connection_fail');
        
        }    

    }

    public function show($course_id)
    {
        //try{
            $course = Course::find($course_id);
            //$modules = Course::find($course_id)->moduleWithLessons()->get();
            //$modules = Course::find($course_id)->modules()->get();

            $modules = Course::find($course_id)->modules()->with(array('lessons'=>function($query){
                $query->with(array('tests'=>function($query){
                    $query->with('reports');
                }));
            }))->get();

            $video_uris = [];
            $totalLessons = 0;

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

            $totalLessons = collect($modules)->map(function ($module) use ($video_uris) {

                return COUNT($module->lessons);

            })->sum();

            $viewedLessons = array_unique(collect(Auth::user()->lessonViews)->map(function ($viewedLesson){

                                return $viewedLesson->pivot->lesson_id;

                            })->toArray());

            $totalTests = collect($modules)->map(function ($module) {

                return collect($module->lessons)->map(function ($lesson) {
                    return COUNT($lesson->tests);
                })->sum();

            })->sum();

        //}catch(Exception $e){
        //    return view('error.connection_fail');
        //}

        return view('courses.show', compact('course','modules', 'videos', 'viewedLessons', 'totalLessons', 'totalTests'));
    }

    public function create()
    {

        try{

            return view('courses.create');

        }catch(Exception $e){

            return view('error.connection_fail');
        
        } 

    }    

    public function store(Request $request)
    {

        $request::session()->forget('status');

        $validator = $request::validate([
            'title' => 'required',
            'overview' => 'required',
        ]);

        $image_name = '';

        if(Input::file())
        {

            $validator = $request::validate([
                'upload' => 'required | mimes:jpeg,jpg,png | max:2000'
            ]);

            try{    //catching image resize and upload

                $image = Input::file('upload');
                
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

            }catch(Exception $e){    //something went wrong uploading image

                $request::session()->flash('status', 'Something went wrong uploading the image. Try again');
                $request::session()->flash('status-icon', 'fa fa-cloud-upload');
                $request::session()->flash('type', 'danger');

                return back()->withInput();
            
            } 

        }

        try{    //catching course creation, user notification and emailing process

            $course = Course::create([
                        'title' => $request::input('title'),
                        'overview' => $request::input('overview'),
                        'announcement' => 'Welcome to "' . $request::input('title') . '". Complete lessons in their order to unlock other modules.',
                        'img' => $image_name
                    ]);

            $module = Module::create([
                        'title' => 'Introduction'
                    ]);

            $course->modules()->sync($module);

            Auth::user()->notify(new CourseCreated($course));

            $request::session()->flash('status', 'Course created successfully!');
            $request::session()->flash('status-icon', 'fa fa-check');
            $request::session()->flash('type', 'success');

            return redirect()->route('course-list'); 

        }catch(Exception $e){    //something went wrong uploading image

            $request::session()->flash('status', 'Something went wrong creating the course. Try again');
            $request::session()->flash('type', 'danger');

            return back()->withInput();
        
        }   

    }

    public function edit($course_id)
    {
        try{
            $course = Course::find($course_id);
            //$modules = Course::find($course_id)->moduleWithLessons()->get();
            $modules = Course::find($course_id)->modules()->get();

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
        }catch(Exception $e){

            return view('error.connection_fail');
        
        }        

        return view('courses.edit', compact('course','modules', 'videos', 'moduleCount', 'lessonCount'));
    }

    public function update(Request $request, $course_id)
    {

        $request::session()->forget('status');

        $filename = '';
        $image_name = '';

        $validator = $request::validate([
            'title' => 'required',
            'overview' => 'required'
        ]);

        if(Input::file())
        {

            $validator = $request::validate([
                'upload' => 'required | mimes:jpeg,jpg,png | max:2000'
            ]);

            try{    //catching image resize and upload

                $old_image_path = str_replace(env('AWS_URL'), '', $request::input('current-course-image'));

                if(Storage::disk('s3')->exists( $old_image_path )) {
                    Storage::disk('s3')->delete( $old_image_path );
                }

                $image = Input::file('upload');
                
                Image::make($image->getRealPath())->widen(318, function ($constraint) {
                    $constraint->upsize();
                })->crop(318, 180, 0, 0);

                $image_name = 'courses/crs_'.time().uniqid().'.'.$image->guessClientExtension();
                
                Storage::disk('s3')->put($image_name, file_get_contents($image), 'public');

                $image_name = env('AWS_URL').$image_name;

            }catch(Exception $e){    //something went wrong uploading image

                $request::session()->flash('status', 'Something went wrong uploading the image. Try again');
                $request::session()->flash('status-icon', 'fa fa-cloud-upload');
                $request::session()->flash('type', 'danger');

                return back()->withInput();
            
            } 

        }

        if($image_name == ''){
            $image_name = $request::input('upload');
        }



        try{    //catching course update and user notification

            $course = Course::find($course_id)->update([
                        'title' => $request::input('title'),
                        'overview' => $request::input('overview'),
                        'announcement' => $request::input('announcement'),
                        'img' => $image_name
                    ]);

            //Get The New Module Arrangement

            $arrangement = json_decode( $request::input('lesson_arrangement') , true );

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

            Auth::user()->notify(new CourseUpdated(Course::find($course_id))); 

            $request::session()->flash('status', 'Course changes saved!');
            $request::session()->flash('status-icon', 'fa fa-check');
            $request::session()->flash('type', 'success');

            return redirect('/courses/'.$course_id.'/edit');

        }catch(Exception $e){    //something went wrong uploading image

            $request::session()->flash('status', 'Something went wrong trying to save the course. Try again');
            $request::session()->flash('status-icon', 'fa fa-floppy-o');
            $request::session()->flash('type', 'danger');

            return back()->withInput();
        
        } 

    }

    public function delete(Request $request, $course_id)
    {

        try{    //catching course on delete

            $course = Course::find($course_id);

            $image = str_replace(env('AWS_URL'), '', $course->img);

            if(Storage::disk('s3')->exists( $image )) {
                Storage::disk('s3')->delete( $image );
            }

            Auth::user()->notify(new CourseTrashed($course));

            $course->delete();

            $request::session()->flash('status', 'Course deleted successfully!');
            $request::session()->flash('status-icon', 'fa fa-trash');
            $request::session()->flash('type', 'success');

            return redirect()->route('course-list');

        }catch(Exception $e){    //something went wrong deleting the course

            $request::session()->flash('status', 'Something went wrong trying to delete the course. Try again');
            $request::session()->flash('status-icon', 'fa fa-trash');
            $request::session()->flash('type', 'danger');

            return back();
        
        }      

    }


}
