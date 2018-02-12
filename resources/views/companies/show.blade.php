@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')

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
                                <span>{{ $company->name }}</span>
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
                            <a href = "{{ route('client-create') }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-plus res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Add Client</span>
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

                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-header">
                                <h2 class = "res-text-8 res-text-sm-8 res-text-md-7 mt-2"><strong>Client Details <span class="badge badge-success mb-1">23 Members</span></strong></h2>  
                            </div>


                            <div class="card-body">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                    <tr>
                                        <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">First Name</th>
                                        <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Last Name</th>
                                        <th data-hide="phone" class = "res-text-9 res-text-sm-9 res-text-md-9">Mobile</th>
                                        <th data-hide="phone,tablet" class = "res-text-9 res-text-sm-9 res-text-md-9">Email</th>
                                        <th data-hide="phone" class = "res-text-9 res-text-sm-9 res-text-md-9">Status</th>
                                        <th class="text-right" data-sort-ignore="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">Julian</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">Tabona</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">(+267) 75993221</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">brandontabona@gmail.com</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9"><a href= "#" class="label label-primary">Active</a></td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href= "/clients/1" class="btn-primary btn btn-sm res-text-sm-9 res-text-md-9">View</a>
                                                <a href= "/clients/1" class="btn-success btn btn-sm res-text-sm-9 res-text-md-9">Inbox</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">Pinky</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">Sesiane</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">(+267) 74647644</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9">pinkysesiane@gmail.com</td>
                                        <td class = "res-text-9 res-text-sm-9 res-text-md-9"><a href= "#" class="label label-primary">InActive</a></td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href= "/clients/1" class="btn-primary btn btn-sm res-text-sm-9 res-text-md-9">View</a>
                                                <a href= "/clients/1" class="btn-success btn btn-sm res-text-sm-9 res-text-md-9">Inbox</a>
                                            </div>
                                        </td>
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

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
