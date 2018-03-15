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

                <div class="card-body">
                    
                            <div class = "col-md-12 mb-md-4 mt-md-4">
                                <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">Reset Activation Link</h2>
                                <p class = "res-text-9 res-text-sm-8 res-text-md-8">Enter your E-mail address and an account reset link will be sent to your E-mail. This will allow you to setup your account.</p>
                            </div>

                    <form class="form-horizontal" method="POST" action="{{ route('client-activation-reset', [$client_email]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control res-text-9{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-Mail Address *" value="{{ old('email',  $client_email) ? }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block invalid-feedback res-text-9">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn res-button app-red-btn px-sm-5 mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                    Send Activation Link
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
