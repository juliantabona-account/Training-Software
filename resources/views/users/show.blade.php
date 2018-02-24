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
                                <span>Profile / <a href = "/users/{{ $user->id }}" class = "res-text-8 res-text-md-7 res-text-lg-5">{{ $user->first_name }} {{ $user->last_name }}</a></span>
                            </h2>
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
                                <img class="rounded mb-2 profile-image" 
                                     src="http://saleschief-bucket.s3.amazonaws.com/assets/icons/profile-placeholder.jpg" img-died="image">
                                    <p class = "ml-2 res-brs-t res-brs-b pb-2 pt-3 res-text-9 res-text-sm-8 res-text-md-9">{{ $user->bio }}</p>
                                <dl class="dl-horizontal ml-2">
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">First Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $user->first_name }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Last Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $user->last_name }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9 pt-2"><i class="fa fa-phone"></i></dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9 res-brs-t pt-2">{{ $user->mobile }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9"><i class="fa fa-envelope"></i></dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $user->email }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9 pt-2">Gender:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9 res-brs-t pt-2">{{ $user->gender }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Year Of Birth:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $user->year_of_birth }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Created At:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ Carbon\Carbon::parse($user->created_at)->format('M j Y') }}</dd>
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

                                                <form action = "{{ route('client-save-update', [$user->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <input type = "hidden" name = "url" value = "/users/{{ $user->id }}">
                                                    <input type = "hidden" name = "old_email" value = "{{ $user->email }}">
                                                    <div class="row">
                                                        <div class="col-md-12"> 
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input id="first_name" type="text" value = "{{ $user->first_name }}" class="form-control res-text-9{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="First Name *" required autofocus>
                                                                        @if ($errors->has('first_name'))
                                                                            <span class="help-block invalid-feedback">
                                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                 </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input id="last_name" type="text" value = "{{ $user->last_name }}" class="form-control res-text-9{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name *" required>

                                                                        @if ($errors->has('last_name'))
                                                                            <span class="help-block invalid-feedback">
                                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <input id="email" type="email" class="form-control res-text-9{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" placeholder="E-mail address *" required>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block invalid-feedback">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-12 mt-3">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="mobile" class = "res-text-9">Mobile Number</label>
                                                                        <input id="mobile" type="text"  value="{{ $user->mobile }}" class="form-control res-text-9{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" placeholder="75 XXX XXX *" required>

                                                                        @if ($errors->has('mobile'))
                                                                            <span class="help-block invalid-feedback">
                                                                                <strong>{{ $errors->first('mobile') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                 </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <fieldset class="form-group">
                                                                            <label for="gender" class = "res-text-9">Gender</label>
                                                                            <select id="gender" class="form-control res-text-9{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                                                                <option value = "Male" {{$user->gender == "Male" ? 'selected':''}}>Male</option>
                                                                                <option value = "Female" {{$user->gender == "Female" ? 'selected':''}}>Female</option>
                                                                            </select>
                                                                            @if ($errors->has('gender'))
                                                                                <span class="help-block invalid-feedback">
                                                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </fieldset>
                                                                    </div>
                                                                 </div>
                                                                <div class="col-md-4">
                                                                    <fieldset class="form-group">
                                                                        <label for="year_of_birth" class = "res-text-9">Year Of Birth</label>

                                                                        @php
                                                                            $startYears = 1900;
                                                                            $endYears = date("Y") - 16;
                                                                        @endphp

                                                                        <select id="year_of_birth" class="form-control res-text-9{{ $errors->has('year_of_birth') ? ' is-invalid' : '' }}" name="year_of_birth">
                                                                            @for ($years = $startYears; $years < $endYears; $years++)
                                                                                <option value = "{{ $years }}" {{$user->year_of_birth == $years ? 'selected':''}}>{{ $years }}</option>
                                                                            @endfor

                                                                        </select>

                                                                        @if ($errors->has('year_of_birth'))
                                                                            <span class="help-block invalid-feedback">
                                                                                <strong>{{ $errors->first('year_of_birth') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </fieldset>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                                        <label for="bio" class = "res-text-9">About (Describe yourself)</label>
                                                                        <textarea id="bio" class="form-control res-text-9{{ $errors->has('bio') ? ' is-invalid' : '' }}" name="bio" placeholder="Tell us something short about yourself" required>{{ $user->bio }}</textarea>

                                                                        @if ($errors->has('bio'))
                                                                            <span class="help-block invalid-feedback">
                                                                                <strong>{{ $errors->first('bio') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

                                        <form action = "{{ route('user-password-update', [$user->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="col-md-12">
                                                <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class = "res-text-9">Current Password</label>
                                                    <input id="myPassword" type="password" class="form-control res-text-9" name="password" value="{{ old('password') }}" required>
                                                    @if ($errors->has('password'))
                                                        <span class="help-block res-text-9">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </fieldset>

                                                @if ($errors->has('password'))
                                                    <span class="help-block invalid-feedback res-text-9">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <label for="password-confirm" class = "res-text-9">Confirm Current Password</label>
                                                    <input id="password-confirm" type="password" class="form-control res-text-9" name="password_confirmation" value="{{ old('password-confirm') }}" required>
                                                </fieldset>

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block invalid-feedback">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>    

                                            <div class="col-md-12">
                                                <fieldset class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                    <label for="password" class = "res-text-9">New Password</label>
                                                    <input id="myPassword" type="password" class="form-control res-text-9" name="new-password" value="{{ old('new-password') }}" required>
                                                    @if ($errors->has('new-password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('new-password') }}</strong>
                                                        </span>
                                                    @endif
                                                </fieldset>

                                                @if ($errors->has('new-password'))
                                                    <span class="help-block invalid-feedback">
                                                        <strong>{{ $errors->first('new-password') }}</strong>
                                                    </span>
                                                @endif
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
