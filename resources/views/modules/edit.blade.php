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
                                <i class="fas fa-pencil-alt"></i>
                                <span>Edit Module</span>
                            </h2>
                        </div>


                        <div class="col-2 offset-2">
                            <a href = "/courses/{{ $course_id }}/edit" class="btn res-button app-red-btn">
                                <i class="fas fa-arrow-circle-left res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Go Back</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container res-mt-lg-10-3 res-mb-lg-10-5">
        <div class="row">

            <div class="col-lg-6 offset-lg-3">
                <form action = "/courses/{{ $course_id }}/module/{{ $module->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mt-2">
                                <label for="moduleTitle">Module Title:</label>
                                <input id = "moduleTitle" type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-8" name = "module-title" placeholder = "Enter module title" value = "{{ $module->title }}" required />
                            </div>
                            <button type = "submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                <i class="fas fa-save res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save</span>
                            </button>
                        </div>
                    </div>

                </form>


            </div>

        </div>
    </div>



@endsection
