@extends('layouts.app')

@section('title')
    Admin Login｜
@endsection

@section('style')
    
    <style>

        .process-step .btn:focus{
            outline:none
        }
        .process{
            display:table;
            width:100%;
            position:relative
        }
        .process-row{
            display:table-row
        }
        .process-step button[disabled]{
            opacity:1 !important;
            filter: alpha(opacity=100) !important
        }
        .process-step .fa {
            font-size: 2em;
        }
        .process-row:before{
            top:40px;
            bottom:0;
            position:absolute;
            content:" ";
            width:100%;
            height:1px;
            background-color:#ccc;
            z-order:0
        }
        .process-step{
            display:table-cell;
            text-align:center;
            position:relative
        }
        .btn-circle{
            width:80px;
            height:80px;
            text-align:center;
            font-size:10px;
            border-radius:50%
        }

    </style>

@endsection

@section('content')

    <div class="container"> 
        <div class="row res-mt-10-5">
            <div class="process">
                <ul class="process-row nav nav-tabs"> 
                    <li class="process-step nav-item" data-toggle="tooltip" data-placement="top" title="Step 1: Complete Profile">
                        <button type="button" class="btn btn-info btn-circle" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            <i class="fa fa-user fa-3x"></i>
                        </button>
                    </li>
                    <li class="process-step nav-item" data-toggle="tooltip" data-placement="top" title="Step 2: Upload Profile Image">
                        <button type="button" class="btn btn-default btn-circle" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">
                            <i class="fa fa-image fa-3x"></i>
                        </button>
                    </li>
                    <li class="process-step nav-item" data-toggle="tooltip" data-placement="top" title="Step 3: Secure Password">
                        <button type="button" class="btn btn-default btn-circle" id="lock-tab" data-toggle="tab" href="#lock" role="tab" aria-controls="lock" aria-selected="false">
                            <i class="fa fa-lock fa-3x"></i>
                        </button>
                    </li>
                    <li class="process-step nav-item" data-toggle="tooltip" data-placement="top" title="Step 4: You're Done, Submit!">
                        <button type="button" class="btn btn-default btn-circle" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="done" aria-selected="false">
                            <i class="fa fa-check fa-3x"></i>
                        </button>
                    </li>
                </ul>
                <input id = "activeTab" type = "hidden" value = "#profile-tab">
            </div>
        </div>

        <div class="row res-mt-10-5 res-mb-10-10 col-">
            <div class="col-sm-11 offset-sm-1">

                <form method="POST" action="{{ route('client-save-update', [$client->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <input type = "hidden" value = "{{ $client->email }}" name = "old_email">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <ul class="list-unstyled list-inline pull-right">
                                <li><button type="button" class="btn btn-info next-step res-text-9">Next <i class="fa fa-chevron-right"></i></button></li>
                            </ul>

                            <h3>Profile Information</h3>
                            <p class = "res-text-9">Lets get your profile setup. Lets start with your basic information then click on the next button to continue</p>

                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="first_name" type="text" value = "{{ $client->first_name }}" class="form-control res-text-9{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="First Name *" required autofocus>
                                                @if ($errors->has('first_name'))
                                                    <span class="help-block invalid-feedback">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                         </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input id="last_name" type="text"  value="{{ old('last_name') }}" class="form-control res-text-9{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name *" required>

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
                                    <input id="email" type="email" class="form-control res-text-9{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $client->email }}" placeholder="E-mail address *" required>

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
                                                <input id="mobile" type="text"  value="{{ old('mobile') }}" class="form-control res-text-9{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" placeholder="75 XXX XXX *" required>

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
                                                        <option value = "Male" {{old('gender') == "Male" ? 'selected':''}}>Male</option>
                                                        <option value = "Female" {{old('gender') == "Female" ? 'selected':''}}>Female</option>
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
                                                        <option value = "{{ $years }}" {{old('year_of_birth') == $years ? 'selected':''}}>{{ $years }}</option>
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
                                                <textarea id="bio" class="form-control res-text-9{{ $errors->has('bio') ? ' is-invalid' : '' }}" name="bio" placeholder="Tell us something short about yourself" required>
                                                    {{ old('bio') }}
                                                </textarea>

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
                        </div>

                        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">

                            <ul class="list-unstyled list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step res-text-9"><i class="fa fa-chevron-left"></i> Back</button>
                                    <button type="button" class="btn btn-info next-step res-text-9">Next <i class="fa fa-chevron-right"></i></button>
                                </li>
                            </ul>

                            <h3>Profile Picture (Optional)</h3>
                            <p class = "res-text-9">Upload a profile picture if you have one. This will help make your account unique. If you don't have any skip this step</p>

                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file form-control res-text-9 res-text-sm-8 res-text-md-9">
                                                    <i class="fa fa-picture-o res-text-9 res-text-sm-8 res-text-md-9 mr-1" aria-hidden="true"></i> Upload <input type="file" id="imgInp" name = "profile-image">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload'/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="lock" role="tabpanel" aria-labelledby="lock-tab">

                            <ul class="list-unstyled list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step res-text-9"><i class="fa fa-chevron-left"></i> Back</button>
                                    <button type="button" class="btn btn-info next-step res-text-9">Next <i class="fa fa-chevron-right"></i></button>
                                </li>
                            </ul>

                            <h3>Account Password</h3>
                            <p class = "res-text-9">Upload a profile picture if you have one. This will help make your account unique. If you don't have any skip this step</p>

                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <input id="myPassword" type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </fieldset>

                                    @if ($errors->has('password'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="col-md-12">
                                    <fieldset class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password-confirm') }}" required>
                                    </fieldset>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>    
                            </div>

                        </div>
                        <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="done-tab">

                            <h3>You're Done</h3>
                            <p class = "res-text-9 res-brs-b pb-5">Good job! from here on just submit your profile details and we will add you to our sales course. </p>

                            <ul class="list-unstyled list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step res-text-9"><i class="fa fa-chevron-left"></i> Back</button>
                                    <button type="submit" class="btn btn-success res-text-9"><i class="fa fa-check"></i> Submit!</button>
                                </li>
                            </ul>

                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection

@section('js')

    <script>

        $(document).ready(function(){

            //$('.btn-circle').on('click',function(){
               
                //$('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
                //$(this).addClass('btn-info').removeClass('btn-default').blur();
            
            //});

        

            $('.btn-circle').on('shown.bs.tab', function (e) {
                //e.target // newly activated tab
                //e.relatedTarget // previous active tab
                
                var new_tab = e.target;
                var previous_tab = $( $('#activeTab').val() )[0];
                var new_tab_content = $(new_tab).attr('href');
                var previous_tab_content = $(previous_tab).attr('href');

                if( $(previous_tab).attr('id') == 'profile-tab' ){
                    checkProfile();
                }else if( $(previous_tab).attr('id') == 'image-tab' ){

                }else if( $(previous_tab).attr('id') == 'lock-tab' ){
                    checkPassword();
                }else if( $(previous_tab).attr('id') == 'done-tab' ){

                }

                var proceedable = $(e.target).hasClass('proceedable');

                if(!proceedable){

                    $(new_tab).removeClass('btn-info active').addClass('btn-default');
                    $(previous_tab).addClass('btn-info active proceedable').removeClass('btn-default').blur();

                    $(new_tab_content).removeClass('show active');
                    $(previous_tab_content).addClass('show active');
                
                }else{

                    $(new_tab).addClass('btn-info active').addClass('btn-default');
                    $(previous_tab).removeClass('btn-info active').addClass('btn-default proceedable').blur();

                    $(new_tab_content).addClass('show active');
                    $(previous_tab_content).removeClass('show active');

                    $('#activeTab').val( '#' + $(new_tab).attr('id') );

                }



            });

            //$('#image-tab').on('shown.bs.tab', function (e) {
                //if($('#image-tab').hasClass('proceedable')){

                //}
            //});

            $(document).on("click",".next-step, .prev-step",function(e) {

                //console.log('click detected');

                var $activeTab = $('.tab-pane.active');

                //console.log('got the active tab');

                //console.log('resetting all tooltips');

                $('.process-step:nth-child(1)').attr('data-original-title', 'Step 1: Complete Profile').tooltip('hide');
                $('.process-step:nth-child(2)').attr('data-original-title', 'Step 2: Upload Profile Image').tooltip('hide');
                $('.process-step:nth-child(3)').attr('data-original-title', 'Step 3: Secure Password').tooltip('hide');
                $('.process-step:nth-child(4)').attr('data-original-title', 'Step 4: You\'re Done, Submit!').tooltip('hide');

                //console.log('resetting all errors');

                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');

                //console.log('check: if this is the next button');

                if ( $(this).hasClass('next-step') )
                {

                    //console.log('checked: pressed the next button');

                    var nextTab = $activeTab.next('.tab-pane').attr('id');
                    
                    //console.log('check: if the next tab is the image tab');

                    if(nextTab == 'image'){

                        //console.log('checked: its the image tab');

                        error = checkProfile();

                        //console.log('error check complete');

                    }else if(nextTab == 'lock'){

                        error = false;

                    }else if(nextTab == 'done'){
                        
                        //console.log('checked: its the lock tab');

                        error = checkPassword();

                    }

                    if(!error){
                        console.log('checked: no errors found');
                        $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
                        $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
                        $('[href="#'+ nextTab +'"]').tab('show');
                    }else{

                        console.log('checked: some errors found');

                    }
               }else{
                    var prevTab = $activeTab.prev('.tab-pane').attr('id');
                    $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
                    $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
                    $('[href="#'+ prevTab +'"]').tab('show');
               }
            });
        });

        function callToolTip(step, msg){
            $('.process-step:nth-child('+step+')').attr('data-original-title', msg);
            $('.process-step:nth-child('+step+')').tooltip('show');
        }

        function msg(msg){
            return '<span class="invalid-feedback res-text-9"><strong>'+msg+'</strong></span>';
        }

        function checkProfile(){

            console.log('Check profile errors');

            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var mobile = $('#mobile').val();
            var gender = $('#gender').val();
            var year_of_birth = $('#year_of_birth').val();
            var bio = $('#bio').val();
            var error = false;

            $('.invalid-feedback').remove();
            $('input, textarea, select').removeClass('is-invalid');

            if(first_name == ''){
                error = true;
                callToolTip(1, 'Enter your first name');
                $( msg('Enter your first name') ).insertAfter( "#first_name" );
                $('#first_name').addClass('is-invalid');
            }else if(last_name == ''){
                error = true;
                callToolTip(1, 'Enter your last name');
                $( msg('Enter your last name') ).insertAfter( "#last_name" );
                $('#last_name').addClass('is-invalid');
            }else if(mobile == ''){
                error = true;
                callToolTip(1, 'Enter your mobile number');
                $( msg('Enter your mobile number') ).insertAfter( "#mobile" );
                $('#mobile').addClass('is-invalid');
            }else if(gender == ''){
                error = true;
                callToolTip(1, 'Enter your gender');
                $( msg('Enter your gender') ).insertAfter( "#gender" );
                $('#gender').addClass('is-invalid');
            }else if(year_of_birth == ''){
                error = true;
                callToolTip(1, 'Enter your year of birth');
                $( msg('Enter your year of birth') ).insertAfter( "#year_of_birth" );
                $('#year_of_birth').addClass('is-invalid');
            }else if(bio == ''){
                error = true;
                callToolTip(1, 'Say something short about yourself');
                $( msg('Say something short about yourself') ).insertAfter( "#bio" );
                $('#bio').addClass('is-invalid');

            }

            if(!error){
                $('#image-tab').addClass('proceedable');
                $('#lock-tab').addClass('proceedable');
            }else{
                $('#image-tab').removeClass('proceedable');
                $('#lock-tab').removeClass('proceedable');
                $('#done-tab').removeClass('proceedable');
            }

            return error;

        }

        function checkPassword(){

            console.log('Check profile errors');

            var password = $('#myPassword').val();
            var password_confirmation = $('#password-confirm').val();
            var error = false;

            $('.invalid-feedback').remove();
            $('input, textarea, select').removeClass('is-invalid');

            if(password == ''){
                error = true;
                callToolTip(3, 'Enter your password');
                $( msg('Enter your password') ).insertAfter( "#myPassword" );
                $('#myPassword').addClass('is-invalid');
            }else if(password.length < 6){
                error = true;
                callToolTip(3, 'Password too short');
                $( msg('Password too short (Must 6 characters or more)') ).insertAfter( "#myPassword" );
                $('#myPassword').addClass('is-invalid');
            }else if(password_confirmation == ''){
                error = true;
                callToolTip(3, 'Confirm your password');
                $( msg('Confirm your password') ).insertAfter( "#password-confirm" );
                $('#password-confirm').addClass('is-invalid');
            }else if(password != password_confirmation){
                error = true;
                callToolTip(3, 'Passwords do not match');
                $( msg('Passwords do not match') ).insertAfter( "#myPassword" );
                $('#myPassword').addClass('is-invalid');
                $('#password-confirm').addClass('is-invalid');
            }

            if(!error){
                $('#done-tab').addClass('proceedable');
            }else{
                $('#done-tab').removeClass('proceedable');
            }

            return error;

        }

    </script>

@endsection