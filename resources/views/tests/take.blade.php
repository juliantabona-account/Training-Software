@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">

    <style>

        li{
            list-style-type: none !important;
        }

        .question-number-tag {
            color: #111;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #ffc107;
            position: absolute;
            top: 0px;
            left: 13px;
        }

        .multiple-choice-toolbox{
            opacity: 0.2 !important;
        }

        .form-check-label:hover > .multiple-choice-toolbox{
            opacity: 1 !important;
        }

        .correct-answer-mark{
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-10-2 res-brs-t res-brs-lg-t-n res-brs-b">

        <div class="container-fluid res-pt-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 offset-lg-3 pt-1 pt-lg-0">
                            <h2 class = "res-text-8 res-text-md-6 res-text-lg-3">
                                <i class="fa fa fa-file-text-o"></i>
                                <span>{{ $test->title }}</span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-6 offset-sm-2 col-md-4 offset-md-4 offset-lg-2 col-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests" class="btn btn-sm res-button app-red-btn float-right ml-2">
                                <i class="fa fa-file-text-o res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">View Tests</span>
                            </a>
                            @if(Auth::user()->hasRole('admin'))
                                <a href = "/courses/{{ $course_id }}/edit" class="btn btn-sm res-button app-red-btn float-right">
                                    <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                    <span class = "res-text-9">Lessons</span>
                                </a>
                            @else
                                <a href = "/courses/{{ $course_id }}" class="btn btn-sm res-button app-red-btn float-right">
                                    <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                    <span class = "res-text-9">Lessons</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid res-mt-lg-10-5 res-mb-lg-10-10">

        @if(Auth::user()->hasRole('admin'))
            <div class="row">

                <div class="col-lg-11">
                    <a href="/courses/{{$course_id}}/edit" data-toggle="tooltip" title="" data-original-title="Stop preview and return to Edit Mode" class="btn btn-danger float-right">
                        <i aria-hidden="true" class="fa fa-eye-slash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i> 
                        <span class="res-text-9 res-text-sm-7 res-text-md-9">Exit Preview Mode</span>
                    </a>
                        <a href="/courses/{{ $course_id }}" data-toggle="tooltip" title="" data-original-title="Go back to previewing the course" class="btn btn-primary float-right mr-2">
                                <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Go Back</span>
                        </a>
                </div>

            </div>

            <div class="row ml-3 mr-3 pt-5 pb-5 preview-border">
        @else     
            <div class="row">
        @endif
            <div class="col-lg-7 res-ml-lg-10-15">

                <div class = "row">

                    <div class = "col-12 mb-4">
                        <span class="question-count-tracker float-right p-1 pl-3 ml-2 res-brs-l">{{ COUNT($test->marking_key) == 1 ? COUNT($test->marking_key) . ' Question': COUNT($test->marking_key) . ' Questions' }}</span>
                        <button type="button" class="btn btn-secondary btn-sm mr-2 collapse-lessons-btn float-right">
                            <i aria-hidden="true" class="fa fa-minus-circle res-text-9 res-text-sm-7 res-text-md-9"></i> 
                            <span class="res-text-9 res-text-sm-7 res-text-md-9">Collapse Questions</span>
                        </button>
                    </div>

                    <div class = "col-lg-12 master-path-guideline res-ml-lg-10-2">

                        @if(Session::has('status'))
                            <div class="alert alert-{{ Session::get('type') }}" role="alert">
                                <span class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa fa-file-text-o mr-1"></i> {{ Session::get('status') }}</span>
                                <button type="button" class="close mt-2 d-block res-text-9 res-text-sm-9 res-text-md-9" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="alert alert-info">
                            <p class = "m-0">{{ $test->notes }}</p>
                        </div>

                        <div class = "module-row res-pl-10-1 pt-4"> 

                            <div class = "module-path-guideline"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>

                            <div class = "module-content res-pl-10-2">

                                <ul class="list-group draggable"> 

                                    @foreach($test->marking_key as $key => $main)
                                    
                                        @if($main['type'] == "truefalse")

                                            <li class = "question-box">
                                                <input class = "question-type" type = "hidden" value = "truefalse">
                                                <div class="lesson-row">
                                                    <input class="avail_lesson" type="hidden" value="31">
                                                    <div class="lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="desc table-content">
                                                                    <span class="question-number-tag res-text-9 res-text-sm-8 res-text-md-9">Question {{ $key+ 1 }} </span>
                                                                    <div class="lesson-content">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <textarea name="question" placeholder="Enter question..." required="required" class="question form-control mt-4 res-text-9 res-text-sm-8 res-text-md-9">{{ $main['question'] }}</textarea>
                                                                                </div>
                                                                                @if($curentReport != '')
                                                                                    <div class="form-check abc-radio abc-radio-success form-check-inline ml-2">
                                                                                        <input class="form-check-input" type="radio" id="question{{ $key+1 }}" value="true" name="question{{ $key+3 }}" {{ $curentReport['sheet'][$key]['answers'][0] ? 'checked':'' }}>
                                                                                        <label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="question{{ $key+1 }}"> True </label>
                                                                                    </div>
                                                                                    <div class="form-check abc-radio abc-radio-success form-check-inline">
                                                                                        <input class="form-check-input" type="radio" id="question{{ $key+2 }}" value="false" name="question{{ $key+3 }}" {{ $curentReport['sheet'][$key]['answers'][1] ? 'checked':'' }}>
                                                                                        <label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="question{{ $key+2 }}"> False </label>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="form-check abc-radio abc-radio-success form-check-inline ml-2">
                                                                                        <input class="form-check-input" type="radio" id="question{{ $key+1 }}" value="true" name="question{{ $key+3 }}">
                                                                                        <label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="question{{ $key+1 }}"> True </label>
                                                                                    </div>
                                                                                    <div class="form-check abc-radio abc-radio-success form-check-inline">
                                                                                        <input class="form-check-input" type="radio" id="question{{ $key+2 }}" value="false" name="question{{ $key+3 }}">
                                                                                        <label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="question{{ $key+2 }}"> False </label>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <?php

                                                                    if(COUNT($test->reports)){

                                                                        $correct_order = collect($main['answers']);

                                                                        $client_order = collect($test['reports'][0]['sheet'][$key]['answers']);


                                                                        if($correct_order == $client_order){  
                                                                            $mark_result = true;
                                                                        }else{  
                                                                            $mark_result = false;
                                                                        }

                                                                    }
                                                                ?>

                                                                @if(COUNT($test->reports) && $mark_result)
                                                                
                                                                    <i aria-hidden="true" class="fa fa-check res-text-5 text-success correct-answer-mark"></i>                                                                
                                                                @elseif(COUNT($test->reports) && !$mark_result)

                                                                    <i aria-hidden="true" class="fa fa-close res-text-5 text-danger correct-answer-mark"></i>                                                                

                                                                @endif
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>

                                        @elseif($main['type'] == "multiplechoice")
                                            <li class = "question-box">
                                                <input class = "question-type" type = "hidden" value = "multiplechoice">
                                                <div class="lesson-row">
                                                    <input class="avail_lesson" type="hidden" value="31">
                                                    <div class="lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="desc table-content">
                                                                    <span class="question-number-tag res-text-9 res-text-sm-8 res-text-md-9">Question {{ $key+ 1 }} </span> 
                                                                    <div class="lesson-content">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <textarea name="question" placeholder="Enter question..." required="required" class="question form-control mt-4 res-text-9 res-text-sm-8 res-text-md-9">{{ $main['question'] }}</textarea>
                                                                                </div>
                                                                                <div class = "questions-option-box">
                                                                                    @foreach($main['answers'] as $key2 => $answer)
                                                                                        @if($curentReport != '')
                                                                                        <div class="form-check abc-radio abc-radio-success ml-2">
                                                                                            <input class="form-check-input" type="radio" id="questionChoiceText{{ $key }}{{ $key2 }}" value="true" name="questionChoiceText{{ $key }}{{ $key2 }}" {{ $curentReport['sheet'][$key]['answers'][$key2]['correct'] ? 'checked':'' }}>
                                                                                            <label class="form-check-label res-text-9 res-text-sm-9 res-text-md-9" for="questionChoiceText{{ $key }}{{ $key2 }}">{{ $answer['choice'] }}</label>
                                                                                        </div>
                                                                                        @else
                                                                                            <div class="form-check abc-radio abc-radio-success ml-2">
                                                                                                <input class="form-check-input" type="radio" id="questionChoiceText{{ $key }}{{ $key2 }}" value="true" name="questionChoiceText{{ $key }}{{ $key2 }}">
                                                                                                <label class="form-check-label res-text-9 res-text-sm-9 res-text-md-9" for="questionChoiceText{{ $key }}{{ $key2 }}">{{ $answer['choice'] }}</label>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <?php
                                                                    if(COUNT($test->reports)){
                                                                        $correct_order = collect($main['answers'])->map(function ($possible_answer) {
                                                                            
                                                                            return $possible_answer['correct'];

                                                                        });

                                                                        $client_order = collect($test['reports'][0]['sheet'][$key]['answers'])->map(function ($possible_answer) {
                                                                            
                                                                            return $possible_answer['correct'];

                                                                        });


                                                                        if($correct_order == $client_order){  
                                                                            $mark_result = true;
                                                                        }else{  
                                                                            $mark_result = false;
                                                                        }
                                                                    }
                                                                ?>


                                                                @if(COUNT($test->reports) && $mark_result)
                                                                
                                                                    <i aria-hidden="true" class="fa fa-check res-text-5 text-success correct-answer-mark"></i>                                                                
                                                                @elseif(COUNT($test->reports) && !$mark_result)

                                                                    <i aria-hidden="true" class="fa fa-close res-text-5 text-danger correct-answer-mark"></i>                                                                

                                                                @endif
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>

                                        @endif

                                    @endforeach

                                </ul>
                            </div>

                        </div>   

                    </div>
                </div>
            </div>

            <div class = "col-lg-3">
                <form action = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/{{ $test->id }}/mark" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class = "question_arrangement" type = "hidden" name = "question_arrangement" value = "{{ $test->marking_key }}">
                    <input class = "arrangement_state" type = "hidden" name = "arrangement_state" value = "0">
                    <div class="card ml-3 mt-0">
                        <div class="card-header">
                            <div class = "row">
                                <div class = "col-lg-12"> 
                                    <h2 class = "res-text-6 mt-1">Overview</h2>
                                    @if( COUNT($test->reports) )
                                        <h3 class = "res-text-9 mt-1 float-right"><i class="fa fa-repeat"></i> Test Revisions: {{ COUNT($test->reports) - 1 }}</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                            @if( COUNT($test->reports) )
                                @if( $score != $currentscore )
                                    <div class="alert alert-warning" role="alert">
                                        <span class = "res-text-9 res-text-sm-9 res-text-md-8"><i class="fa fa-filter mr-1"></i> Highest Score </span>
                                    
                                        <div class="progress">
                                          <div class="progress-bar bg-warning" style="width:{{ $score }}%">{{ $score }}%</div>
                                        </div>
                                    </div>
                                @endif
                                <div class="alert alert-info" role="alert">
                                    <span class = "res-text-9 res-text-sm-9 res-text-md-8"><i class="fa fa-filter mr-1"></i> Current Score</span>
                                    <div class="progress">
                                      <div class="progress-bar" style="width:{{ $currentscore }}%">{{ $currentscore }}%</div>
                                    </div>
                                </div>

                                <p class = "res-text-9 badge{{ $currentscore > 80 ? ' badge-success': ' badge-warning' }}">
                                    Status: {{ $currentscore > 80 ? 'Passed': 'Fail' }}
                                    @if($currentscore > 80)
                                        <i aria-hidden="true" class="fa fa-check"></i>
                                    @endif
                                </p>
                                <p class = "res-text-9">{{ $currentscore > 80 ? 'You passed the test. You may now proceed with the rest of the course material': 'You failed the test. You need to retry until your Current Score is 100%' }}</p>
                            @else
                                <i class="d-block fa fa-info-circle mb-2 mr-1 pb-2 res-brs-b"></i>
                                <div class="alert alert-warning" role="alert">
                                    <p class = "res-text-9 res-text-sm-9 res-text-md-8">Answer all question and submit the test.</p>
                                </div>

                            @endif

                        </div>

                        <div class="card-footer">
                            @if(COUNT($test->reports) && $currentscore > 80)

                                <a href = "/courses/{{ $course_id }}" class="btn btn-sm res-button app-red-btn float-right">
                                    <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                    <span class = "res-text-9">Back To Lessons</span>
                                </a>

                            @else

                                <button type = "submit" class="btn res-button app-red-btn float-right pr-5 pl-5">
                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Submit Answers</span>
                                </button>
                        
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection