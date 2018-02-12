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
                                <i class="fas fa-user"></i>
                                <span>Create Client</span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-3 offset-sm-5 col-md-2 offset-md-6 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('client-list') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fas fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Clients</span>
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

                        @if(Session::has('status'))
                            <div class="alert alert-{{ Session::get('type') }}" role="alert">
                                <span class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fas fa-user mr-1"></i> {{ Session::get('status') }}</span>
                                <button type="button" class="close mt-2 d-block res-text-9 res-text-sm-9 res-text-md-9" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
                        <form action = "{{ route('client-save') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "first-name" placeholder = "Enter First Name" required>
                                    </div>

                                    <div class="form-group">
                                        <input type = "email" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "email" placeholder = "Enter Email" required>
                                    </div> 

                                    <select class="form-control res-text-9 res-text-sm-8 res-text-md-9" name="course_id">
                                        @foreach($courses as $course)
                                          <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Enroll Client</span>
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
