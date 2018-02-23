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
                            <h2 class = "res-text-8 res-text-md-6 res-text-lg-5">
                                <i class="fa fa-film-o"></i>
                                <span>Lesson Video</span>
                            </h2>
                        </div>

                        <div class="col-12 col-sm-3 offset-sm-5 col-md-2 offset-md-6 offset-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            <a href = "/courses/{{ $course_id }}/edit" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Lessons</span>
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
                                <h1 class = "ml-2 pb-2 pt-1 res-text-9 res-text-sm-8 res-text-md-7">{{ $lesson->title }}</h1>
                                <p class = "ml-2 res-brs-t pb-3 pt-3 res-text-9 res-text-sm-8 res-text-md-9">{{ $lesson->overview }}</p>
                                <div class = "alert alert-warning res-brs-t"><span class = "mr-2">Choose A Video</span> <i aria-hidden="true" class="fa fa-arrow-circle-right res-text-9"></i></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-9">

                        <div class="card">
                            <div class="card-body">
                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                    <thead>
                                        <tr class = "alert alert-warning">
                                            <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Video</th>
                                            <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Title</th>
                                            <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9" width="100">Created</th>
                                            <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Duration</th>
                                            <th data-toggle="true" class = "res-text-9 res-text-sm-9 res-text-md-9">Status</th>
                                            <th class="text-right" data-sort-ignore="true" class = "res-text-9 res-text-sm-9 res-text-md-9"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $video)
                                        
                                            <tr>
                                                <td class = "res-text-9 res-text-sm-9 res-text-md-9"> 
                                                    @if($video['status'] == 'available' && !empty($video['pictures']['sizes'][0]['link']))  
                                                        <img class="mt-3" alt="{{ $lesson->title }}" 
                                                                     src="{{ $video['pictures']['sizes'][0]['link'] }}"  
                                                                     style="width: 100px;"></td>
                                                    @else
                                                        <div class="mt-3 p-4 app-red-gradient">
                                                            <i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw app-color-white ml-2"></i>
                                                        </div>
                                                    @endif
                                                <td class = "res-text-9 res-text-sm-9 res-text-md-9 pt-5">{{ $video['name'] }}</td>
                                                <td class = "res-text-9 res-text-sm-9 res-text-md-9 pt-5">{{ Carbon\Carbon::parse($video['created_time'])->format('d M Y') }}</td>
                                                <td class = "res-text-9 res-text-sm-9 res-text-md-9 pt-5">{{ gmdate("H:i:s", $video['duration']) }}</td>
                                                <td class = "res-text-9 res-text-sm-9 res-text-md-9 pt-5">{{ $video['status'] }}</td>
                                                <td class="text-right pt-5">
                                                    <form action = "{{ route('lesson-video-save', [$course_id, $module_id, $lesson_id]) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type = "hidden" value = "{{ $video['uri'] }}" name = "video">
                                                        <input type = "hidden" value = "{{ $video['name'] }}" name = "name">
                                                        <button type = "submit" class="btn btn-sm btn-success float-right mr-1 res-text-9 res-text-sm-9 res-text-md-9">
                                                            Use Video
                                                        </button>
                                                    </form>
                                                </td>
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
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
