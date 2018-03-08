@extends('layouts.app')

@section('title')
    Register｜
@endsection

@section('style')
    
    <style>

        html, body {
            background: url('http://saleschief-bucket.s3.amazonaws.com/assets/backgrounds/coffee-break-meeting.jpg') no-repeat center center fixed; 
            background-position: center top;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        #app-register-card{
            margin-top: 120px;
            background:#ffffffe6;
        }

    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div id = "app-register-card" class="card card-default">

                    <div class="card-body">
                        
                        <div class = "col-md-10 mb-md-4 mt-md-4">
                            <h3>Register</h3>
                        </div>

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="First Name *" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email *" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password *" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password *" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn px-sm-5 app-red-btn float-right mr-lg-3">
                                        Register
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
