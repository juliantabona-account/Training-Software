@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>
        .video-box{
            border: 2px dotted #adadad;
            margin: 20px;
        }

        .video-box button{
            display:block;
            margin: 0 auto;
        }

        .mce-menu {
            z-index: 100000;
        }

        #lesson-notes{
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

                <form action="/courses/{{ $course_id }}/module/{{ $module->id }}/lesson" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-7 res-ml-lg-10-15">

                            <div class = "row">

                                <div class = "col-lg-11 res-ml-lg-10-5">

                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for = "lesson-title">Lesson Title</label>
                                                <input id = "lesson-title" type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-9"  name = "lesson-title" placeholder = "Short And Simple..." required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class = "mt-3 ml-2 editor-loader">
                                            <div class="alert alert-warning" role="alert">
                                                <i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>
                                                <span>Loading Editor...</span>
                                            </div>
                                        </div>

                                        <textarea id = "lesson-notes" class = "mt-4" name = "lesson-notes">


                                            <p style="text-align: center; font-size: 15px;" data-mce-style="text-align: center; font-size: 15px;">
                                                <span style="color: rgb(0, 0, 0);" data-mce-style="color: #000000;">
                                                    <img title="SALESFORCE LOGO" src="../../../../../../assets/icons/Saleschief-Logo.png" alt="SALESFORCE LOGO" width="180" height="auto" data-mce-src="../../../../../../assets/icons/Saleschief-Logo.png" data-mce-selected="1">
                                                </span>
                                            </p>
                                            <h1 style="text-align: center;" data-mce-style="text-align: center;">
                                                <span style="color: rgb(0, 0, 0);" data-mce-style="color: #000000;">Welcome 
                                                    <span class="mce-spellchecker-ignore" data-mce-bogus="1" data-mce-word="SalesChief" data-mce-index="0">SalesChief</span>
                                                </span>
                                            </h1>
                                            <h3 style="text-align: left;" data-mce-style="text-align: left;">
                                                <span style="color: rgb(0, 0, 0);" data-mce-style="color: #000000;"> 
                                                    <!--StartFragment-->
                                                </span>
                                            </h3>
                                            <h4>
                                                <strong>
                                                    <span style="color: rgb(0, 0, 0);" data-mce-style="color: #000000;">SUMMARY</span>
                                                </strong>
                                            </h4>
                                            <h3 style="text-align: left;" data-mce-style="text-align: left;">
                                                <span style="color: rgb(0, 0, 0);" data-mce-style="color: #000000;">
                                                    <!--EndFragment--> 
                                                </span>
                                            </h3>
                                            <h4 data-mce-style="text-align: left;" style="text-align: left;">
                                                <span style="color: rgb(128, 128, 128);" data-mce-style="color: #808080;">
                                                    <strong>In todays lesson we focus on the important of sales and why every institution needs to have a strong and well structured sales strategy. Our goal is to learn the power of Sales!</strong>
                                                </span>
                                            </h4>
                                            <h4>
                                                <strong><span style="color: rgb(0, 0, 0);" data-mce-style="color: #000000;">Our Focus Points</span></strong>
                                            </h4>
                                            <p>
                                                <span style="color: rgb(128, 128, 128);" data-mce-style="color: #808080;"><strong>1) Why sales are very important</strong></span>
                                            </p>
                                            <p>
                                                <span style="color: rgb(128, 128, 128);" data-mce-style="color: #808080;"><strong>2) How sales performance are measured</strong></span>
                                            </p>
                                            <p>
                                                <span style="color: rgb(128, 128, 128);" data-mce-style="color: #808080;"><strong>3) How to create a strong/reliable sales strategy</strong></span>
                                            </p>
                                            <p><!--EndFragment--> </p><p><br data-mce-bogus="1"></p>



                                        </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class = "col-lg-3">

                            <div class="card">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="lesson-description">Lesson Overview</label>
                                        <textarea id = "lesson-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "lesson-overview" rows="4" placeholder = "Say something short about this lesson..." required></textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn res-button app-red-btn mt-2 float-right">
                                        <i class="fa fa-cloud-upload res-text-9 res-text-sm-7 res-text-md-9 mr-1" aria-hidden="true"></i>
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Upload Lesson</span>
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
    <script>

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
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            setup: function (ed) {
                ed.on('LoadContent', function(e) {
                    $('.editor-loader').hide();
                });
            }
         });

    </script>

@endsection