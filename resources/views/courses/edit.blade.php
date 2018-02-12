@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
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
            position: absolute;
            right: 5px;
            top: 0px;
        }

        .new-zone-lesson{
            color: #111;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #ffc107;
            position: absolute;
            top: 0px;
            right: 50px;
        }

        img.course-image{
            display: none;
            height: 180px; 
            width: 100%; 
            background: linear-gradient(#ff5a4e, #ff3925);
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

    <div class="col-md-12 res-pb-10-2 res-brs-t res-brs-lg-t-n res-brs-b">
        <div class="container-fluid res-pt-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 offset-lg-1 col-lg-6 pt-1 pt-lg-0">
                            <h2 class="res-text-8 res-text-md-6 res-text-lg-3">
                            <i class="fa fa-crosshairs"></i> 
                            <span>Course 111</span></h2>
                        </div> 
                        <div class="col-12 col-sm-3 col-lg-2">
                            <h2 class="res-mt-lg-10-1 res-text-7 res-text-md-8 res-text-sm-5">
                                <i class="fa fa-users res-text-8"></i> 
                                <span class="res-text-8">Enrolled:</span> 
                                <span class="res-text-8">42</span>
                            </h2>
                        </div> 
                        <div class="col-12 col-sm-4 offset-sm-0 col-md-5 offset-md-0 offset-lg-0 col-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <button type="button" class="btn btn-sm res-button app-red-btn float-right ml-2 mb-1" data-toggle="modal" data-target="#addModule">
                                <i aria-hidden="true" class="fa fa-plus res-text-9"></i> 
                                <span class="res-text-9">Add Module</span>
                            </button> 
                            <a href="/courses" class="btn btn-sm res-button app-red-btn float-right">
                                <i aria-hidden="true" class="fa fa-arrow-circle-left res-text-9"></i> 
                                <span class="res-text-9">Courses</span>
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
                        <span class="float-right p-1 pl-3 ml-2 res-brs-l">{{ $lessonCount }} {{ $lessonCount == 1 ? "Lesson" : "Lessons" }}</span>
                        <span class="float-right p-1 pl-3 ml-3 res-brs-l">{{ $moduleCount }} {{ $moduleCount == 1 ? "Module" : "Modules" }}</span>
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

                        @if(!COUNT($modules))

                            <div role="alert" class="alert alert-warning no-lessons pt-4 pb-4">
                                <i aria-hidden="true" class="fa fa-book mr-2"></i> 
                                <span>No Modules! Add a module.</span>
                                <button type="button" data-toggle="modal" data-target="#addModule" class="btn btn-sm res-button app-red-btn float-right">
                                    <i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9"></i> 
                                    <span class="res-text-9 res-text-sm-7 res-text-md-9">Add Module</span>
                                </button>
                            </div>

                        @endif

                        @foreach($modules as $mod_num => $module)

                            @if($loop->last)
                                <div class = "module-row res-pl-10-1 res-pb-lg-10-5"> 
                            @else
                                <div class = "module-row res-pl-10-1"> 
                            @endif 

                                    <h2 class = "module-row-title res-text-6 col-md-12 mb-4 pt-2 pb-2">
                                        Module <span class = "module-spotter-num">{{ $mod_num + 1 }}</span>: {{ $module->title }}
                                        <span class="module-lesson-counter float-right">{{ COUNT($module->lessons) }}</span>
                                        <div class="module-toolbox">
                                            <form action = "/courses/{{ $course->id }}/module/{{ $module->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href = "/courses/{{ $course->id }}/module/{{ $module->id }}/edit" class="btn btn-sm btn-primary res-pl-10-1 ml-4">
                                                    <i aria-hidden="true" class="fa fa-pencil res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm res-pl-10-1 btn-danger">
                                                    <i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                </button>
                                            </form>
                                        </div>
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
                                                            <i class="btn fa fa-arrows dragger-btn" aria-hidden="true"></i>
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="100" class = "table-video">

                                                                            @foreach($videos as $video)
                                                                                @if($video['uri'] == $lesson->video_uri)
                                                                                    @if($video['status'] == 'available' && !empty($video['pictures']['sizes'][0]['link']))    
                                                                                        <img class="mt-3" alt="{{ $lesson->title }}" 
                                                                                             src="{{ $video['pictures']['sizes'][0]['link'] }}"  
                                                                                             style="width: 100px;"
                                                                                             img-died="image">
                                                                                    @else
                                                                                        <div class="mt-3 p-4 app-red-gradient">
                                                                                            <i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw app-color-white"></i>
                                                                                        </div>
                                                                                    @endif
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
                                                                                            <a href="/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}/edit" class="text-muted res-text-lg-9"><i class="fa fa-pencil"></i> Edit</a>
                                                                                            |
                                                                                            <form action = "/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}" class="d-inline" method="POST">
                                                                                                {{ csrf_field() }}
                                                                                                {{ method_field('DELETE') }}
                                                                                                <button type="submit" class="btn link-btn text-muted res-text-lg-9">
                                                                                                    <i class="fa fa-trash"></i> Trash Lesson
                                                                                                </button>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class = "col-lg-6"> 
                                                                                        <div class="m-t-sm">
                                                                                            <a href="#" class="text-muted res-text-lg-9 mr-4"><i class="fa fa-eye"></i> 0</a>
                                                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-file-text-o"></i> 0</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td class="desc table-action">
                                                                            @if(COUNT($lesson->tests))
                                                                                <a href="/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}/tests" class="btn btn-success res-mt-lg-10-4 float-right">
                                                                                    <i aria-hidden="true" class="fa fa-file-text-o res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">{{ COUNT($lesson->tests) == 1 ? COUNT($lesson->tests) . ' Test': COUNT($lesson->tests) . ' Tests' }} </span>
                                                                                </a>  
                                                                            @else
                                                                                <a href="/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}/tests/create" class="btn res-button app-white-btn res-mt-lg-10-4 float-right">
                                                                                    <i aria-hidden="true" class="fa fa-file-text-o res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Make Test</span>
                                                                                </a>  
                                                                            @endif
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
                                                <a href = "/courses/{{ $course->id }}/module/{{ $module->id }}/lesson/create" class="btn btn-sm res-button app-red-btn float-right">
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
                <form action = "/courses/{{ $course->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input class = "arrangement" type = "hidden" name = "arrangement">
                    <div class="card ml-3 mt-0">
                        <div class="card-header">
                            <div class = "row">
                                <div class = "col-lg-6"> 
                                    <h2 class = "res-text-6 mt-1">Overview</h2>
                                </div>
                                <div class = "col-lg-6"> 
                                    <a href = "/courses/{{ $course->id }}" target="_blank" class="btn res-button app-white-btn float-right">
                                        <i aria-hidden="true" class="fa fa-eye res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Preview</span>
                                    </a> 
                                </div> 
                            </div>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top course-image mb-3"  alt="{{ $course->title }}" src="{{ $course->img }}" img-died="image">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file form-control res-text-9 res-text-sm-8 res-text-md-9">
                                                <i class="fa fa-picture-o res-text-9 res-text-sm-8 res-text-md-9 mr-1" aria-hidden="true"></i> 
                                                Upload <input type="file" id="imgInp" name = "course-image">
                                                <input type="hidden" value="{{ $course->img }}" name = "current-course-image">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                    <img id='img-upload'/>
                                </div>
                            <div class="form-group">
                                <label for="series-heading">Heading</label>
                                <textarea id = "series-heading" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "course-title" rows="2" required>{{ $course->title }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="series-description">Description</label>
                                <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "course-overview" rows="4" required>{{ $course->overview }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="series-description">Course Annoucements</label>
                                <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "course-announcement" rows="4" required>{{ $course->announcement }}</textarea>
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

    @include('modules.create')

@endsection
