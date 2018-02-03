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
        $tests = Test::where('lesson_id', $lesson_id)->get();

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

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/tests/'.$test->id.'/edit');
    }

    public function edit($course_id, $module_id, $lesson_id, $test_id)
    {
        $test = Test::find($test_id);

        return view('tests.edit', compact('course_id', 'module_id', 'lesson_id', 'test'));
    }

}
