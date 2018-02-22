<?php

namespace App\Http\Controllers;

use Auth;
use Request;
use App\Test;
use App\Lesson;
use App\Report;

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

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/take');
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

    public function taketest($course_id, $module_id, $lesson_id, $test_id)
    {
        $test = Test::where('id',$test_id)->with(array('reports'=>function($query){
            $query->orderBy('created_at', 'desc');
        }))->first();

        $score=0;  
       $currentscore=0;

        foreach ($test->reports as $key => $report) { 

            if($key==0){  
                $currentscore=$report->test_score;
            }
        
            if($report->test_score > $score){  

                    $score=$report->test_score; 
                   
            }
        }  


        return view('tests.take', compact('course_id', 'module_id', 'lesson_id', 'test','score','currentscore'));
    }

    public function markTest(Request $request, $course_id, $module_id, $lesson_id, $test_id)
    {

        $submittion = json_decode( $request::input('arrangement') , true )[0];
        $submittion = array_slice($submittion, 0, $submittion['length']); 

        $marking_key = Test::find($test_id)->marking_key;
        $correct_count = 0;
        $wrong_count = 0;
        $report = [];

        foreach($marking_key as $key => $value){

            $question = $value['question'];

            if($value['type'] == 'multiplechoice'){

                $correct_order = collect($value['answers'])->map(function ($possible_answer) {
                    
                    return $possible_answer['correct'];

                });

                $client_order = collect($submittion[$key]['answers'])->map(function ($possible_answer) {
                    
                    return $possible_answer['correct'];

                });

            }else{

                $correct_order = $value['answers'];

                $client_order = $submittion[$key]['answers'];            

            }

            if($correct_order==$client_order){   
                $correct_count++;
                array_push($report, 'correct');
            }else{ 
                $wrong_count++;
                array_push($report, 'Wrong');
            }
        }


        $test_score =  $correct_count/($correct_count + $wrong_count) * 100;

        $report = Report::create([
                    'client_id' => Auth::user()->id,
                    'test_id' => $test_id,
                    'sheet' => $submittion,
                    'test_score' => $test_score
                ]);

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/tests/'.$test_id);
    }

    public function delete($course_id, $module_id, $lesson_id, $test_id)
    {

        $test = Test::find($test_id);

        $test->delete();

        return redirect('/courses/'.$course_id.'/module/'.$module_id.'/lesson/'.$lesson_id.'/tests');
    }

}
