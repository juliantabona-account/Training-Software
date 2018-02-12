@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        .course-image-box{
            height: 180px; 
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
                        <div class="col-12 col-sm-4 col-md-3 offset-lg-3 pt-1 pt-lg-0">
                            <h2 class = "res-text-8 res-text-md-6 res-text-lg-3">
                                <i class="fas fa-book"></i>
                                <span>Choose To Enroll</span>
                            </h2>
                        </div>

                        <div class="col-12 offset-sm-5 col-sm-3 offset-md-7 col-md-2 offset-lg-4 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('client-show', [$client_id]) }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i aria-hidden="true" class="fas fa-arrow-circle-left res-text-9"></i> 
                                <span class = "res-text-9">Back</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

        
    <div class="container-fluid res-mt-10-3 res-mb-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-1">
            <div class="container res-mt-lg-10-3 res-mb-lg-10-5">

                <div class="row">

                    @if(COUNT($courses))
                        @foreach($courses as $course)

                        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-4 mb-4">

                            @if(Session::has('status'))
                                <div class="alert alert-{{ Session::get('type') }}" role="alert">
                                    <span class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fas fa-user mr-1"></i> {{ Session::get('status') }}</span>
                                    <button type="button" class="close mt-2 d-block res-text-9 res-text-sm-9 res-text-md-9" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            <div class="card ml-0 mr-0 ml-xl-4 mr-xl-4">
                                <div class = "course-image-box">
                                    <img class="card-img-top course-image"  alt="{{ $course->title }}" src="{{ $course->img }}" img-died="video">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title res-text-6 mb-1">{{ $course->title }}</h4>
                                    
                                    <p class="res-text-9 mt-1 pt-2 pb-2 res-brs-lg-b res-brs-lg-t">
                                        {{ $course->overview }}
                                    </p>
                                    <form action = "{{ route('client-save') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type = "hidden" name = "client-id" value = "{{ $client_id }}">
                                        <input type = "hidden" name = "course_id" value = "{{ $course->id }}">
                                        <input type = "hidden" name = "url" value = "{{ route('client-show', [$client_id]) }}">
                                        <button type = "submit" class="btn btn-sm res-button app-red-btn float-right">
                                            <span class = "res-text-9">Enroll</span>
                                            <i aria-hidden="true" class="fas fa-arrow-circle-right res-text-9 ml-1"></i> 
                                        </button>
                                    </form>
                                </div>
                            </div>


                        </div>

                        @endforeach
                    @else

                        <div class="col-lg-4 offset-4">          
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top course-image" alt="Inbound Marketing" src="/assets/temp/placeholder.png" img-died="image">
                                <div class="card-body">
                                    <p class="res-text-9 mt-1 pt-2 pb-2 res-brs-lg-b res-brs-lg-t">We didn't find any courses. Get started by creating your first course and adding lessons.</p>
                                    <a href = "{{ route('course-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                        <i class="fas fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                        <span class="res-text-9 res-text-sm-7 res-text-md-9">Create Course</span>
                                    </a>                           
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
