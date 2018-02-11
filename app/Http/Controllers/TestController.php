<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use App\Test;
use App\Lesson;

class TestController extends Controller
{

    public function index(Request $request, $course_id, $module_id, $lesson_id)
    {
        $tests = Test::where('lesson_id', $lesson_id)->orderBy('created_at', 'desc')->get();

        return view('tests.index', compact('tests', 'course_id', 'module_id', 'lesson_id'));
    }

    public function create(Request $request, $course_id, $module_id, $lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        return view('tests.create', compact('course_id', 'module_id', 'lesson_id', 'lesson'));
    }

    public function store(Request $request, $course_id, $module_id, $lesson_id)
    {

        //Upload Test Details

        $marking_key = json_decode( $request::input('arrangement') , true )[0];
        $marking_key = array_slice($marking_key, 0, $marking_key['length']);

        $test = Test::create([
                    'title' => $request::input('question-title'),
                    'notes' => $request::input('question-notes'),
                    'marking_key' => $marking_key,
                    'user_id' => Auth::user()->id,
                    'lesson_id' => $lesson_id
                ]);

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/tests');
    }

    public function edit($course_id, $module_id, $lesson_id, $test_id)
    {
        $test = Test::find($test_id);

        return view('tests.edit', compact('course_id', 'module_id', 'lesson_id', 'test'));
    }

    public function update(Request $request, $course_id, $module_id, $lesson_id, $test_id)
    {

        //Upload Test Details

        if( $request::input('arrangement_state') == 1 ){
    
            $marking_key = json_decode( $request::input('arrangement') , true )[0];
            $marking_key = array_slice($marking_key, 0, $marking_key['length']);

        }else{
            
            $marking_key = json_decode( $request::input('arrangement') , true );

        }

        $test = Test::find($test_id)->update([
                    'title' => $request::input('question-title'),
                    'notes' => $request::input('question-notes'),
                    'marking_key' => $marking_key,
                    'user_id' => Auth::user()->id,
                    'lesson_id' => $lesson_id
                ]);
        
        $request::session()->flash('status', ' Test updated successfully!');
        $request::session()->flash('type', 'warning');

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/tests/'.$test_id.'/edit');
    }

    public function delete($course_id, $module_id, $lesson_id, $test_id)
    {

        $test = Test::find($test_id);

        $test->delete();

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/tests');
    }

}
