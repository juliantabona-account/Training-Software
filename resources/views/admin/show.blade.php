@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        .profile-image{

            width: 80px;
            height: 80px;
            border-radius: 100% !important;
            border: 2px solid #e4e4e4;
            padding: 4px;

        }

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
                                <i class="fa fa-user"></i>
                                <span>Admin / <a href = "/admins/1" class = "res-text-8 res-text-md-7 res-text-lg-5">Adam</a></span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-3 offset-sm-5 col-md-2 offset-md-6 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('course-list') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Courses</span>
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

                    <div class="col-lg-3">

                        <div class="card">
                            <div class="card-body">
                                <img data-src="holder.js/200x200" 
                                     class="rounded mb-2 profile-image" 
                                     src="/assets/icons/profile-placeholder.jpg">
                                     <p class = "ml-2 res-brs-t res-brs-b pb-3 pt-3 res-text-9 res-text-sm-8 res-text-md-9">I'm a passionate leader with a proven track record for translating complex ideas into slick, successful campaigns.</p>
                                <dl class="dl-horizontal ml-2">
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">First Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">Julian</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Last Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">Tabona</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Company:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">Haselden</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Created At:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">22 Jan 2017</dd>
                                </dl>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7">

                        <div class="card">
                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="progress-link" data-toggle="tab" href="#progressTab" role="tab"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="discussion-link" data-toggle="tab" href="#discussionTab" role="tab"><i class="fa fa-gear" aria-hidden="true"></i> Settings</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="progressTab" role="tabpanel" aria-labelledby="progress-tab">
                                        
                                        <div class = "row mt-4">
                                            <div class = "col-8">
                                                <div class="alert alert-primary" role="alert">
                                                    <i class="fa fa-info-circle"></i> Basic Details
                                                </div>
                                            </div>
                                        </div>

                                        <div class = "row">
                                            <div class = "col-12 mt-2">

                                                <form action = "{{ route('client-save') }}" method="POST">
                                                {{ csrf_field() }}

                                                    <div class="form-group">
                                                        <input type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "first-name" placeholder = "Enter First Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "last-name" placeholder = "Enter Last Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type = "email" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "email" placeholder = "Enter Email" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <textarea class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "email" placeholder = "About yourself" required></textarea>
                                                    </div> 

                                                    <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save Changes</span>
                                                    </button>

                                                </form>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="discussionTab" role="tabpanel" aria-labelledby="messages-tab">

                                        <div class = "row mt-4">
                                            <div class = "col-8">
                                                <div class="alert alert-primary" role="alert">
                                                    <i class="fa fa-lock"></i> Password Settings
                                                </div>
                                            </div>
                                        </div>

                                        <form action = "{{ route('client-save') }}" method="POST">
                                        {{ csrf_field() }}

                                            <div class="form-group">
                                                <input type = "password" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "old-password" placeholder = "Enter old password" required>
                                            </div>

                                            <div class="form-group">
                                                <input type = "password" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "new-password" placeholder = "Enter new password" required>
                                            </div>

                                            <div class="form-group">
                                                <input type = "password" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "password-confirm" placeholder = "Confirm new password" required>
                                            </div> 

                                            <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save Changes</span>
                                            </button>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
