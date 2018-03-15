@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>
        .profile-image{

            width: 30px;
            height: 30px;
            border-radius: 100% !important;
            border: 2px solid #e4e4e4;
            padding: 4px;

        }

        .chat-discussion {
            border-top: 4px solid #a7a7a738;
            background: #eee;
            padding: 15px;
            height: 400px;
            overflow-y: auto;
        }

        .chat-message {
            padding: 10px 20px;
            width:80%;
        }

        .chat-discussion .chat-message.left .message-avatar {
            float: left;
        }

        .chat-discussion .chat-message.right .message-avatar {
            float: right;
        }

        .message-avatar {
            height: 25px;
            width: 25px;
            border: 1px solid #e7eaec;
            border-radius: 4px;
            margin-top: 1px;
        }

        .chat-discussion .chat-message.left .message {
            text-align: left;
            margin-left: 30px;
        }

        .chat-discussion .chat-message.right .message {
            text-align: right;
            margin-right: 30px;
        }

        .message {
            background-color: #fff;
            border: 1px solid #e7eaec;
            text-align: left;
            display: block;
            padding: 10px 20px;
            position: relative;
            border-radius: 4px;
        }

        .chat-discussion .chat-message.left .message-date {
            float: right;
        }

        .chat-discussion .chat-message.right .message-date {
            float: left;
        }

        .message-date {
            font-size: 10px;
            color: #888888;
        }

        .message-content {
            display: block;
        }

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
                                <i class="fa fa-comments"></i>
                                <span>Discussions</a></span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-3 offset-sm-5 col-md-2 offset-md-6 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('messages.create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-plus res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">New Discussion</span>
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

                        <div class="card thread-body">
                        	<div class="card-heading">
                        		<h2 class = "res-text-8 pt-3 pl-3 pb-3 bg-primary text-white mb-0">Recent Discussions {{ $threads ? '('.COUNT($threads).')': '' }}</h2>
                        	</div>
                            <div class="card-body pt-2 pl-0 pr-0">

								@each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8">

                        <div class="card">
                        	<div class="card-heading">
                        		<h2 class = "res-text-8 pt-3 pl-3 pb-3 bg-primary text-white mb-0">Discussions With 
                                    @foreach($thread->users as $user)
                                        @if(Auth::id() != $user->id)
                                            <span class = "badge badge-light p-2 pl-3 pr-3 res-text-9 mr-1">{{ $user->first_name }} {{ $user->last_name }}</span>
                                        @endif
                                    @endforeach
                                </h2>
                        	</div>
                            <div class="card-body pt-2 pb-0 pl-0 pr-0">

                                <div class="chat-discussion">

							        <h1 class = "alert alert-info res-text-8">{{ $thread->subject }}</h1>
							        @each('messenger.partials.messages', $thread->messages, 'message')

                                </div>

								<form action="{{ route('messages.update', $thread->id) }}" method="post">
								    {{ method_field('put') }}
								    {{ csrf_field() }}

								    <div class="input-group">
								        <input id="btn-input" type="text" class="form-control res-text-9 res-text-sm-9 res-text-md-9 p-3" placeholder="Say something..." name="message" value = "{{ old('message') }}"/>
								        <span class="input-group-btn">
								            <button class="btn app-red-btn btn-sm res-text-9 res-text-sm-9 res-text-md-9 p-3">Send</button>
								        </span>
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

