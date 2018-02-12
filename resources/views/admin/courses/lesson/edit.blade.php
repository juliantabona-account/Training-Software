@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>
        #player-container{
            background: #b8b8b8;
        }

        #player-container iframe{
            border: 4px solid #9a9a9a;
            background: #9a9a9a;
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
                                <span>Lesson 1.1 What is inbound sales?</span>
                            </h2>
                        </div>
                        <div class="col-2 offset-2">
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
        <div class="row">
            <div class="col-lg-7 res-ml-lg-10-15">

                <div class = "row">

                    <div class = "col-lg-11 res-ml-lg-10-5">

                        <iframe src="https://player.vimeo.com/video/244531924" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                    </div>

                </div>
            </div>
            <div class = "col-lg-3">

                <div class="card">
                    <div class="card-header">
                        <div class = "row">
                            <div class = "col-lg-6 offset-6"> 
                                <a href = "/courses/1/lessons/1" type="submit" class="btn res-button app-white-btn float-right">
                                    <i aria-hidden="true" class="fa fa-eye res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Preview</span>
                                </a> 
                            </div> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="series-description">Lesson Overview</label>
                            <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" rows="4">This is a sample placeholder description of the lesson. It will be explaining in brief what the client will learn.</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn res-button app-red-btn float-right"> 
                        <i class="fa fa-floppy-o res-text-9 res-text-sm-7 res-text-md-9 mr-1" aria-hidden="true"></i>                               
                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save</span>
                        </button>
                        <button type="submit" class="btn btn-success float-right mr-2">
                            <i class="fa fa-file-text-o res-text-9 res-text-sm-7 res-text-md-9 mr-1" aria-hidden="true"></i>
                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Make Test</span>
                        </button>
                    </div>


                </div>

            </div>
        </div>
    </div>



@endsection
