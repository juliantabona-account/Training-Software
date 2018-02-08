@extends('layouts.app')

@section('title')
    Admin Login｜
@endsection

@section('style')
    
    <style>

        html, body {
            background: url('/assets/backgrounds/coffee-break-meeting.jpg') no-repeat center center fixed; 
            background-position: center top;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div id = "app-single-form-card" class="card card-default res-mt-10-3 res-mt-sm-10-10 res-mt-md-10-15">

                    <div class="card-body">
                        
                        <div class="col-md-10 mb-md-4 mt-md-4 mb-4">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">Admin Log In</h2>
                        </div>

                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control res-text-9 res-text-sm-8 res-text-md-8" name="email" value="{{ old('email') }}" placeholder="E-mail address *" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control res-text-9 res-text-sm-8 res-text-md-8" name="password" placeholder="Password *" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="col-12">
                                    <div class="checkbox">
                                        <label class = "res-text-9 res-text-sm-8 res-text-md-8">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-md-6 float-md-right">
                                        <a class="btn btn-link ml-1 mt-0 mb-3 mt-sm-0 res-text-9 res-text-sm-8 res-text-md-8" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6 float-md-left">
                                        <button type="submit" class="btn res-button app-red-btn px-sm-5  mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
