@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>
        img.course-image{
            height: 180px; 
            width: 100%; 
            display: block;
            background: linear-gradient(#ff5a4e, #ff3925);
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
                                <i class="fa fa-book"></i>
                                <span>All Courses</span>
                            </h2>
                        </div>
                        <div class="col-12 col-sm-5 col-md-7 col-lg-4 pt-1 pt-lg-0">
                            <a href = "/courses?filter=published" class = "res-mt-lg-10-1 res-text-9 res-sm-text-9 res-text-md-8 text-secondary d-inline-block mr-4">
                                <i class="fa fa-check-square-o"></i>
                                <span>Published:</span>
                                <span>{{ $published_counter }}</span>
                            </a>
                            <a href = "/courses?filter=draft" class = "res-mt-lg-10-1 res-text-9 res-sm-text-9 res-text-md-8 text-secondary d-inline-block">
                                <i class="fa fa-pencil-square-o"></i>
                                <span>Draft:</span>
                                <span>{{ $draft_counter }}</span>
                            </a>
                        </div>

                        <div class="col-12 col-sm-3 col-md-2 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('course-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-plus res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Add Course</span>
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

                @if(!empty($filter))
                    <div class="row">
                        <div class="col-5 offset-3">
                            <div class="alert alert-warning" role="alert">
                                <span class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa-filter mr-1"></i> Diplaying {{ ucfirst($filter) }} Courses</span>
                                <button type="button" class="close mt-2 d-block res-text-9 res-text-sm-9 res-text-md-9" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">

                    @if(COUNT($courses))
                        @foreach($courses as $course)

                        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-4 mb-4">

                            @if(Session::has('status'))
                                <div class="alert alert-{{ Session::get('type') }}" role="alert">
                                    <span class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa-user mr-1"></i> {{ Session::get('status') }}</span>
                                    <button type="button" class="close mt-2 d-block res-text-9 res-text-sm-9 res-text-md-9" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            <div class="card ml-0 mr-0 ml-xl-4 mr-xl-4">
                                <img class="card-img-top course-image"  alt="{{ $course->title }}" src="{{ $course->img }}">
                                <div class="card-body">
                                    <h4 class="card-title res-text-6 mb-1">{{ $course->title }}</h4>
                                    @if($course->state == 'Published')
                                        <span class="badge badge-success mb-1">{{ $course->state }}</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $course->state }}</span>
                                    @endif
                                    
                                    <p class="res-text-9 pb-3 res-brs-lg-b">
                                        {{ $course->overview }}
                                    </p>
                                    <a href = "/courses/{{ $course->id }}/edit" class="btn btn-sm res-button app-red-btn float-right">
                                        <i class="fa fa-pencil res-text-9" aria-hidden="true"></i>
                                        <span class = "res-text-9">Edit Course</span>
                                    </a>
                                    <form action = "/courses/{{ $course->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type = "submit" class="btn btn-sm btn-danger float-right mr-1">
                                            <i class="fa fa-trash res-text-9" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    <a href = "/courses/{{ $course->id }}/clients/create" class="btn btn-sm btn-success float-right mr-1">
                                        <i class="fa fa-user-plus res-text-9" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>


                        </div>

                        @endforeach
                    @else

                        <div class="col-lg-4 offset-4">          
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top course-image" alt="Inbound Marketing" src="/assets/temp/placeholder.png">
                                <div class="card-body">
                                    <h4 class="card-title res-text-6 mb-1"><span class="badge badge-secondary">No Courses</span></h4>                        
                                    <p class="res-text-9 pb-3 res-brs-lg-b">Get started by creating your first course and adding lessons.</p>
                                    <a href = "{{ route('course-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                        <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
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
