<?php

namespace App\Http\Controllers;

use Request;
use App\Course;
use App\Lesson;
use App\Module;
use Vinkla\Vimeo\Facades\Vimeo;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function uploadVideo(Request $request, $course_id, $module_id)
    {

        if(Request::hasFile('video_clip')){

            //Upload Video

            $video_clip = Request::file('video_clip');
            $uploaded_video = Vimeo::upload($video_clip);

            if($uploaded_video){
                
                //Upload Lesson Details

                $module = Module::findOrFail($module_id);

                $uploadLesson = $module->lessons()->create([
                                    'title' => $request::input('lesson-title'),
                                    'overview' => $request::input('lesson-overview'),
                                    'video_uri' => $uploaded_video
                                ]);

                return redirect('/courses/'.$course_id.'/add');
            }
        }
    }

    public function edit($course_id)
    {
        $course = Course::find($course_id);
        $modules = Course::find($course_id)->moduleWithLessons()->get();


        $video_uris = [];

        $video_uris = collect($modules)->map(function ($module) use ($video_uris) {

            return collect($module->lessons)->map(function ($topic) {
                return $topic->video_uri;
            });

        })->flatten(1)->implode(',');

        $videos = Vimeo::request('/videos?uris='.$video_uris)['body']['data'];

        return view('admin.courses.edit', compact('course','modules', 'videos'));
    }

    public function show()  //preview course
    {
        return view('admin.courses.show');
    }

    public function editLesson()
    {
        return view('admin.courses.lesson.edit');
    }

    public function createLesson($course_id, $module_id)
    {
        return view('admin.courses.lesson.create', compact('course_id', 'module_id'));
    }

    public function addLessson($course_id)
    {
        $course = Course::find($course_id);
        $modules = Course::find($course_id)->moduleWithLessons()->get();

        return view('admin.courses.lesson.add', compact('course','modules'));
    }

    public function saveArrangement(Request $request, $course_id)
    {
        //Get The New Module Arrangement
        $arrangement = json_decode( $request::input('arrangement') , true );

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

                $module->lessons()->sync([]);

            }

        } 

        return redirect('/courses/'.$course_id.'/add');
    }

    public function displayLesson()
    {
        return view('users.courses.lesson.show');
    }

}
