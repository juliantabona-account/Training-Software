@extends('layouts.app')

@section('title')
    Welcome｜
@endsection

@section('style')
    
    <style>

        #app-intro-section {
            background: url('http://saleschief-bucket.s3.amazonaws.com/assets/backgrounds/man-using-tablet.jpg') no-repeat center center fixed; 
            background-position: center top;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            position:relative;
            height: 50vh;
        }

        @media (min-width: 576px) { 
            #app-intro-section{
                height: 30rem !important;
            }
        }

        @media (min-width: 768px) { 
            #app-intro-section{
                height: 29rem !important;
            }
        }


        @media (min-width: 992px) { 
            #app-intro-section{
                height: 29rem !important;
            }
        }

        @media (min-width: 1200px) { 
            #app-intro-section{
                height: 29rem !important;
            }
        }


        .intro-box {
            margin-top: 140px;
            background:#fff6;
            position:relative;
        }

        .intro-box h1{
            color: #0e624f;
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
            background:#84ffb60d;
        }

        .app-ribbon-strip{
            background: #0e624f;
        }

        .app-ribbon-strip h3{
            color: #fff;
        }

        .light-green-grey-bg{
            background: #ebf0f0;
        }

        .goals-list{
            list-style-image: url('http://saleschief-bucket.s3.amazonaws.com/assets/icons/bullet-checklist.png');
        }

    </style>

@endsection


@section('content')

    <div id = "app-intro-section" class="col-md-12">

        <div class="overlay">

            <div class="container mb-md-5">
                <div class="row">
                    <div class="intro-box m-3 mt-5 p-5 col-sm-12 p-sm-5 col-md-7 offset-md-1 p-md-5 res-mt-10-4 res-mt-md-10-7 res-mt-sm-10-12">
                        <h1 class = "res-text-8 res-text-sm-5 res-text-md-1">Make sales happen now.</h1>
                        <h4 class = "res-text-9 res-text-sm-7 res-text-md-7">Obsessed with winning: we give salespeople in BW the tools and ongoing mentorship they need to truly succeed.</h4>
                    
                        <button type="submit" class="btn res-button app-red-btn mt-3">
                            <span class = "res-text-9 res-text-sm-7 res-text-md-7">Learn More</span>
                            <i class="fa fa-angle-double-right res-text-9 res-text-sm-7 res-text-md-7" aria-hidden="true"></i>
                        </button>
                        <img src = "http://saleschief-bucket.s3.amazonaws.com/assets/icons/dot-graph.png" style = "width:100%;">
                    </div>
                </div>
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

                    <a href="/login" style = "border: 1px solid #ffffff !important;" class="btn res-button app-red-btn float-none float-md-right res-brd-white">
                        <span class = "res-text-md-7 res-text-9 res-text-sm-7 res-text-md-7">Start Here</span>
                        <i class="fa fa-angle-double-right res-text-9 res-text-sm-7 res-text-md-7" aria-hidden="true"></i>
                    </a>

                </div>
                
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-6 pl-0 pt-5 light-green-grey-bg">

                <img style = "width:100%;" src = "http://saleschief-bucket.s3.amazonaws.com/assets/icons/sale-targets.png">         

            </div>

            <div class="col-12 col-lg-6 pt-5 light-green-grey-bg">

                <h3 class = "res-text-2 res-text-md-2 res-text-lg-05 pt-4 pb-1">No more missed targets in 2018</h3>     

                <p>Salespeople have the toughest jobs in Botswana today. The competition is fierce. The budgets are tight. And the price wars continue. </p>    

                <p>As the business community navigates its way through uncertain times, one thing is clear: the battle will be won — or lost — in the sales department.</p>    
                
                <p>So, how well prepared are your salespeople to meet these pressing demands? </p>    

                <p>At SALESCHIEF, we grow sales teams. We help them to</p>
            
                <ul class = "goals-list">
                    <li>Set bigger goals, and develop systems to reach them Master the cold calling skills necessary to make a greatfirst impression</li>
                    <li>Overcome common objections with professionalism and confidence</li>
                    <li>Close high value deals and nurture ongoing relationships with your best clients.</li>
                </ul>

            </div>
            
        </div>
    </div>

@endsection
