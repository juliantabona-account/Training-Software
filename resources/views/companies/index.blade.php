@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')

    <style>

        .error-image{
            display: block !important;
            margin-left: auto !important;
            margin-right: auto !important;
            width: 100% !important;
            height: auto !important;
            padding: 15% 40% !important;
        }

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-10-2 res-brs-t res-brs-lg-t-n res-brs-b">

        <div class="container-fluid res-pt-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-3 offset-lg-3 pt-1 pt-lg-0">
                            <h2 class = "res-text-8 res-text-md-6 res-text-lg-3">
                                <i class="fa fa-building"></i>
                                <span>Companies</span>
                            </h2>
                        </div>
                        <div class="col-12 col-sm-5 col-md-7 col-lg-4 pt-1 pt-lg-0">
                            <a href = "{{ route('company-list') }}" class = "res-mt-lg-10-1 res-text-9 res-sm-text-9 res-text-md-8 text-secondary d-inline-block mr-4">
                                <i class="fa fa-building"></i>
                                <span>Companies</span>
                            </a>
                            <a href = "{{ route('client-list') }}" class = "res-mt-lg-10-1 res-text-9 res-sm-text-9 res-text-md-8 text-secondary d-inline-block">
                                <i class="fa fa-users"></i>
                                <span>Clients</span>
                            </a>
                        </div>

                        <div class="col-12 col-sm-3 col-md-2 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('company-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-plus res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Add Company</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

        
    <div class="container-fluid res-mt-10-3 res-mb-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-1">
            <div class="container res-mt-lg-10-3 res-mb-lg-10-5">
                <div class="row">
                    @if(COUNT($companies))
                        @foreach($companies as $company)

                        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-4 mb-4">
                            
                            <div class="card ml-0 mr-0 ml-xl-4 mr-xl-4">
                                <img class="card-img-top course-image"  alt="{{ $company->name }}" src="{{ $company->img }}" img-died="image">
                                <div class="card-body">
                                    <h4 class="card-title res-text-6 res-brs-lg-b mb-2 pb-2">{{ $company->name }}</h4>
                                    <a href = "{{ route('company-show', [$company->id]) }}" class="btn btn-sm res-button app-red-btn float-right">
                                        <i class="fa fa-eye res-text-9" aria-hidden="true"></i>
                                        <span class = "res-text-9">View</span>
                                    </a>
                                    <form action = "/companies/{{ $company->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type = "submit" class="btn btn-sm btn-danger float-right mr-1">
                                            <i class="fa fa-trash res-text-9" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    <a href = "/companies/{{ $company->id }}/edit" class="btn btn-sm btn-success float-right mr-1">
                                        <i class="fa fa-pencil res-text-9" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>


                        </div>

                        @endforeach
                    @else

                        <div class="col-lg-4 offset-4">          
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top course-image" alt="Inbound Marketing" src="/assets/temp/placeholder.png">
                                <div class="card-body">
                                    <h4 class="card-title res-text-6 mb-1"><span class="badge badge-secondary">No Courses</span></h4>                        
                                    <p class="res-text-9 pb-3 res-brs-lg-b">Get started by creating your first course and adding lessons.</p>
                                    <a href = "{{ route('course-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                        <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                        <span class="res-text-9 res-text-sm-7 res-text-md-9">Create Course</span>
                                    </a>                           
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
