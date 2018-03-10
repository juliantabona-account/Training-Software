@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        .course-image-box{
            height: 180px;
            overflow: hidden;
        }

        img.course-image{
            display: none;
            height: 180px; 
            width: 100%; 
            background: linear-gradient(#128067, #179a7c);
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
                                <i class="fa fa-book"></i>
                                <span>All Courses</span>
                            </h2>
                        </div>
                        @if(Auth::user()->hasRole('admin'))
                            <div class="col-12 offset-sm-5 col-sm-3 offset-md-7 col-md-2 offset-lg-4 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                                <a href = "{{ route('course-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                    <i class="fa fa-plus res-text-9" aria-hidden="true"></i>
                                    <span class = "res-text-9">Add Course</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

        
    <div class="container-fluid res-mt-10-3 res-mb-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-1">
            <div class="container res-mt-lg-10-3 res-mb-lg-10-5">

                @include('response.message')

                <div class="row">

                    @if(COUNT($courses))
                        @foreach($courses as $course)

                        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-4 mb-4">
                            
                            <div class="card ml-0 mr-0 ml-xl-4 mr-xl-4">
                                <div class = "course-image-box">
                                    <img class="card-img-top course-image"  alt="{{ $course->title }}" src="{{ $course->img }}" img-died="video">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title res-text-6 mb-1">{{ $course->title }}</h4>
                                    
                                    <p class="res-text-9 mt-1 pt-2 pb-2 res-brs-lg-b res-brs-lg-t">
                                        {{ $course->overview }}
                                    </p>
                                    @if(Auth::user()->hasRole('admin'))
                                        <a href = "/courses/{{ $course->id }}/edit" class="btn btn-sm res-button app-red-btn float-right">
                                            <i class="fa fa-pencil res-text-9" aria-hidden="true"></i>
                                            <span class = "res-text-9">Edit Course</span>
                                        </a>
                                        <a href = "/courses/{{ $course->id }}/clients/create" class="btn btn-sm btn-success float-right mr-1">
                                            <i class="fa fa-user-plus res-text-9" aria-hidden="true"></i>
                                        </a>
                                        <form action = "/courses/{{ $course->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "button" class="btn btn-sm btn-danger course-delete-btn float-right mr-1">
                                                <i class="fa fa-trash res-text-9" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @if(Auth::user()->hasRole('client'))
                                        <a href = "/courses/{{ $course->id }}" class="btn btn-sm btn-success res-button float-right">
                                            <span class = "res-text-9">View Course</span>
                                        </a>
                                    @endif
                                </div>
                            </div>


                        </div>

                        @endforeach
                    @else

                        <div class="col-lg-4 offset-4">          
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top course-image" alt="Inbound Marketing" src="/assets/temp/placeholder.png" img-died="image">
                                <div class="card-body">
                                    @if( Auth::user()->hasRole('admin') )
                                        <p class="res-text-9 mt-1 pt-2 pb-2 res-brs-lg-b res-brs-lg-t">Get started by creating your first course and adding lessons.</p>
                                        <a href = "{{ route('course-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                            <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                            <span class="res-text-9 res-text-sm-7 res-text-md-9">Create Course</span>
                                        </a> 
                                    @else
                                        <p class="res-text-9 mt-1 pt-2 pb-2 res-brs-lg-b res-brs-lg-t">You don't have any active classes at the moment. Contact Us to enroll today!</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script type="text/javascript">
        
        $('.course-delete-btn').click(function(e){

            var course_title = $(this).parent().parent().find('.card-title').text();

            swal({
              title: "Delete Course?",
              text: 'Are you sure you want to delete "'+course_title+'"!',
              buttons: ["Cancel", "Delete"],
              dangerMode: true
            })
            .then((willDelete) => {
                if (willDelete) {

                    swal({
                      text: "Deleting...",
                      icon: "success",
                      timer: 2000,
                      buttons: false
                    });

                    $(this).parent('form').submit();
                }
            });

        });

    </script>

@endsection
