@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
  
@endsection

@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">

        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-5 offset-3">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">
                                <i class="fa fa-cubes"></i>
                                <span>Contact Us For 24/7 Support Service</span>
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

                    <div class="col-lg-6 offset-lg-1">
                        
                        <form action = "" method="" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "firstname" placeholder = "Enter Firstname" required />
                                    </div>  


                                      <div class="form-group">
                                        <input type = "email" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "email" placeholder = "Enter your Email" required />
                                    </div> 


                                    <div class="form-group">
                                        <textarea id = "message" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "message" rows="4" placeholder = "Your Message" required></textarea>
                                    </div>
                                   
                                    <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Send Message</span>
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div> 

                     <div class="col-lg-4  "> 
                     	<ul>
	                        <h1>IT support +267 75993221</h1>

	                   

	                        <a href="" target="_blabk">View our privacy policy</a> 

	                        <a href="" target="_blabk">End User Agreement</a> 

	                        <a href="" target="_blabk">Client Training Manual</a> 
	                     </ul>
                      
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
