@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

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
                                <i class="fa fa-book"></i>
                                <span>All Courses</span>
                            </h2>
                        </div>
                        <div class="col-2">
                            <h2 class = "res-mt-lg-10-1 res-text-7 res-text-md-8 res-text-sm-5">
                                <i class="fa fa-check-square-o"></i>
                                <span>Published:</span>
                                <span>2</span>
                            </h2>
                        </div>

                        <div class="col-2">
                            <h2 class = "res-mt-lg-10-1 res-text-7 res-text-md-8 res-text-sm-5">
                                <i class="fa fa-pencil-square-o"></i>
                                <span>Draft:</span>
                                <span>1</span>
                            </h2>
                        </div>


                        <div class="col-2">
                            <button type="submit" class="btn res-button app-red-btn">
                                <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Add Course</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container res-mt-lg-10-3 res-mb-lg-10-5">
        <div class="row">
            <div class="col-lg-4">

                <div class="card" style="width: 20rem;">
                    <img class="card-img-top"  alt="100%x180" style="height: 180px; width: 100%; display: block;" src="/assets/temp/7.jpg" data-holder-rendered="true">
                    <div class="card-body">
                        <h4 class="card-title res-text-6 mb-1">Inbound Sales Incubation Programme</h4>
                        <span class="badge badge-success mb-1">Published</span>
                        <p class="res-text-9 pb-3 res-brs-lg-b">
                            In today's world, making sales is all about building  relationships. In this course we learn how to use inbound techniques to close sales
                        </p>
                        <button type="submit" class="btn res-button app-red-btn float-right">
                            <i class="fa fa-pencil res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Edit Course</span>
                        </button>
                        <button type="submit" class="btn btn-success float-right mr-1">
                            <i class="fa fa-user-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <div class="card" style="width: 20rem;">
                    <img class="card-img-top"  alt="100%x180" style="height: 180px; width: 100%; display: block;" src="/assets/temp/5.jpg" data-holder-rendered="true">
                    <div class="card-body">
                        <h4 class="card-title res-text-6 mb-1">Leadership, Negotiating, Assertiveness, Sales</h4>
                        <span class="badge badge-success mb-1">Published</span>
                        <p class="res-text-9 pb-3 res-brs-lg-b">
                            A practical guide covering assertiveness, time management, leadership, negotiating, sales & project management.
                        </p>
                        <button type="submit" class="btn res-button app-red-btn float-right">
                            <i class="fa fa-pencil res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Edit Course</span>
                        </button>
                        <button type="submit" class="btn btn-success float-right mr-1">
                            <i class="fa fa-user-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <div class="card" style="width: 20rem;">
                    <img class="card-img-top"  alt="100%x180" style="height: 180px; width: 100%; display: block;" src="/assets/temp/6.jpg" data-holder-rendered="true">
                    <div class="card-body">
                        <h4 class="card-title res-text-6">Sales and Relationship Management</h4>
                        <span class="badge badge-secondary">Draft</span>
                        <p class="res-text-9 pb-3 res-brs-lg-b">
                            Learn the proper methods of conducting sales and performing relationship management in banking and financial services.
                        </p>

                        <button type="submit" class="btn res-button app-red-btn float-right">
                            <i class="fa fa-pencil res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Edit Course</span>
                        </button>
                        <button type="submit" class="btn btn-success float-right mr-1">
                            <i class="fa fa-user-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
