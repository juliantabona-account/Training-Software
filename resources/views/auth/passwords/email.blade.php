@extends('layouts.app')

@section('title')
    Reset｜
@endsection

@section('style')
    
    <style>

        #app-reset-section {
            background: url('http://saleschief-bucket.s3.amazonaws.com/assets/backgrounds/blurred-audience.jpg') no-repeat center center fixed; 
            background-position: center top;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            position:relative;
            height: 80vh;
        }

        .overlay{
            top:0;
            left:0;
            right:0;
            bottom:0;
            position:absolute;
            background:#00000024;
        }

    </style>

@endsection

@section('content')
<div id = "app-reset-section" class="col-md-12">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div id = "app-single-form-card" class="card card-default res-mt-10-3 res-mt-sm-10-10 res-mt-md-10-15">

                        <div class="card-body">

                            <div class = "col-md-12 mb-md-4 mt-md-4">
                                <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">Reset Password</h2>
                                <p class = "res-text-9 res-text-sm-8 res-text-md-8">To get a new password just enter your E-mail address and a password reset link will be sent to your E-mail.</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control res-text-9 res-text-sm-9 res-text-md-9" name="email" value="{{ old('email') }}" placeholder="Enter E-Mail Address *" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn res-button app-red-btn px-sm-5  mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                                Send
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
    </div>
</div>
@endsection
