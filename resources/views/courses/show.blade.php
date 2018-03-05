@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        body.dragging, body.dragging * {
          cursor: move !important;
        }

        .dragged {
          position: absolute;
          opacity: 0.5;
          z-index: 2000;
        }
        ul.draggable{
            min-height: 100px;
            list-style: none;
        }
        ul.draggable li{
            cursor: move;
        }
        ul.draggable li.placeholder {
          position: relative;
          /** More li styles **/
        }
        ul.draggable li.placeholder:before {
          position: absolute;
          /** Define arrowhead **/
        }

        img.course-image{
            display: none;
            height: 180px; 
            width: 100%; 
            background: linear-gradient(#128067, #179a7c);
        }

        .error-image{
            margin-left: auto !important;
            margin-right: auto !important;
            width: 100% !important;
            height: auto !important;
            padding: 25% 43% !important;
        }

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">

        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">
                                <i class="fa fa-crosshairs"></i>
                                <span>{{ $course->title }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid res-mt-lg-10-5 res-mb-lg-10-10">
        <form action = "/courses/{{ $course->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-lg-7 res-ml-lg-10-15">

                    <div class = "row">

                        <div class = "col-6 offset-6 mb-4">
                            <button type="button" class="btn btn-secondary btn-sm collapse-lessons-btn float-right">
                                <i aria-hidden="true" class="fa fa-minus-circle res-text-9 res-text-sm-7 res-text-md-9"></i> 
                                <span class="res-text-9 res-text-sm-7 res-text-md-9">Collapse Lessons</span>
                            </button>
                            <button type="button" class="btn btn-secondary btn-sm collapse-modules-btn float-right mr-2">
                                <i aria-hidden="true" class="fa fa-minus-circle res-text-9 res-text-sm-7 res-text-md-9"></i> 
                                <span class="res-text-9 res-text-sm-7 res-text-md-9">Collapse Modules</span>
                            </button>
                        </div>

                        <div class = "col-lg-12 master-path-guideline res-ml-lg-10-2">
                            @php
                                
                                $totalPassedTests = 0;

                            @endphp
                            @foreach($modules as $mod_num => $module)

                                @if($loop->last)
                                    <div class = "module-row res-pl-10-1 res-pb-lg-10-5"> 
                                @else
                                    <div class = "module-row res-pl-10-1"> 
                                @endif 

                                        <h2 class = "module-row-title res-text-6 col-md-12 mb-4">
                                            Module <span class = "module-spotter-num">{{ $mod_num + 1 }}</span>: {{ $module->title }}
                                            <span class="module-lesson-counter float-right">{{ COUNT($module->lessons) }}</span>
                                        </h2>

                                        <div class = "module-path-guideline"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>

                                        <div class = "module-content res-pl-10-2">

                                            @if(COUNT($module->lessons))

                                                @foreach($module->lessons as $les_num => $lesson)

                                                    <div class = "lesson-row">
                                                        <div class = "lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="100" class = "table-video">

                                                                        @foreach($videos as $video)
                                                                            @if($video['uri'] == $lesson->video_uri)
                                                                                
                                                                                <img class="mt-3" alt="{{ $lesson->title }}" 
                                                                                     src="{{ $video['pictures']['sizes'][0]['link'] }}"  
                                                                                     style="width: 100px;"
                                                                                     img-died="video">

                                                                            @endif
                                                                        @endforeach

                                                                    </td>
                                                                    <td class="desc table-content">
                                                                        
                                                                        <h4 class="card-title res-mt-lg-10-1 res-text-md-8">Lesson <span class = "lesson-module-spotter-num">{{ $mod_num + 1 }}</span>.<span class = "lesson-spotter-num">{{ $les_num }}</span> {{ $lesson->title }}</h4>
                                                                        <div class="lesson-content">
                                                                            <p class="res-text-9">{{ $lesson->overview }}</p>

                                                                            <div class = "row lesson-editor">
                                                                                <div class = "col-lg-12">  

                                                                                    <div class="m-t-sm"> 

                                                                                        @if( in_array($lesson->id, collect($viewedLessons)->toArray()) )
                                                                                            <span class="badge badge-success mb-1"><i aria-hidden="true" class="fa fa-check"></i> Viewed</span>
                                                                                        @else
                                                                                            <span class="badge badge-secondary mb-1"><i aria-hidden="true" class="fa fa-eye"></i> Not Viewed</span>
                                                                                        @endif

                                                                                        @if(COUNT($lesson->tests))

                                                                                            @php
                                                                                                
                                                                                                $testStatus = true;
                                                                                                $testCompleted = 0;

                                                                                            @endphp

                                                                                            @foreach($lesson->tests as $test)
                                                                                                @foreach($test->reports as $report)
                                                                                                     @if($loop->last && $report->test_score == 100)
                                                                                                        @php ($testCompleted += 1)
                                                                                                        @php ($totalPassedTests += 1)
                                                                                                     @else
                                                                                                        @php ($testStatus = false)
                                                                                                     @endif
                                                                                                @endforeach
                                                                                            @endforeach

                                                                                            @if($testCompleted == COUNT($lesson->tests))
                                                                                                <span class="badge badge-success mb-1"><i aria-hidden="true" class="fa fa-check"></i> Passed Tests {{ $testCompleted }}/{{ COUNT($lesson->tests) }}</span>
                                                                                            @elseif($testCompleted < COUNT($lesson->tests))
                                                                                                <span class="badge badge-warning mb-1">Passed Tests {{ $testCompleted }}/{{ COUNT($lesson->tests) }}</span>
                                                                                            @endif

                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td class="desc table-action">
                                                                        <a href="/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}" class="btn res-button app-white-btn res-mt-lg-10-4 float-right">
                                                                            <i aria-hidden="true" class="fa fa-play-circle res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                            @if( in_array($lesson->id, collect($viewedLessons)->toArray()) )
                                                                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Review Lesson</span>
                                                                            @else
                                                                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Start Lesson</span>
                                                                            @endif
                                                                        </a>  

                                                                        @if(COUNT($lesson->tests) && $testCompleted == COUNT($lesson->tests)) 
                                                                            <a href="/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}/tests" class="badge badge-success res-text-lg-9 mr-3 mt-4">
                                                                                <i class="fa fa-file-text-o"></i> Test Results
                                                                            </a>
                                                                        @elseif(COUNT($lesson->tests) && $testCompleted < COUNT($lesson->tests))
                                                                            <a href="/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}/tests" class="badge badge-primary res-text-lg-9 mr-3 mt-4">
                                                                                <i class="fa fa-file-text-o"></i> Take Test
                                                                            </a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                @endforeach

                                            @else

                                                <div class="alert alert-warning no-lessons pt-4 pb-4" role="alert">
                                                    <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                                    <span>No Lessons For Module {{ $mod_num + 1 }}</span>
                                                </div>                                        

                                            @endif 
                                            @if(COUNT($module->lessons))
                                                <div class="alert alert-info no-lessons pt-3 pb-3 mb-5" role="alert">
                                                    <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i>
                                                    <span>End Of Module {{ $mod_num + 1 }}</span>
                                                </div> 
                                            @endif
                                        </div>

                                         @if($loop->last)
                                            <div class = "module-path-end-guideline">
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                <p class="res-text-9 res-text-sm-7 res-text-md-9 mb-2">Done</p>
                                            </div>  
                                         @endif 
                                    </div>                        
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class = "col-lg-3">
                    <div class="card ml-3 mt-0 mb-2">

                        <div class="card-body">
                            <h2 class = "res-text-8 mt-1">
                                <i class="fa fa-flag mr-1" aria-hidden="true"></i>
                                <span>Course Progress</span>
                            </h2>
                            <div class="progress">


                                

                                <div class="progress-bar progress-bar-striped" style="width:{{ round(((COUNT($viewedLessons) + $totalPassedTests) / ($totalLessons+$totalTests)) *100) }}%">
                                    {{ round(((COUNT($viewedLessons) + $totalPassedTests) / ($totalLessons+$totalTests)) *100) }}%
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card ml-3 mt-0">
                        <div class="card-header">
                            <div class = "row">
                                <div class = "col-lg-12"> 
                                    <h2 class = "res-text-8 mt-1">
                                        <i class="fa fa-bullhorn mr-1" aria-hidden="true"></i>
                                        <span>Announcement</span>
                                    </h2>
                                </div> 
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="res-text-9">{{ $course->announcement }}</p>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn res-button app-red-btn float-right">
                                <i class="fa fa-question-circle res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Ask Question</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')

    <script src="{{asset('js/jquery-sortable/jquery-sortable.js')}}"></script> 

@endsection
