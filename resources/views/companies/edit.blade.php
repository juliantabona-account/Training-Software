@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

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
                                <i class="fas fa-building"></i>
                                <span>Edit Company</span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-3 offset-sm-5 col-md-2 offset-md-6 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "{{ route('company-list') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fas fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Companies</span>
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
                        
                        <form action = "/companies/{{ $company->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type = "text" value = "{{ $company->name }}" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "company-name" placeholder = "Enter company name" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea id = "company-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "company-description" rows="4" placeholder = "Enter company description" required>{{ $company->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type = "text" value = "{{ $company->contact }}" class="form-control res-text-9 res-text-sm-8 res-text-md-9" name = "company-contact" placeholder = "Enter company contact" required />
                                    </div>                    
                                    <button type="submit" class="btn res-button app-red-btn float-right mt-2 pr-5 pl-5">
                                        <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save Company</span>
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
