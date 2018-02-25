<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use App\Module;
use App\Lesson;
use App\Course;
use Vinkla\Vimeo\Facades\Vimeo;
use App\Notifications\LessonCreated;
use App\Notifications\LessonUpdated;
use App\Notifications\LessonTrashed;
use App\Notifications\VideoAssigned;

class LessonController extends Controller
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

    public function create($course_id, $module_id)
    {
    	$module = Module::find($module_id);

        return view('lessons.create', compact('course_id', 'module'));
    }

    public function show($course_id, $module_id, $lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        $module = Module::find($module_id);
        
        Auth::user()->lessonViews()->attach($lesson_id);
        
        if($lesson->video_uri){
            $status = Vimeo::request('/videos/'.str_replace('/videos/', '', $lesson->video_uri).'?fields=status')['body']['status'];
        }else{
            $status = 'empty';
        }
        
        return view('lessons.show', compact('course_id', 'module', 'lesson', 'status'));
    }  

    public function video($course_id, $module_id, $lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        $videos = Vimeo::request('/me/videos', ['per_page' => 10], 'GET')['body']['data'];
        //return $videos;
        return view('videos.index', compact('lesson', 'course_id', 'module_id', 'lesson_id','videos'));
    }   

    public function store(Request $request, $course_id, $module_id)
    {

        //Upload Lesson Details

        $module = Module::findOrFail($module_id);

        $uploadLesson = $module->lessons()->create([
                            'title' => $request::input('lesson-title'),
                            'overview' => $request::input('lesson-overview'),
                            'notes' => $request::input('lesson-notes')
                        ]);

        $course = Course::find($course_id);

        if($uploadLesson){
            Auth::user()->notify(new LessonCreated($uploadLesson, $course));
        }

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$uploadLesson->id.'/video');
    }

    public function videoUpload(Request $request, $course_id, $module_id, $lesson_id)
    {

        //Upload Lesson Details

        $lesson = Lesson::find($lesson_id)->update([
                    'video_uri' => $request::input('video')
                ]);

        $lesson = Lesson::find($lesson_id);

        Auth::user()->notify(new VideoAssigned( $lesson, $request::input('name') ));

        return redirect('/courses/'.$course_id.'/edit');
    }

    public function notesImageUpload(Request $request, $course_id, $module_id, $lesson_id)
    {

        return 'uploading...';
    }


    public function edit($course_id, $module_id, $lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        $module = Module::find($module_id);
        
        if($lesson->video_uri){
            $status = Vimeo::request('/videos/'.str_replace('/videos/', '', $lesson->video_uri).'?fields=status')['body']['status'];
        }else{
            $status = 'empty';
        }
        
        return view('lessons.edit', compact('course_id', 'module', 'lesson', 'status'));
    }

    public function update(Request $request, $course_id, $module_id, $lesson_id)
    {
        $lesson = Lesson::find($lesson_id)->update([
                    'title' => $request::input('lesson-title'),
                    'overview' => $request::input('lesson-overview'),
                    'notes' => $request::input('lesson-notes')
                ]);

        if($lesson){
            Auth::user()->notify(new LessonUpdated(Lesson::find( $lesson_id )));
        }

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/edit');
    }

    public function delete($course_id, $module_id, $lesson_id)
    {
        Auth::user()->notify(new LessonTrashed( Lesson::find($lesson_id) ));
        
        Lesson::find($lesson_id)->delete();

        return redirect('/courses/'.$course_id.'/edit');
    }

}
