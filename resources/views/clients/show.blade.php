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
                                <span>Profile / <a href = "/clients/1" class = "res-text-8 res-text-md-7 res-text-lg-5">Julian</a></span>
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
                <div class="row">

                    <div class="col-lg-3">

                        <div class="card">
                            <div class="card-body">
                                <img data-src="holder.js/200x200" 
                                     class="rounded mb-2 profile-image" 
                                     src="/assets/icons/profile-placeholder.jpg">
                                     <p class = "ml-2 res-brs-t res-brs-b pb-3 pt-3 res-text-9 res-text-sm-8 res-text-md-9">I'm a passionate leader with a proven track record for translating complex ideas into slick, successful campaigns.</p>
                                <dl class="dl-horizontal ml-2">
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">First Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">Julian</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Last Name:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">Tabona</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Company:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">Haselden</dd>
                                    <dt class = "float-left mr-2 res-text-9 res-text-sm-8 res-text-md-9">Created At:</dt> <dd class = "res-text-9 res-text-sm-8 res-text-md-9">22 Jan 2017</dd>
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
                                        <div class = "row mt-4">
                                            <div class = "col-8">
                                                <div class="alert alert-primary" role="alert">
                                                    <i class="fa fa-book"></i> Inbound Marketing 103
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
                                                <tr>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9">1</td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9">1) Course Outline And Milestones?</td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                </tr>
                                                <tr>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9">2</td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9">2) What Is Inbound Marketing?</td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fa fa-check" aria-hidden="true"></i></td>
                                                </tr>
                                                <tr>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9">2</td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9">3) How Does Inbound Marketing Work?</td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9"> --- </td>
                                                    <td class = "res-text-9 res-text-sm-9 res-text-md-9"> --- </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">
                                                        <ul class="pagination pull-right"></ul>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>

                                    <div class="tab-pane fade" id="discussionTab" role="tabpanel" aria-labelledby="messages-tab">

                                        <div class = "row mt-4">
                                            <div class = "col-8">
                                                <div class="alert alert-primary" role="alert">
                                                    <i class="fa fa-comments"></i> Discussions with Julian
                                                </div>
                                            </div>
                                        </div>

                                        <div class="chat-discussion">

                                            <div class="chat-message left">
                                                <img class="message-avatar" src="/assets/icons/profile-placeholder.jpg" alt="">
                                                <div class="message">
                                                    <a class="message-author res-text-9 res-text-sm-9 res-text-md-9" href="#"> Michael Smith </a>
                                                    <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
                                                    <span class="message-content res-text-9 res-text-sm-9 res-text-md-9">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="chat-message right">
                                                <img class="message-avatar" src="/assets/icons/profile-placeholder.jpg" alt="">
                                                <div class="message">
                                                    <a class="message-author res-text-9 res-text-sm-9 res-text-md-9" href="#"> Karl Jordan </a>
                                                    <span class="message-date">  Fri Jan 25 2015 - 11:12:36 </span>
                                                    <span class="message-content res-text-9 res-text-sm-9 res-text-md-9">
                                                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="chat-message right">
                                                <img class="message-avatar" src="/assets/icons/profile-placeholder.jpg" alt="">
                                                <div class="message">
                                                    <a class="message-author res-text-9 res-text-sm-9 res-text-md-9" href="#"> Michael Smith </a>
                                                    <span class="message-date">  Fri Jan 25 2015 - 11:12:36 </span>
                                                    <span class="message-content res-text-9 res-text-sm-9 res-text-md-9">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="chat-message left">
                                                <img class="message-avatar" src="/assets/icons/profile-placeholder.jpg" alt="">
                                                <div class="message">
                                                    <a class="message-author res-text-9 res-text-sm-9 res-text-md-9" href="#"> Alice Jordan </a>
                                                    <span class="message-date">  Fri Jan 25 2015 - 11:12:36 </span>
                                                    <span class="message-content res-text-9 res-text-sm-9 res-text-md-9">
                                                    All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                                                        It uses a dictionary of over 200 Latin words.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="chat-message right">
                                                <img class="message-avatar" src="/assets/icons/profile-placeholder.jpg" alt="">
                                                <div class="message">
                                                    <a class="message-author res-text-9 res-text-sm-9 res-text-md-9" href="#"> Mark Smith </a>
                                                    <span class="message-date">  Fri Jan 25 2015 - 11:12:36 </span>
                                                    <span class="message-content res-text-9 res-text-sm-9 res-text-md-9">
                                                    All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                                                        It uses a dictionary of over 200 Latin words.
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="input-group">
                                            <input id="btn-input" type="text" class="form-control res-text-9 res-text-sm-9 res-text-md-9" placeholder="Say something..." />
                                            <span class="input-group-btn">
                                                <button class="btn app-red-btn btn-sm res-text-9 res-text-sm-9 res-text-md-9">Send</button>
                                            </span>
                                        </div>

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
