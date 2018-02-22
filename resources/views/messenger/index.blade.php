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
                                <i class="fa fa-envelope"></i>
                                <span>Messages</a></span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-3 offset-sm-5 col-md-2 offset-md-6 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('client-list') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-plus res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">New Message</span>
                            </a>
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

                    <div class="col-lg-4">

                        <div class="card">
                        	<div class="card-heading">
                        		<h2 class = "res-text-8 pt-3 pl-3 pb-3 bg-primary text-white mb-0">Recent Messages</h2>
                        	</div>
                            <div class="card-body thread-body pt-2 pl-0 pr-0">

								@each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8">

                        <div class="card">
                        	<div class="card-heading">
                        		<h2 class = "res-text-8 pt-3 pl-3 pb-3 bg-primary text-white mb-0">Discussions With Julian</h2>
                        	</div>
                            <div class="card-body pt-2 pl-0 pr-0">

                                <div class="chat-discussion">

                                    <div class = "alert alert-warning m-2 p-4">
                                        <i aria-hidden="true" class="fa fa-arrow-circle-left res-text-9"></i>
                                        <span class = "mr-2">Pick a thread to read...</span> 
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

