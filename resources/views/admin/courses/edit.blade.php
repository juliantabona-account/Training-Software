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
                        <div class="col-2">
                            <h2 class = "res-mt-lg-10-1 res-text-7 res-text-md-8 res-text-sm-5">
                                <i class="fa fa-users"></i>
                                <span>Enrolled:</span>
                                <span>42</span>
                            </h2>
                        </div>

                        <div class="col-2">
                            <a href = "/courses/1/add" class="btn res-button app-red-btn">
                                <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Add Module</span>
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

                    <div class = "col-6 offset-6 mb-4">
                        <button class="btn btn-secondary btn-sm collapse-lessons-btn float-right">
                            <i aria-hidden="true" class="fa fa-minus-circle res-text-9 res-text-sm-7 res-text-md-9"></i> 
                            <span class="res-text-9 res-text-sm-7 res-text-md-9">Collapse Lessons</span>
                        </button>
                        <button class="btn btn-secondary btn-sm collapse-modules-btn float-right mr-2">
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

                                        <ul class="list-group draggable">
                                            <input class = "avail_module" type = "hidden" value = "{{ $module->id }}">  
                                            @if(COUNT($module->lessons))
                                                @foreach($module->lessons as $les_num => $lesson)
                                                    <li>
                                                        <div class = "lesson-row">
                                                            <input class = "avail_lesson" type = "hidden" value = "{{ $lesson->id }}">
                                                            <div class = "lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="100" class = "table-video">

                                                                            @foreach($videos as $video)
                                                                                @if($video['uri'] == $lesson->video_uri)
                                                                                    

                                                                                <img class="mt-3" alt="{{ $lesson->title }}" 
                                                                                     src="{{ $video['pictures']['sizes'][0]['link'] }}"  
                                                                                     style="width: 100px;">

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
                                                                                            <a href="/courses/{{ $course->id }}/lessons/{{ $lesson->id }}/edit" class="text-muted res-text-lg-9"><i class="fa fa-pencil"></i> Edit</a>
                                                                                            |
                                                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-trash"></i> Trash Lesson</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class = "col-lg-6"> 
                                                                                        <div class="m-t-sm">
                                                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-eye"></i> 13</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td class="desc table-action">
                                                                            
                                                                            <button class="btn res-button app-white-btn res-mt-lg-10-4">
                                                                                <i aria-hidden="true" class="fa fa-file-text-o res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Make Test</span>
                                                                            </button>  

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                                <h2 class = "res-text-6 mt-1">Overview</h2>
                            </div>
                            <div class = "col-lg-6"> 
                                <a href = "/courses/1/preview" target="_blank" class="btn res-button app-white-btn float-right">
                                    <i aria-hidden="true" class="fa fa-eye res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Preview</span>
                                </a> 
                            </div> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="series-heading">Heading</label>
                            <textarea id = "series-heading" class="form-control res-text-9 res-text-sm-8 res-text-md-9" rows="2">Inbound Sales Incubation Programme</textarea>
                        </div>
                        <div class="form-group">
                            <label for="series-description">Description</label>
                            <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" rows="4">In today's world, making sales is all about building  relationships. In this series we learn how to use inbound techniques to close sales</textarea>
                        </div>
                        <div class="form-group">
                            <label for="series-description">Course Annoucements</label>
                            <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" rows="4">Good Day! Insure that your complete all tests assigned to unlock other module lessons. Thank you</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn res-button app-red-btn float-right">
                            <i class="fa fa-floppy-o res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save</span>
                        </button>
                    </div>


                </div>

            </div>
        </div>
    </div>



@endsection

@section('js')

    <script src="{{asset('js/jquery-sortable/jquery-sortable.js')}}"></script> 

@endsection
