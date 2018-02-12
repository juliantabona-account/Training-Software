@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        table td{
            cursor: pointer;
        }

        .course-image-box{
            height: 180px; 
        }

        img.course-image{
            display: none;
            height: 180px; 
            width: 100%; 
            background: linear-gradient(#ff5a4e, #ff3925);
        }

        .error-image{
            margin-left: auto !important;
            margin-right: auto !important;
            width: 100% !important;
            height: auto !important;
            padding: 25% 43% !important;
        }

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">

        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3 offset-3">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">
                                <i class="fas fa-user"></i>
                                <span>Add Client</span>
                            </h2>
                        </div>
                        <div class="col-12 col-sm-5 col-md-7 col-lg-4 pt-1 pt-lg-0">
                            <a href = "{{ route('company-list') }}" class = "res-mt-lg-10-1 res-text-9 res-sm-text-9 res-text-md-8 text-secondary d-inline-block mr-4">
                                <i class="fas fa-building"></i>
                                <span>Companies</span>
                            </a>
                            <a href = "{{ route('client-list') }}" class = "res-mt-lg-10-1 res-text-9 res-sm-text-9 res-text-md-8 text-secondary d-inline-block">
                                <i class="fas fa-users"></i>
                                <span>Clients</span>
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
                        
                        <div class="card" style="width: 20rem;">
                            <div class = "course-image-box">
                                <img class="card-img-top course-image"  alt="{{ $course->title }}" src="{{ $course->img }}" img-died="video">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title res-text-6 mb-1">{{ $course->title }}</h4>
                                
                                <p class="res-text-9 mt-1 pt-2 pb-2 res-brs-lg-b res-brs-lg-t">
                                    {{ $course->overview }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        @if(Session::has('status'))
                            <div class="alert alert-{{ Session::get('type') }}" role="alert">
                                <span class = "res-text-9 res-text-sm-9 res-text-md-9"><i class="fas fa-user mr-1"></i> {{ Session::get('status') }}</span>
                                <button type="button" class="close mt-2 d-block res-text-9 res-text-sm-9 res-text-md-9" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="new-tab-link" data-toggle="tab" href="#newTab" role="tab">New Client</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="existing-tab-link" data-toggle="tab" href="#existingTab" role="tab">Existing Client</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="newTab" role="tabpanel" aria-labelledby="home-tab">

                                <form action = "{{ route('client-save') }}" method="POST">
                                    
                                    {{ csrf_field() }}

                                        <input type = "hidden" name = "course_id" value = "{{ $course->id }}">
                                        <input type = "hidden" name = "url" value = "{{ route('client-enroll', [$course->id]) }}">

                                        <div class="card">

                                            <div class="card-header">
                                                <h2 class = "res-text-8 res-text-sm-8 res-text-md-8 mt-2"><strong>Client Details</strong></h2>
                                                <p class = "res-text-9 res-text-sm-9 res-text-md-9 mb-1">Enter the clients first name, email and company to send them login details to join "{{ $course->title }}"</p>
                                                <a href = "/members"><span class="badge btn-success mb-1">{{ $totalClients }} {{ $totalClients == 1 ? "Member" : "Members" }}</span></a>
                                            </div>


                                            <div class="card-body">

                                                <div class="form-group">
                                                    <input type = "text" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "first-name" placeholder = "Enter First Name" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type = "email" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "email" placeholder = "Enter Email" required>
                                                </div>

                                                <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Enroll Client</span>
                                                </button>

                                            </div>

                                        </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="existingTab" role="tabpanel">

                                <form action = "{{ route('client-save') }}" method="POST">
                                    
                                    {{ csrf_field() }}

                                    <input type = "hidden" name = "course_id" value = "{{ $course->id }}">
                                    <input type = "hidden" name = "url" value = "{{ route('client-enroll', [$course->id]) }}">

                                    <div class="card">

                                        <div class="card-header">
                                            <h2 class = "res-text-8 res-text-sm-8 res-text-md-8 mt-2"><strong>Search Clients</strong></h2>
                                        </div>


                                        <div class="card-body">

                                            <div class="form-group">
                                                <div class="input-group">

                                                      <ais-index
                                                            app-id="{{ env('ALGOLIA_APP_ID') }}"
                                                            api-key="{{ env('ALGOLIA_SECRET') }}"
                                                            index-name="users"
                                                            :auto-search=false
                                                            style = "width: 100%;"
                                                            >

                                                        <ais-stats>
                                                          <template slot-scope="{ totalResults, processingTime, query }">
                                                            <div class = "alert alert-warning res-text-9 res-text-sm-8 res-text-md-9">
                                                                Found @{{ totalResults }} results matching <i>@{{ query }}</i>
                                                            </div>
                                                          </template>
                                                        </ais-stats>

                                                        <ais-input placeholder="Find client..." class="form-control res-text-9 res-text-sm-8 res-text-md-9" style = "width: 100%;height:34px;"></ais-input>

                                                        <ais-results inline-template>
                                                          <table class = "table table-hover">
                                                            <tbody>
                                                              <tr v-for="result in results" :key="result.objectID">
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">@{{ result.name }}</td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">@{{ result.email }}</td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">
                                                                    <form action = "{{ route('client-save', [$course->id]) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        <input type = "hidden" :value = "result.id" name = "client-id">
                                                                        <button type = "submit" class="btn btn-sm btn-success float-right mr-1">
                                                                            <i aria-hidden="true" class="fas fa-user-plus res-text-9"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>

                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </ais-results>
                                                        <ais-no-results>
                                                           <template slot-scope="props">
                                                                <span class = "res-text-9 res-text-sm-8 res-text-md-9">No clients found for <i>@{{ props.query }}</i></span>
                                                           </template>
                                                        </ais-no-results>
                                                      </ais-index>

                                                </div>
                                            </div>

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



@endsection
