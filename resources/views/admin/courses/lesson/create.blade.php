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
    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">
        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-2 offset-10">
                            <a href = "/courses/1/edit" class="btn res-button app-red-btn">
                                <i class="fa fa-arrow-circle-left res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Go Back</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id = "player-container" class="container-fluid res-pt-lg-10-5 res-pb-lg-10-10">

        <form action="/courses/{{ $course_id }}/{{ $module_id }}/lessons/add" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-lg-7 res-ml-lg-10-15">

                    <div class = "row">

                        <div class = "col-lg-11 res-ml-lg-10-5">

                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-8"  name = "lesson-title" placeholder = "Lessson title" />
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class = "row">
                                        <div class = "col-lg-12"> 
                                            <h2 class="res-text-6 mt-1">
                                                <i aria-hidden="true" class="fa fa-film mr-2"></i> 
                                                <span>Video</span>
                                            </h2>
                                        </div> 
                                    </div>
                                </div>
                                <div class="card-body video-box pt-5 pb-5">
                                    <div class = "row">
                                        <div class = "col-md-12">
                                             <div class="alert alert-info">
                                                <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1" aria-hidden="true"></i>
                                                <input type="file" name="video_clip" id="video_clip">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class = "col-lg-3">

                    <div class="card">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="series-description">Lesson Overview</label>
                                <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "lesson-overview" rows="4" placeholder = "Say something short about this lesson..."></textarea>
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



@endsection
