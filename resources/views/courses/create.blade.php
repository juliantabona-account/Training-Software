@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">

        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-5 offset-3">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">
                                <i class="fas fa-cubes"></i>
                                <span>Create Course</span>
                            </h2>
                        </div>


                        <div class="col-2 offset-2">
                            <a href = "{{ route('course-list') }}" class="btn res-button app-red-btn">
                                <i class="fas fa-arrow-circle-left res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Go Back</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid res-mt-lg-10-3 res-mb-lg-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-1">
            <div class="container res-mt-lg-10-3 res-mb-lg-10-5">
                <div class="row">

                    <div class="col-lg-6 offset-lg-3">
                        
                        <form action = "{{ route('course-save') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "course-title" placeholder = "Enter course title" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea id = "course-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "course-overview" rows="4" placeholder = "Enter course description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file form-control res-text-9 res-text-sm-8 res-text-md-9">
                                                    <i class="far fa-image upload-image-icon res-text-9 res-text-sm-8 res-text-md-9 mr-1" aria-hidden="true"></i> Upload <input type="file" id="imgInp" name = "course-image">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload'/>
                                    </div>
                                    <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Create Course</span>
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
