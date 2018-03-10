@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>


    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-10-2 res-brs-t res-brs-lg-t-n res-brs-b">

        <div class="container-fluid res-pt-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 offset-lg-3 pt-1 pt-lg-0">
                            <h2 class = "res-text-8 res-text-md-6 res-text-lg-3">
                                <i class="fa fa-cubes"></i>
                                <span>Create Course</span>
                            </h2>
                        </div>
                        @if(Auth::user()->hasRole('admin'))
                            <div class="col-12 offset-sm-5 col-sm-3 offset-md-6 col-md-2 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                                <a href = "{{ route('course-list') }}" class="btn btn-sm res-button app-red-btn float-right">
                                    <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                    <span class = "res-text-9">View Courses</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid res-mt-lg-10-3 res-mb-lg-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-1">
            <div class="container res-mt-10-5 res-mb-10-5">

                @include('response.message')

                <div class="row">

                    <div class="col-lg-6 offset-lg-3">
                        
                        <form action = "{{ route('course-save') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type = "text" class="form-control res-text-9{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" name = "title" placeholder = "Enter course title" required />
                                        
                                        @if ($errors->has('title'))
                                            <span class="help-block invalid-feedback res-text-9">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <textarea id = "overview" class="form-control res-text-9{{ $errors->has('overview') ? ' is-invalid' : '' }}" name = "overview" rows="4" placeholder = "Enter course description" required>{{ old('overview') }}</textarea>

                                        @if ($errors->has('overview'))
                                            <span class="help-block invalid-feedback res-text-9">
                                                <strong>{{ $errors->first('overview') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file form-control res-text-9 res-text-sm-9 res-text-md-9">
                                                    <i class="fa fa-picture-o res-text-9 res-text-sm-8 res-text-md-9 mr-1" aria-hidden="true"></i> Upload <input type="file" id="imgInp" class = "form-control res-text-9{{ $errors->has('upload') ? ' is-invalid' : '' }}" name = "upload">
                                                    @if ($errors->has('upload'))
                                                        <span class="ml-2 help-block invalid-feedback res-text-9">
                                                            <strong> | {{ $errors->first('upload') }}</strong>
                                                        </span>
                                                    @endif
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload'/>
                                    </div>
                                    <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9" app-load="creating course...">Create Course</span>
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
