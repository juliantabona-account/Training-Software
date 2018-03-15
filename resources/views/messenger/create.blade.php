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

        .ais-no-results span{
            display:none;
        }

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">

        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-5 offset-3">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">
                                <i class="fa fa-envelope"></i>
                                <span>Create Discussion</span>
                            </h2>
                        </div>


                        <div class="col-2 offset-2">
                            <a href = "{{ route('messages') }}" class="btn res-button app-red-btn">
                                <i class="fa fa-arrow-circle-left res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">View Discussions</span>
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

                    <div class="col-lg-6 offset-lg-3">
                        
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
                                                @if(Auth::user()->hasRole('admin'))
                                                <ais-index
                                                    app-id="{{ env('ALGOLIA_APP_ID') }}"
                                                    api-key="{{ env('ALGOLIA_SECRET') }}"
                                                    index-name="users"
                                                    :auto-search=false
                                                    style = "width: 100%;"
                                                    name="recipients[]"
                                                    >

                                                    <ais-stats>
                                                      <template slot-scope="{ totalResults, processingTime, query }">
                                                        <div class = "alert alert-warning res-text-9 res-text-sm-8 res-text-md-9">
                                                            Found @{{ totalResults }} results matching <i>@{{ query }}</i>
                                                        </div>
                                                      </template>
                                                    </ais-stats>

                                                    <ais-input placeholder="Search client to receive message..." class="form-control res-text-9 res-text-sm-9 res-text-md-9" style = "width: 100%;height:34px;"></ais-input>

                                                    <ais-results inline-template>
                                                      <table class = "table table-hover">
                                                        <tbody>
                                                            <tr v-for="result in results" :key="result.objectID">
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9"><img class="rounded mb-2 profile-image" 
                                                                         src="http://saleschief-bucket.s3.amazonaws.com/assets/icons/profile-placeholder.jpg" img-died="image">
                                                                </td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">@{{ result.first_name }} @{{ result.last_name }}</td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">@{{ result.email }}</td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">
                                                                    <div class="checkbox">
                                                                        <label :title="result.first_name">
                                                                            <input type="radio" name="recipients[]" :value="result.id">
                                                                        </label>
                                                                    </div>
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
                                                @else
                                                
                                                  <table class = "table table-hover">
                                                    <tbody>
                                                        @foreach($admins as $admin)
                                                            
                                                            <tr>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9"><img class="rounded mb-2 profile-image" 
                                                                         src="http://saleschief-bucket.s3.amazonaws.com/assets/icons/profile-placeholder.jpg" img-died="image">
                                                                </td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $admin->first_name }} {{ $admin->last_name }}</td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">{{ $admin->email }}</td>
                                                                <td class = "res-text-9 res-text-sm-8 res-text-md-9">
                                                                    <div class="checkbox">
                                                                        <label title="first_name">
                                                                            <input type="radio" name="recipients[]" value="{{ $admin->id }}">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                    </tbody>
                                                  </table>
                                                @endif
                                            </div>
                                        </div>

                                    <button type="submit" class="btn res-button app-red-btn px-sm-5  mr-3 mr-sm-3 mr-lg-3 ml-3 res-text-9 res-text-sm-8 res-text-md-7 float-right float-md-right">
                                        <span class = "res-text-9 res-text-sm-9 res-text-md-9">Send</span>
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
