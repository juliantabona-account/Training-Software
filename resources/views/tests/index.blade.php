@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>
        img.test-image{
            display: none;
            margin-left: auto !important;
            margin-right: auto !important;
            width: 100% !important;
            height: auto !important;
            padding: 18% 40% !important;
            background: linear-gradient(#ff5a4e, #ff3925);
        }

        img.course-image{

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
                                <i class="fa fa-file-text-o"></i>
                                <span>Lesson Tests</span>
                            </h2>
                        </div>
                        
                        <div class="col-12 col-sm-6 offset-sm-2 col-md-4 offset-md-4 offset-lg-2 col-lg-3 pr-0 pt-3 pt-sm-0 mt-2 mt-sm-0 res-brs-t res-brs-sm-t-n">
                            @if(Auth::user()->hasRole('admin'))
                            <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/create" class="btn btn-sm res-button app-red-btn float-right ml-2">
                                <i class="fa fa-file-text-o res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Create Test</span>
                            </a>
                            @endif
                            <a href = "/courses/{{ $course_id }}" class="btn btn-sm res-button app-red-btn float-right">
                                <i class="fa fa-arrow-circle-left res-text-9" aria-hidden="true"></i>
                                <span class = "res-text-9">Lessons</span>
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

                    @if(COUNT($tests))
                        @foreach($tests as $test)

                        <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-0 col-lg-4 mb-4">
                            
                            <div class="card ml-0 mr-0 ml-xl-4 mr-xl-4">
                                <img class="card-img-top test-image"  alt="{{ $test->title }}" src="{{ env('APP_TEST_ICON') }}" img-died="image">
                                <div class="card-body">
                                    <h4 class="card-title mb-3 pb-3 res-brs-b res-text-8">{{ $test->title }}</h4>
                                    @if(Auth::user()->hasRole('admin'))
                                        <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/{{ $test->id }}/edit" class="btn btn-sm res-button app-red-btn float-right">
                                            <i class="fa fa-pencil res-text-9" aria-hidden="true"></i>
                                            <span class = "res-text-9">Edit Test</span>
                                        </a>
                                        <form action = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/{{ $test->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type = "submit" class="btn btn-sm btn-danger float-right mr-1">
                                                <i class="fa fa-trash res-text-9" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @if(Auth::user()->hasRole('client'))

                                        @if( COUNT($test->reports) )

                                            @foreach( $testScores as $key => $testScore )

                                                @if (array_key_exists($test->id, $testScore))

                                                    <div class="alert alert-warning" role="alert">
                                                        @if($testScore[$test->id]['score'] != $testScore[$test->id]['currentscore'])
                                                            <span class = "res-text-9 res-text-sm-9 res-text-md-8">Highest Score </span>
                                                            <div class="progress mb-2">
                                                              <div class="progress-bar bg-warning" style="width:{{ $testScore[$test->id]['score'] }}%">{{ $testScore[$test->id]['score'] }}%</div>
                                                            </div>
                                                        @endif
                                                        <span class = "res-text-9 res-text-sm-9 res-text-md-8">Current Score</span>
                                                        <div class="progress">
                                                          <div class="progress-bar" style="width:{{ $testScore[$test->id]['currentscore'] }}%">{{ $testScore[$test->id]['currentscore'] }}%</div>
                                                        </div>
                                                    </div>

                                                    @if($testScore[$test->id]['currentscore'] < 100)
                                                        <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/{{ $test->id }}" class="btn btn-sm btn-success res-button float-right">
                                                            <i class="fa fa-file-text-o"></i>
                                                            <span class = "res-text-9">Complete Test</span>
                                                        </a>
                                                    @else
                                                        <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/{{ $test->id }}" class="btn btn-sm btn-success res-button float-right">
                                                            <span class = "res-text-9">View Test</span>
                                                        </a>
                                                    @endif

                                                @endif

                                            @endforeach
                                        @else

                                        <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/{{ $test->id }}" class="btn btn-sm btn-success res-button float-right">
                                            <i class="fa fa-pencil res-text-9" aria-hidden="true"></i>
                                            <span class = "res-text-9">Take Test</span>
                                        </a>

                                        @endif

                                    @endif
                                </div>
                            </div>


                        </div>

                        @endforeach
                    @else

                        <div class="col-lg-4 offset-4">          
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top test-image" src="{{ env('APP_NO_IMAGE_ICON') }}" img-died="image">
                                <div class="card-body">
                                    <h4 class="card-title res-text-6 mb-1"><span class="badge badge-secondary res-text-9">No Tests</span></h4>                        
                                    <p class="res-text-9 pb-3 res-brs-lg-b">Get started by creating your first test.</p>
                                    <a href = "/courses/{{ $course_id }}/module/{{ $module_id }}/lesson/{{ $lesson_id }}/tests/create" class="btn btn-sm res-button app-red-btn float-right">
                                        <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                        <span class="res-text-9 res-text-sm-7 res-text-md-9">Create Test</span>
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
