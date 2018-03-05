@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        #lesson-notes h1, #lesson-notes h2, #lesson-notes h3, 
        #lesson-notes h4, #lesson-notes h5, #lesson-notes h6,
        #lesson-notes span, #lesson-notes b, #lesson-notes i{
            font-family: Open Sans, sans-serif !important;
        }

        #vimeo_player {
            background: #e0e0e0 !important;
            padding: 15px;
        }

        iframe {
            width: 100%;
        }

        #lesson-notes,
        .lesson-notes-title{
            display: none;
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
                                <span>Create Lesson</span>
                            </h2>
                            <h4 class = "res-text-8 res-text-sm-8 res-text-md-8 text-center">
                                <i class="fa fa-cubes"></i>
                                <span>{{ $module->title }}</span>
                            </h4>
                        </div>


                        <div class="col-2 offset-2">
                            <a href = "/courses/{{ $course_id }}/edit" class="btn res-button app-red-btn">
                                <i class="fa fa-arrow-circle-left res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Go Back</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid res-mb-lg-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-2">

            <div id = "player-container" class="container-fluid res-pt-lg-10-5 res-pb-lg-10-10">

                <form action="/courses/{{ $course_id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">
                        <div class="col-lg-7 res-ml-lg-10-15">

                            <div class = "row">

                                <div class = "col-lg-11 res-ml-lg-10-5">

                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for = "lesson-title">Lesson Title</label>
                                                <input id = "lesson-title" type = "text" class="form-control res-text-9 res-text-sm-9 res-text-md-9"  name = "lesson-title" placeholder = "Short And Simple..." value = "{{ $lesson->title }}" required/>
                                            </div>
                                        </div>
                                    </div>

                                    @if($status == 'available')
                                        <div role="alert" class="alert alert-warning mt-3 mb-0 lesson-notes-title">
                                            <i class="fa fa-film"></i> 
                                            <span>Lesson Video</span>
                                            <a href = "/courses/{{ $course_id }}/module/{{ $module->id }}/lesson/{{ $lesson->id }}/video" class="btn btn-sm btn-success res-button float-right">
                                                <i class="fa fa-film res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Change Video</span>
                                            </a>
                                        </div>
                                        <div id="vimeo_player" class = "mt-4 mb-5" data-vimeo-url="https://vimeo.com{{ str_replace('videos/', '', $lesson->video_uri) }}"></div>
                                    @elseif($status == 'empty') 

                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa fa-film" aria-hidden="true"></i>
                                            <span>No Video</span>
                                            <button type="submit" class="btn btn-sm res-button app-red-btn float-right pr-2 pl-2">
                                                <i class="fa fa-film res-text-9 res-text-sm-7 res-text-md-9 mr-1" aria-hidden="true"></i>
                                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Add Video</span>
                                            </button> 
                                        </div>

                                    @else
                                        <div class="card mt-4">
                                            <div class="card-body app-red-gradient pt-3 pb-3">
                                                <i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw app-color-white"></i>
                                                <span style="color: #fff;">Video Converting...</span>                                              
                                            </div>
                                        </div>
                                    @endif

                                    <div class = "mt-3 ml-5 mr-5 editor-loader">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>
                                            <span>Loading Editor...</span>
                                        </div>
                                    </div>
                                    <div class="alert alert-warning lesson-notes-title" role="alert">
                                        <i class="fa fa-file-o"></i>
                                        <span>Lesson Notes</span>
                                    </div>
                                    <textarea id = "lesson-notes" class = "mt-4" name = "lesson-notes">{{ $lesson->notes }}</textarea>

                                </div>

                            </div>
                        </div>
                        <div class = "col-lg-3">

                            <div class="card">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="lesson-description">Lesson Overview</label>
                                        <textarea id = "lesson-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "lesson-overview" rows="4" placeholder = "Say something short about this lesson..." required>{{ $lesson->overview }}</textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn res-button app-red-btn px-sm-5  mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                        <i class="fa fa-save res-text-9 res-text-sm-7 res-text-md-9 mr-1" aria-hidden="true"></i>
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save Lesson</span>
                                    </button>
                                </div>


                            </div>

                        </div>

                    </form>

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

        tinymce.init({
            selector: '#lesson-notes',
            height: 500,
            theme: 'modern',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [

            ],
            setup: function (ed) {
                ed.on('LoadContent', function(e) {
                    $('.editor-loader').hide();
                    $('.lesson-notes-title').show();
                });
            }
         });

    </script>

@endsection