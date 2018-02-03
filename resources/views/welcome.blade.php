@extends('layouts.app')

@section('title')
    Welcome｜
@endsection

@section('style')
    
    <style>

        #app-intro-section {
            background: url('/assets/backgrounds/man-using-tablet.jpg') no-repeat center center fixed; 
            background-position: center top;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            position:relative;
            height: 90vh;
        }

        .intro-box {
            margin-top: 140px;
            background:#fff6;
            position:relative;
        }

        .intro-box h1{
            color: #c72127;
            font-weight: 900;
        }

        .intro-box h4{
            font-size: 21px;
            line-height: 28px;
        }

        .intro-box img{
            position:absolute; 
            left:0px;           
            bottom:0px;
        }

        .overlay{
            top:0;
            left:0;
            right:0;
            bottom:0;
            position:absolute;
            background:#ff848433;
        }

        .app-ribbon-strip{
            position: absolute;
            bottom: 0;
            background: #2f8fbbd4;
        }

        .app-ribbon-strip h3{
            color: #fff;
        }

    </style>

@endsection


@section('content')

    <div id = "app-intro-section" class="col-md-12">

        <div class="overlay">

            <div class="container mb-md-5">
                <div class="row">
                    <div class="intro-box m-3 mt-5 p-5 col-sm-12 p-sm-5 col-md-6 offset-md-1 p-md-5 res-mt-10-4 res-mt-md-10-7 res-mt-sm-10-12">
                        <h1 class = "res-text-md-1 res-text-sm-5 res-text-6 res-text-8">Make sales happen now.</h1>
                        <h4 class = "res-text-9 res-text-sm-7 res-text-md-7">Obsessed with winning: we give salespeople in BW the tools and ongoing mentorship they need to truly succeed.</h4>
                    
                        <button type="submit" class="btn res-button app-red-btn mt-3">
                            <span class = "res-text-9 res-text-sm-7 res-text-md-7">Learn More</span>
                            <i class="fa fa-angle-double-right res-text-9 res-text-sm-7 res-text-md-7" aria-hidden="true"></i>
                        </button>
                        <img src = "/assets/icons/dot-graph.png" style = "width:100%;">
                    </div>
                </div>
            </div>

            <div class="container-fluid app-ribbon-strip">
                <div class="container">
                    <div class="row pt-md-4 pb-sm-4">

                        <div class="mt-4 col-12 col-sm-7 col-md-8">

                            <h3 class = "res-text-md-4 res-text-sm-6 res-text-6 res-text-7">Do you have an innovative business idea?</h3>

                        </div>

                        <div class="mt-2 mb-4 mt-sm-4 col-12 col-sm-5 col-md-4">

                            <button type="submit" class="btn res-button app-red-btn float-none float-md-right">
                                <span class = "res-text-md-7 res-text-9 res-text-sm-7 res-text-md-7">Start Here</span>
                                <i class="fa fa-angle-double-right res-text-9 res-text-sm-7 res-text-md-7" aria-hidden="true"></i>
                            </button>

                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

        <div class="container-fluid">
            <div class="container">
                <div class="row pt-md-4 pb-md-4">

                    <div class="col-md-10 offset-1">

                        <h3>NEXT SECTION</h3>         

                    </div>
                    
                </div>
            </div>
        </div>


@endsection
