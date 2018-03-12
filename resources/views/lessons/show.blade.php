@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        #vimeo_player {
            background: #f3f3f3 !important;
            padding: 15px;
        }

        iframe {
            width: 100%;
        }

        #lesson-notes,
        .lesson-notes-title{
            display: none;
        }

        .lesson-notebook{

            background: #fff;
            border: 2px dotted #b9b9b9;
            border-top: none;

        }

        .lesson-notebook h1, .lesson-notebook h2, .lesson-notebook h3, 
        .lesson-notebook h4, .lesson-notebook h5, .lesson-notebook h6,
        .lesson-notebook span, .lesson-notebook b, .lesson-notebook i{
            font-family: Open Sans, sans-serif !important;
        }

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">

        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-5 offset-3">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3 text-center">
                                <i class="fa fa-cube"></i>
                                <span>Watch Lesson</span>
                            </h2>
                            <h4 class = "res-text-8 res-text-sm-8 res-text-md-8 text-center">
                                <i class="fa fa-cubes"></i>
                                <span>{{ $module->title }}</span>
                            </h4>
                        </div>

                        <div class="col-2 offset-2">
                            <a href = "/courses/{{ $course_id }}" class="btn res-button app-red-btn">
                                <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Go Back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid res-mb-lg-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-2">

            <div id = "player-container" class="container-fluid res-pt-lg-10-1 res-pb-lg-10-10">

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

                <div class="row pt-5 pb-5 preview-border">
            @else       
                <div class="row">
            @endif
                    <div class="col-lg-8 res-ml-lg-10-10">

                        <div class = "row">

                            <div class = "col-lg-11 res-ml-lg-10-5">

                                <p class = "res-text-7 alert alert-dark mb-0">{{ $module->title }} / {{ $lesson->title }}</p>

                                @if($status == 'available')
                                    <div role="alert" class="alert alert-warning mt-1 mb-0 lesson-notes-title">
                                        <i class="fa fa-film"></i> 
                                        <span>Lesson Video</span>
                                    </div>
                                    <div id="vimeo_player" class = "mt-2 mb-5" data-vimeo-url="https://vimeo.com{{ str_replace('videos/', '', $lesson->video_uri) }}"></div>
                                @elseif($status == 'empty') 

                                    <div class="alert alert-warning" role="alert">
                                        <i class="fa fa-film" aria-hidden="true"></i>
                                        <span>No Video</span>
                                    </div>

                                @else
                                    <div class="card mt-4">
                                        <div class="card-body app-red-gradient pt-3 pb-3">
                                            <i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw app-color-white"></i>
                                            <span style="color: #fff;">Video still processing, come back later...</span>                                              
                                        </div>
                                    </div>
                                @endif

                                 @if($status == 'available')

                                    <p class = "res-text-7 alert alert-dark mb-0">
                                        <i class="fa fa-file-o"></i> 
                                        <span>Lesson Notes</span>
                                    </p>

                                    <div class = "p-4 lesson-notebook">
                                        {!!html_entity_decode($lesson->notes )!!}
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                    <div class = "col-lg-3">

                        <div class="card">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="lesson-description">Lesson Overview</label>
                                    <p id = "lesson-description" class="res-text-9 res-brs-t pt-2">{{ $lesson->overview }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>

    <script>

        var vimeoPlayer = new Vimeo.Player('vimeo_player');
        
        vimeoPlayer.on('play', function() {
            console.log('User is now playing!');
        });

    </script>

@endsection