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

        .error-image{
            display: block !important;
            margin-left: auto !important;
            margin-right: auto !important;
            width: 100% !important;
            height: auto !important;
            padding: 25% 40% !important;
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

                        <div class="col-2 offset-2">
                            <a href = "/courses/{{ $course->id }}/edit" class="btn res-button app-red-btn">
                                <i class="fa fa-pencil res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Edit Course</span>
                            </a>
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
                                                                                <div class = "col-lg-6"> 
                                                                                    <div class="m-t-sm">
                                                                                        <a href="#" class="text-muted res-text-lg-9 mr-3"><i class="fa fa-file-text-o"></i> Take Test</a>
                                                                                        <span class="badge badge-success mb-1">Completed!</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td class="desc table-action">
                                                                        
                                                                        <a href="/courses/1/lessons/1" class="btn res-button app-white-btn res-mt-lg-10-4 float-right">
                                                                            <i aria-hidden="true" class="fa fa-play-circle res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Start Lesson</span>
                                                                        </a>  

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
                              <div class="progress-bar progress-bar-striped" style="width:40%">40%</div>
                            </div>
                        </div>

                    </div>

                    <div class="card ml-3 mt-0">
                        <div class="card-header">
                            <div class = "row">
                                <div class = "col-lg-12"> 
                                    <h2 class = "res-text-8 mt-1">
                                        <i class="fa fa-bullhorn mr-1" aria-hidden="true"></i>
                                        <span>Announcements</span>
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
