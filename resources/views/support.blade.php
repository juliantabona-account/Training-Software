@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
  
    <style>

        .overlay {
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
    <div class="container-fluid p-0">
        <div class="overlay res-pt-10-6 res-pb-10-6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 offset-lg-1 res-pt-10-1">
                        
                        <form action = "" method="" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card">

                                <div class="card-header">
                                    <h2 class = "res-text-8 res-text-sm-8 res-text-md-8 mt-2"><strong>Customer Support</strong></h2>
                                    <p class = "res-text-9 res-text-sm-9 res-text-md-9 mb-1">Send us a message of any questions or queries you have and we will promply get back to you. Thank you</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type = "text" class="form-control res-text-9 res-text-sm-9 res-text-md-9" name = "firstname" placeholder = "Enter First Name" required />
                                    </div>  


                                      <div class="form-group">
                                        <input type = "email" class="form-control res-text-9 res-text-sm-9 res-text-md-9" name = "email" placeholder = "Enter your Email" required />
                                    </div> 


                                    <div class="form-group">
                                        <textarea id = "message" class="form-control res-text-9 res-text-sm-9 res-text-md-9" name = "message" rows="4" placeholder = "Your Message" required></textarea>
                                    </div>
                                   
                                    <button type="submit" class="btn res-button app-red-btn px-sm-5  mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Send Message</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div> 

                     <div class="col-lg-4 res-pt-10-1">
                        <div class="card">
                            <div class="card-header">
                                <h2 class = "res-text-8 res-text-sm-8 res-text-md-8 mt-2"><strong>Get In Touch</strong></h2>
                                <p class = "res-text-9 res-text-sm-9 res-text-md-9 mb-1">Reach our IT & Customer departments and we will help you in your area of need. Also Look into our FAQ for additional resources.</p>
                            </div>
                            <div class="card-body">
                             	<h1 class = "res-text-9 res-text-sm-9 res-text-md-8">IT support: +267 75993221</h1>
                                <h1 class = "res-text-9 res-text-sm-9 res-text-md-8 pb-2">Customer support: +267 75993221</h1>
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><a href = "#" class = "res-text-9 res-text-sm-7 res-text-md-9">FAQ (Frequently Asked Questions)</a></li>
                                </ul
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
