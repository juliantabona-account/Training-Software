@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">

    <style>

        .dragged {
          position: absolute;
          opacity: 0.5;
          z-index: 2000;
        }
        ul.draggable{
            min-height: 100px;
            list-style: none;
        }

        ul.draggable li.placeholder {
          position: relative;
          /** More li styles **/
        }
        ul.draggable li.placeholder:before {
          position: absolute;
          /** Define arrowhead **/
        }

         /** Define arrowhead **/
        .draggable .placeholder:before {
            content: "";
            width: 0;
            height: 0;
            margin-top: -8px;
            left: -5px;
            top: -4px;
            border-top: 5px solid transparent;
            border-right: 15px solid transparent;
            border-left: 15px solid transparent;
            border-bottom: 5px solid transparent;
            border-left-color: red;
            border-right: none;
        }

        .dragger-btn{
            cursor: move !important;
            z-index: 100;
            position: absolute;
            right: 5px;
            top: 0px;
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
                                <span>Edit Test</span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-6 offset-sm-2 col-md-4 offset-md-4 offset-lg-2 col-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests" class="btn btn-sm res-button app-red-btn float-right ml-2">
                                <i class="fa fa-file-text-o res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">View Tests</span>
                            </a>
                            <a href = "/courses/{{ $course_id }}/edit" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Lessons</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid res-mt-lg-10-5 res-mb-lg-10-10">

        <div class="row">
            <div class="col-lg-7 res-ml-lg-10-15">

                <div class = "row">

                    <div class = "col-12 mb-4">
                        <span class="question-count-tracker float-right p-1 pl-3 ml-2 res-brs-l">{{ COUNT($test->marking_key) == 1 ? COUNT($test->marking_key) . ' Question': COUNT($test->marking_key) . ' Questions' }}</span>
                        <button type="button" class="btn app-red-btn btn-sm collapse-lessons-btn float-right">
                            <i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9"></i> 
                            <span class="res-text-9 res-text-sm-7 res-text-md-9">Add Question</span>
                        </button>
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
                                                                    <i class="btn fa fa-arrows dragger-btn" aria-hidden="true"></i>
                                                                    <div class="lesson-content">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <textarea name="question" placeholder="Enter question..." required="required" class="question form-control mt-4 res-text-9 res-text-sm-8 res-text-md-9">{{ $main['question'] }}</textarea>
                                                                                </div>
                                                                                <div class="form-check abc-radio abc-radio-success form-check-inline ml-2">
                                                                                    <input class="form-check-input" type="radio" id="question{{ $key+1 }}" value="true" name="question{{ $key+3 }}" {{ $main['answers'][0] ? 'checked':'' }}>
                                                                                    <label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="question{{ $key+1 }}"> True </label>
                                                                                </div>
                                                                                <div class="form-check abc-radio abc-radio-success form-check-inline">
                                                                                    <input class="form-check-input" type="radio" id="question{{ $key+2 }}" value="false" name="question{{ $key+3 }}" {{ $main['answers'][1] ? 'checked':'' }}>
                                                                                    <label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="question{{ $key+2 }}"> False </label>
                                                                                </div>
                                                                                <button type="button" class="add-multiple-choice-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">
                                                                                    <i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>Multiple Choice
                                                                                </button> 
                                                                                <button type="button" class="add-true-false-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">
                                                                                    <i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>True/False
                                                                                </button>                                                                     
                                                                                <button type="button" class="delete-question-btn btn btn-sm btn-danger res-pl-10-1 float-right res-text-9 res-text-sm-8 res-text-md-9">
                                                                                    <i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
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
                                                                    <i class="btn fa fa-arrows dragger-btn" aria-hidden="true"></i>
                                                                    <div class="lesson-content">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <textarea name="question" placeholder="Enter question..." required="required" class="question form-control mt-4 res-text-9 res-text-sm-8 res-text-md-9">{{ $main['question'] }}</textarea>
                                                                                </div>
                                                                                <div class = "questions-option-box">
                                                                                    @foreach($main['answers'] as $key2 => $answer)
                                                                                        <div class="form-check abc-radio abc-radio-success ml-2">
                                                                                            <input class="form-check-input" type="radio" id="questionChoiceText{{ $key }}{{ $key2 }}" value="true" name="questionChoiceText{{ $key }}{{ $key2 }}" {{ $answer['correct'] ? 'checked':'' }}>
                                                                                            <label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="questionChoice{{ $key }}{{ $key2 }}">
                                                                                                <input type="text" id = "questionChoice{{ $key }}{{ $key2 }}" name="questionChoice{{ $key }}" value = "{{ $answer['choice'] }}" placeholder="Enter option 1" required="required" class="multiple-choice-option d-inline-block form-control res-text-9 res-text-md-9 res-text-sm-8 w-50">
                                                                                                <div class = "multiple-choice-toolbox d-inline">
                                                                                                    <button type="button" class="btn btn-sm delete-multiple-choice-option-btn btn-danger ml-2 res-pl-10-1 res-text-9 res-text-sm-8 res-text-md-9">
                                                                                                        <i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                                                    </button>
                                                                                                    <button type="button" class="btn btn-sm add-multiple-choice-option-btn btn-success res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">
                                                                                                        <i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                             </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class = "pt-2 mt-3 res-brs-t">
                                                                                    <button type="button" class="add-multiple-choice-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">
                                                                                        <i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>Multiple Choice
                                                                                    </button>
                                                                                    <button type="button" class="add-true-false-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">
                                                                                        <i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>True/False
                                                                                    </button>                                                                  
                                                                                    <button type="button" class="delete-question-btn btn btn-sm btn-danger res-pl-10-1 float-right res-text-9 res-text-sm-8 res-text-md-9">
                                                                                        <i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
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
                <form action = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/{{ $test->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input class = "question_arrangement" type = "hidden" name = "question_arrangement" value = "{{ $test->marking_key }}">
                    <input class = "arrangement_state" type = "hidden" name = "arrangement_state" value = "0">
                    <div class="card ml-3 mt-0">
                        <div class="card-header">
                            <div class = "row">
                                <div class = "col-lg-6"> 
                                    <h2 class = "res-text-6 mt-1">Overview</h2>
                                </div>
                                <div class = "col-lg-6"> 
                                    <a href = "/courses/{{ $course_id }}" target="_blank" class="btn res-button app-white-btn float-right">
                                        <i aria-hidden="true" class="fa fa-eye res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Preview</span>
                                    </a> 
                                </div> 
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="question-title">Test Heading</label>
                                <textarea id = "question-title" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "question-title" rows="2" required>{{ $test->title }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="question-notes">Test Notes</label>
                                <textarea id = "question-notes" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "question-notes" rows="4" required>{{ $test->notes }}</textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type = "submit" class="btn res-button app-red-btn float-right pr-5 pl-5">
                                <i class="fa fa-floppy-o res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection