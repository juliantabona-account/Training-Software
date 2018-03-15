@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>
        .profile-image{

            width: 80px;
            height: 80px;
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
                                <i class="fa fa-user"></i>
                                <span>Profile / <a href = "/clients/{{ $client->id }}" class = "res-text-8 res-text-md-7 res-text-lg-5">{{ $client->first_name }}</a></span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-3 offset-sm-5 col-md-2 offset-md-6 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('client-list') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Clients</span>
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

                @include('response.message')

                <div class="row">

                    <div class="col-lg-3">

                        <div class="card">
                            <div class="card-body">
                                <img class="rounded mb-2 profile-image" 
                                     src="http://saleschief-bucket.s3.amazonaws.com/assets/icons/profile-placeholder.jpg" img-died="image">
                                     <p class = "ml-2 res-brs-t res-brs-b pb-2 pt-3 res-text-9 res-text-sm-8 res-text-md-9">{{ $client->bio }}</p>
                                <dl class="dl-horizontal ml-2">
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">First Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $client->first_name }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Last Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $client->last_name }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9 pt-2"><i class="fa fa-phone"></i></dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9 res-brs-t pt-2">{{ $client->mobile }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9"><i class="fa fa-envelope"></i></dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $client->email }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Company:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">
                                    @if($client->company_id)
                                        <a href = "/companies/{{ $client->company->id }}">{{ $client->company->name }}</a></dd>
                                    @else
                                        <span>Not Assigned</span>
                                    @endif
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9 pt-2">Gender:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9 res-brs-t pt-2">{{ $client->gender }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Year Of Birth:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $client->year_of_birth }}</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Created At:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">{{ Carbon\Carbon::parse($client->created_at)->format('M j Y') }}</dd>
                                </dl>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7">

                        <div class="card">
                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="progress-link" data-toggle="tab" href="#progressTab" role="tab"><i class="fa fa-bar-chart" aria-hidden="true"></i> Progress</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="discussion-link" data-toggle="tab" href="#discussionTab" role="tab"><i class="fa fa-comments" aria-hidden="true"></i> Discussions</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="progressTab" role="tabpanel" aria-labelledby="progress-tab">
                                        
                                        @if(!COUNT($client->courses))
                                            <div class="row mt-4">
                                                <div class="col-8">
                                                    <div role="alert" class="alert alert-warning">
                                                        <i class="fa fa-book mr-2"></i>
                                                        Not enrolled into any course
                                                    </div>
                                                </div> 
                                                <div class="col-4">
                                                    <form action = "{{ route('course-enroll') }}" method="GET">
                                                        {{ csrf_field() }}
                                                        <input type = "hidden" name = "client-id" value = "{{ $client->id }}">
                                                        <button type = "submit" class="btn btn-sm res-button app-red-btn float-right">
                                                            <span class = "res-text-9">Enroll Now</span>
                                                            <i aria-hidden="true" class="fa fa-arrow-circle-right res-text-9 ml-1"></i> 
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                        @foreach($client->courses as $course)

                                            <div class = "row mt-4">
                                                <div class = "col-8">
                                                    <div class="alert alert-warning" role="alert">
                                                        <i class="fa fa-book"></i> {{ $course->title }}
                                                    </div>
                                                </div>

                                                <div class = "col-4">
                                                    <a href="/advanced" class="btn res-button app-red-btn float-right">
                                                        <i aria-hidden="true" class="fa fa-files-o res-text-9 mr-1"></i> 
                                                        <span class="res-text-9">Advanced</span>
                                                    </a>
                                                </div>
                                            </div>

                                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                                <thead>
                                                    <tr>
                                                        <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Module</th>
                                                        <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Topic</th>
                                                        <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Opened</th>
                                                        <th data-hide="phone" class = "res-text-9 res-text-sm-9 res-text-md-9">Tested</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($course->modules as $module_count => $module)
                                                        @foreach($module->lessons as $lesson_count => $lesson)
                                                        <tr>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9">{{ $module_count+1 }}</td>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9">{{ $lesson_count+1 }}) {{ $lesson->title }}</td>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9">
                                                                
                                                                @if( in_array( $lesson->id, collect( $client->lessonViews )->map(function ($lessonView) { return $lessonView->id; })->toArray() ) )
                                                                    @php ($lesson_id = $lesson->id) 
                                                                    <a href="#" data-toggle="tooltip" data-placement="top" 
                                                                       title="Last attended on 

                                                                       {{ 

                                                                            Carbon\Carbon::parse(

                                                                                    collect( $client->lessonViews )
                                                                                            ->filter(function ($lessonViewed) use($lesson_id) { if($lesson_id == $lessonViewed->id){ return $lessonViewed->pivot->created_at; } })
                                                                                            ->first()->pivot->created_at

                                                                                )->format('M j Y @ G:i A')

                                                                        }}">
                                                                       
                                                                       <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    ---
                                                                @endif

                                                            </td>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9">
                                                                
                                                                @if( in_array( $lesson->id, collect( $client->testReports )->map(function ($testReport) { return $testReport->test->lesson_id; })->toArray() ) && $client->testReports->last()->test_score == 100 )
                                                                    <a href="#" data-toggle="tooltip" data-placement="top" 
                                                                       title="Last tested on 

                                                                       {{ 

                                                                            Carbon\Carbon::parse(

                                                                                    $client->testReports->last()->created_at

                                                                                )->format('M j Y @ G:i A')

                                                                        }}">
                                                                       
                                                                       <i class="fa fa-check" aria-hidden="true"></i>
                                                                    </a>
                                                                @else
                                                                    @if(COUNT($lesson->tests))
                                                                        <span href="#" data-toggle="tooltip" data-placement="top" title="{{ COUNT($lesson->tests) == 1 ? COUNT($lesson->tests) . ' test not submitted' : COUNT($lesson->tests) . ' tests not submitted' }}">
                                                                            ---
                                                                        </span>
                                                                    @endif
                                                                @endif

                                                            </td>
                                                        </tr>                                                        
                                                        @endforeach
                                                        <tr>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9"></td>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9"> 
                                                                <div role="alert" class="alert alert-success p-1 pl-2">
                                                                    <i class="fa fa-angle-double-right"></i> End Of Module {{ $module_count+1 }} - {{ $module->title }}
                                                                </div>
                                                            </td>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9"></td>
                                                            <td class = "res-text-9 res-text-sm-9 res-text-md-9"></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="6">
                                                            <ul class="pagination pull-right"></ul>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        @endforeach

                                    </div>

                                    <div class="tab-pane fade" id="discussionTab" role="tabpanel" aria-labelledby="messages-tab">

                                        <div class = "row mt-4">
                                            <div class = "col-8">
                                                <div class="alert alert-primary" role="alert">
                                                    <i class="fa fa-comments"></i> Discussions with {{ $client->first_name }} {{ $client->last_name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="chat-discussion" style = "height:{{ COUNT($threads) == 0 ? '150px' : ''  }};">
                                            @if(COUNT($threads))
                                                @each('messenger.partials.thread_2', $threads, 'thread', 'messenger.partials.no-threads')
                                            @else
                                                <p class="alert alert-warning p-3 m-2"><span>Send your first message</span> </p>
                                            @endif
                                        </div>

                                        <form action="{{ route('messages.store') }}" method="post">
                                            {{ csrf_field() }}

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <input type = "text" class="form-control res-text-9 res-text-sm-9 res-text-md-9" name="subject" placeholder="Subject" value="{{ old('subject') }}" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea id = "message" class="form-control res-text-9 res-text-sm-9 res-text-md-9" name = "message" rows="4" placeholder = "Messsage" required>{{ old('message') }}</textarea>
                                                    </div>

                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="hidden" name="recipients[]" value="{{ $client->id }}">
                                                            </div>
                                                        </div>

                                                    <button type="submit" class="btn res-button app-red-btn px-sm-5  mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Send</span>
                                                    </button>
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
        </div>
    </div>



@endsection
