@extends('layouts.app')

@section('title')
    Reset｜
@endsection

@section('style')
    
    <style>

        html, body {
            background: url('http://saleschief-bucket.s3.amazonaws.com/assets/backgrounds/blurred-audience.jpg') no-repeat center center fixed; 
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
            <div id = "app-login-card" class="card card-default res-mt-10-3 res-mb-10-10 res-mt-sm-10-10 res-mt-md-10-15">
                @include('response.message')
                <div class="card-body">
                    
                    <div class = "col-md-12 mb-md-4 mt-md-4">
                        <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">Reset Password</h2>
                    </div>

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control res-text-9{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-Mail Address *" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block invalid-feedback res-text-9">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control res-text-9{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password *" required>

                                @if ($errors->has('password'))
                                    <span class="help-block invalid-feedback res-text-9">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control res-text-9{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password *" required>

                                @if ($errors->has('password'))
                                    <span class="help-block invalid-feedback res-text-9">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn res-button app-red-btn px-sm-5 mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                    Reset Password
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
