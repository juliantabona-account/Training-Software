<?php

namespace App\Http\Controllers;

use Request;
use App\Module;
use App\Lesson;
use Vinkla\Vimeo\Facades\Vimeo;

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

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$uploadLesson->id.'/video');
    }

    public function videoUpload(Request $request, $course_id, $module_id, $lesson_id)
    {

        //Upload Lesson Details

        $lesson = Lesson::find($lesson_id)->update([
                    'video_uri' => $request::input('video')
                ]);

        return redirect('/courses/'.$course_id.'/edit');
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

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/edit');
    }

    public function delete($course_id, $module_id, $lesson_id)
    {
        Lesson::find($lesson_id)->delete();

        return redirect('/courses/'.$course_id.'/edit');
    }

}
