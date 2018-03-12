<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use App\Module;
use App\Lesson;
use App\Course;
use Exception;
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

    public function create(Request $request, $course_id, $module_id)
    {

        try{    //Catch on getting the lesson creation page

            $module = Module::find($module_id);

            return view('lessons.create', compact('course_id', 'module'));

        }catch(Exception $e){

            $request::session()->flash('status', 'Something went wrong preparing to create a new lesson. Try again');
            $request::session()->flash('status-icon', 'fa fa-cube');
            $request::session()->flash('type', 'danger');

            return back();
        
        } 

    }

    public function show(Request $request, $course_id, $module_id, $lesson_id)
    {

        try{    //Catch on getting the lesson

            $lesson = Lesson::find($lesson_id);
            $module = Module::find($module_id);
            
            //if(Auth::user()->hasRole('client')){
                Auth::user()->lessonViews()->attach($lesson_id); 
            //}
            
            if($lesson->video_uri){
                $status = Vimeo::request('/videos/'.str_replace('/videos/', '', $lesson->video_uri).'?fields=status')['body']['status'];
            }else{
                $status = 'empty';
            }
            
            return view('lessons.show', compact('course_id', 'module', 'lesson', 'status'));

        }catch(Exception $e){
        
            $request::session()->flash('status', 'Something went wrong trying to get the lesson. Try again');
            $request::session()->flash('status-icon', 'fa fa-cube');
            $request::session()->flash('type', 'danger');

            return back();
        
        }

    }  

    public function video(Request $request, $course_id, $module_id, $lesson_id)
    {

        try{    //catching on getting the lesson videos
            
            $lesson = Lesson::find($lesson_id);
            $videos = Vimeo::request('/me/videos', ['per_page' => 10], 'GET')['body']['data']; 

            return view('videos.index', compact('lesson', 'course_id', 'module_id', 'lesson_id','videos'));

        }catch(Exception $e){    //something went wrong deleting the course

            $request::session()->flash('status', 'Something went wrong trying to get video list. Try again');
            $request::session()->flash('status-icon', 'fa fa-film');
            $request::session()->flash('type', 'danger');

            return redirect('/courses/'.$course_id.'/edit');
        
        }

    }   

    public function store(Request $request, $course_id, $module_id)
    {

        $validator = $request::validate([
            'title' => 'required',
            'overview' => 'required'
        ]);

        try{    //catching lesson creation, user notification

            $module = Module::findOrFail($module_id);

            $uploadLesson = $module->lessons()->create([
                                'title' => $request::input('title'),
                                'overview' => $request::input('overview'),
                                'notes' => $request::input('notes')
                            ]);

            $course = Course::find($course_id);

            if($uploadLesson){
                Auth::user()->notify(new LessonCreated($uploadLesson, $course));
            }

            $request::session()->flash('status', 'Lesson created successfully!');
            $request::session()->flash('status-icon', 'fa fa-check');
            $request::session()->flash('type', 'success');

            return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$uploadLesson->id.'/video');

        }catch(Exception $e){    //something went wrong uploading image

            $request::session()->flash('status', 'Something went wrong uploading the lesson. Try again');
            $request::session()->flash('status-icon', 'fa fa-cloud-upload');
            $request::session()->flash('type', 'danger');

            return back()->withInput();
        
        } 

    }

    public function videoUpload(Request $request, $course_id, $module_id, $lesson_id)
    {

        try{     //catch video upload to lesson

            $lesson = Lesson::find($lesson_id)->update([
                        'video_uri' => $request::input('video')
                    ]);

            $lesson = Lesson::find($lesson_id);

            Auth::user()->notify(new VideoAssigned( $lesson, $request::input('name') ));

            $request::session()->flash('status', 'Video uploaded to lesson successfully!');
            $request::session()->flash('status-icon', 'fa fa-check');
            $request::session()->flash('type', 'success');

            return redirect('/courses/'.$course_id.'/edit');

        }catch(Exception $e){    //something went wrong uploading image

            $request::session()->flash('status', 'Something went wrong uploading the video to lesson. Try again');
            $request::session()->flash('status-icon', 'fa fa-cloud-upload');
            $request::session()->flash('type', 'danger');

            return back()->withInput();
        
        } 
    }

    public function notesImageUpload(Request $request, $course_id, $module_id, $lesson_id)
    {

        return 'uploading...';
    }


    public function edit(Request $request, $course_id, $module_id, $lesson_id)
    {

        try{    //Catch when getting the edited course

            $lesson = Lesson::find($lesson_id);
            $module = Module::find($module_id);
            
            if($lesson->video_uri){
                $status = Vimeo::request('/videos/'.str_replace('/videos/', '', $lesson->video_uri).'?fields=status')['body']['status'];
            }else{
                $status = 'empty';
            }
            
            return view('lessons.edit', compact('course_id', 'module', 'lesson', 'status'));
        
        }catch(Exception $e){

            $request::session()->flash('status', 'Something went wrong preparing to edit the lesson. Try again');
            $request::session()->flash('status-icon', 'fa fa-cube');
            $request::session()->flash('type', 'danger');

            return back();
        
        }   

    }

    public function update(Request $request, $course_id, $module_id, $lesson_id)
    {

        $validator = $request::validate([
            'title' => 'required',
            'overview' => 'required'
        ]);

        try{    //catching lesson creation, user notification

            $lesson = Lesson::find($lesson_id)->update([
                        'title' => $request::input('title'),
                        'overview' => $request::input('overview'),
                        'notes' => $request::input('notes')
                    ]);

            if($lesson){
                Auth::user()->notify(new LessonUpdated(Lesson::find( $lesson_id )));
            }

            $request::session()->flash('status', 'Lesson updated successfully!');
            $request::session()->flash('status-icon', 'fa fa-check');
            $request::session()->flash('type', 'success');

            return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/edit');

        }catch(Exception $e){    //something went wrong uploading image

            $request::session()->flash('status', 'Something went wrong updating the lesson. Try again');
            $request::session()->flash('status-icon', 'fa fa-refresh');
            $request::session()->flash('type', 'danger');

            return back()->withInput();
        
        } 
    }

    public function removeVideo(Request $request, $course_id, $module_id, $lesson_id)
    {

        try{    //catching on removing video from lesson
            
            $lesson = Lesson::find($lesson_id)->update([
                        'video_uri' => ''
                    ]);

            $request::session()->flash('status', 'Lesson video removed successfully!');
            $request::session()->flash('status-icon', 'fa fa-check');
            $request::session()->flash('type', 'success');

            //Auth::user()->notify(new LessonTrashed( Lesson::find($lesson_id) ));

            return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/edit');

        }catch(Exception $e){    //something went wrong deleting the course

            $request::session()->flash('status', 'Something went wrong trying to remove the lesson video. Try again');
            $request::session()->flash('status-icon', 'fa fa-film');
            $request::session()->flash('type', 'danger');

            return back();
        
        } 

    }

    public function delete(Request $request, $course_id, $module_id, $lesson_id)
    {

        try{    //catching course on delete

            Auth::user()->notify(new LessonTrashed( Lesson::find($lesson_id) ));
            
            Lesson::find($lesson_id)->delete();

            $request::session()->flash('status', 'Lesson deleted successfully!');
            $request::session()->flash('status-icon', 'fa fa-trash');
            $request::session()->flash('type', 'success');

            return redirect('/courses/'.$course_id.'/edit');

        }catch(Exception $e){    //something went wrong deleting the course

            $request::session()->flash('status', 'Something went wrong trying to delete the lesson. Try again');
            $request::session()->flash('status-icon', 'fa fa-trash');
            $request::session()->flash('type', 'danger');

            return back();
        
        } 

    }

}
