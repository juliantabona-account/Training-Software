@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>
        
        .thread-body{

            overflow: auto;
            max-height: 450px;

        }

        .thread-body .notification-meta span.timestamp {
            font-size: 0.6em !important;
        }

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-10-2 res-brs-t res-brs-lg-t-n res-brs-b">

        <div class="container-fluid res-pt-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 offset-lg-3 pt-1 pt-lg-0">
                            <h2 class = "res-text-8 res-text-md-6 res-text-lg-3">
                                <i class="fa fa-bell"></i>
                                <span>Notification</a></span>
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

                    <div class="offset-lg-2 col-lg-9">

                        <div class="card">
                        	<div class="card-heading">
                        		<h2 class = "res-text-8 pt-3 pl-3 pb-3 bg-primary text-white mb-0">Notifications History</h2>
                        	</div>
                            <div class="card-body pt-2 pl-0 pr-0">

                                <div class="notifications-box">

                                <ul class = "notification-scrollbox p-0">
                                    @include('layouts.notification.partials.flash')

                                    @each('layouts.notification.notification', Auth::user()->notifications, 'notification', 'layouts.notification.partials.no-notifications')
                                </ul>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

