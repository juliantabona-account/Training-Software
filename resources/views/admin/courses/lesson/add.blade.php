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
                            <button class="btn res-button app-red-btn">
                                <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Add Module</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid res-mt-lg-10-5 res-mb-lg-10-10">
        <form action="/courses/{{ $course->id }}/add" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-7 res-ml-lg-10-15">

                    <div class = "row">

                        <div class = "col-6 offset-6 mb-4">
                            <button class="btn btn-secondary btn-sm collapse-modules-btn mr-2">
                                <i aria-hidden="true" class="fa fa-minus-circle res-text-9 res-text-sm-7 res-text-md-9"></i> 
                                <span class="res-text-9 res-text-sm-7 res-text-md-9">Collapse Modules</span>
                            </button>
                            <button class="btn btn-secondary btn-sm collapse-lessons-btn">
                                <i aria-hidden="true" class="fa fa-minus-circle res-text-9 res-text-sm-7 res-text-md-9"></i> 
                                <span class="res-text-9 res-text-sm-7 res-text-md-9">Collapse Lessons</span>
                            </button>
                        </div>

                        <div class = "col-lg-11 master-path-guideline res-ml-lg-10-5">
                            
                            <input class = "arrangement" type = "hidden" name = "arrangement">

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

                                    <div class = "module-content">

                                        <ul class="list-group draggable">
                                            <input class = "avail_module" type = "hidden" value = "{{ $module->id }}">  
                                            @if(COUNT($module->lessons))
                                                @foreach($module->lessons as $les_num => $lesson)
                                                    <li>
                                                        <div class = "lesson-row">
                                                            <input class = "avail_lesson" type = "hidden" value = "{{ $lesson->id }}">
                                                            <div class = "lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                                            <div class="card mb-2">
                                                                <div class="card-header">
                                                                    <h4 class="card-title res-mt-lg-10-1 res-text-md-8">Lesson <span class = "lesson-module-spotter-num">{{ $mod_num + 1 }}</span>.<span class = "lesson-spotter-num">{{ $les_num }}</span> {{ $lesson->title }}</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <p class="card-text res-text-9">{{ $lesson->overview }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            @else

                                                <div class="alert alert-warning no-lessons pt-4 pb-4" role="alert">
                                                    <i class="fa fa-book mr-2" aria-hidden="true"></i>
                                                    <span>No Lessons! Add a lesson.</span>
                                                </div>                                        

                                            @endif 
                                        </ul>                            

                                        <div class="card mb-5">
                                            <div class="card-body pt-2 pb-2">
                                                <a href = "/courses/{{ $course->id }}/{{ $module->id }}/lessons/add" class="btn btn-sm res-button app-red-btn float-right">
                                                    <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Add Lesson</span>
                                                </a>
                                            </div>
                                        </div>

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

                    <div class="card m-3 mt-4">
                        <div class="card-header">
                            <div class = "row">
                                <div class = "col-lg-6"> 
                                    <h2 class = "res-text-6 mt-1">
                                        <i class="fa fa-lightbulb-o mr-2" aria-hidden="true"></i>
                                        <span>Hints</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <ul class="list-inline">  
                                <li class="list-inline-item">
                                    <div class="res-brs-b row">
                                        <div class="col-1 pl-2">
                                            <i class="fa fa-arrows"></i>
                                        </div> 
                                        <div class="col-10 pr-0">
                                            <p class="res-text-9">Drag and drop your lessons to place them in the order you prefer</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">                                
                                    <div class="row mt-3">
                                        <div class="col-1 pl-2">
                                            <i class="fa fa-floppy-o"></i>
                                        </div> 
                                        <div class="col-10 pr-0">
                                            <p class="res-text-9">After arranging your lessons, save to publish your new arrangement</p>
                                        </div>
                                    </div>
                                </li>                                    
                            </ul>
                        </div>
                        <div class="card-footer">
                            <button class="btn res-button app-red-btn float-right res-pl-10-6 res-pr-10-6">
                                <i class="fa fa-floppy-o res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save</span>
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