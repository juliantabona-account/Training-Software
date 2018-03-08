@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

        .course-image-box{
            height: 180px;
            overflow: hidden;
        }

        img.course-image{
            display: none;
            height: 180px; 
            width: 100%; 
            background: linear-gradient(#128067, #179a7c);
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

    <div class="col-md-12 res-pb-10-2 res-brs-t res-brs-lg-t-n res-brs-b">

        <div class="container-fluid res-pt-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-3 offset-lg-3 pt-1 pt-lg-0">
                            <h2 class = "res-text-8 res-text-md-6 res-text-lg-3">
                                <i class="fa fa-bar-chart"></i>
                                <span>Overall Reports</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        
    <div class="container-fluid res-mt-10-3 res-mb-10-5 p-0 app-bg-1">
        <div class="app-white-overlay-2">
            <div class="container res-mt-lg-10-3 res-mb-lg-10-5">

                <div class="row">
                    <div class="col-12">
                        <h1 class = "res-text-8 res-text-md-7 res-text-lg-5">General Demographics</h1>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <canvas id="ageChart" width="400" height="400"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="genderChart" width="400" height="400"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="activeStatusChart" width="400" height="400"></canvas>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-5">
                        <h1 class = "res-text-8 res-text-md-7 res-text-lg-5">Course Statistics</h1>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <canvas id="courseEnrollmentChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-4">
                        <h3 class = "res-text-9 text-center mt-2">Enrollment By Gender</h3>
                        <canvas id="courseEnrollmentGenderChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-4">
                        <h3 class = "res-text-9 text-center mt-2">Enrollment By Status</h3>
                        <canvas id="courseEnrollmentActiveChart" width="400" height="400"></canvas>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-5">
                        <h1 class = "res-text-8 res-text-md-7 res-text-lg-5">Module Statistics</h1>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <canvas id="courseModuleChart" width="400" height="400"></canvas>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-5">
                        <h1 class = "res-text-8 res-text-md-7 res-text-lg-5">Lesson Statistics</h1>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <canvas id="courseLessonChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-4">
                        <canvas id="courseLessonViewsChart" width="400" height="400"></canvas>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-5">
                        <h1 class = "res-text-8 res-text-md-7 res-text-lg-5">Test Statistics</h1>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <canvas id="courseTestChart" width="400" height="400"></canvas>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-5">
                        <h1 class = "res-text-8 res-text-md-7 res-text-lg-5">Company Statistics</h1>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <canvas id="companiesChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
    var ageChart = document.getElementById("ageChart").getContext('2d'); 
    var genderChart = document.getElementById("genderChart").getContext('2d'); 
    var activeStatusChart = document.getElementById("activeStatusChart").getContext('2d');
    var courseEnrollmentChart = document.getElementById("courseEnrollmentChart").getContext('2d'); 
    var courseEnrollmentGenderChart = document.getElementById("courseEnrollmentGenderChart").getContext('2d');  
    var courseEnrollmentActiveChart = document.getElementById("courseEnrollmentActiveChart").getContext('2d'); 
    var courseModuleChart = document.getElementById("courseModuleChart").getContext('2d');  
    var courseLessonChart = document.getElementById("courseLessonChart").getContext('2d');  
    var courseLessonViewsChart = document.getElementById("courseLessonViewsChart").getContext('2d');
    var courseTestChart = document.getElementById("courseTestChart").getContext('2d');
    var companiesChart = document.getElementById("companiesChart").getContext('2d'); 

    new Chart(ageChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $ageLabels ) !!},
            datasets: [{
                label: 'Client Ages',
                data: {!! json_encode( $ageValues ) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1
                    }
                }]
            }
        }
    });

    new Chart(genderChart, {
        type: 'pie',
        data: {
            labels: {!! json_encode( $genderLabels ) !!},
            datasets: [{
                label: 'Client Genders',
                data: {!! json_encode( $genderValues ) !!},
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });

    new Chart(activeStatusChart, {
        type: 'horizontalBar',
        data: {
            labels: {!! json_encode( $activeLabels ) !!},
            datasets: [{
                label: 'Client Status',
                data: {!! json_encode( $activeValues ) !!},
                backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                        ticks: {
                            min: 0
                    }
                }]
            }
        }
    });

    new Chart(courseEnrollmentChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $courseEnrollmentLabels ) !!},
            datasets: [{
                label: 'Total Enrollment',
                data: {!! json_encode( $courseEnrollmentValues ) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });

    new Chart(courseEnrollmentGenderChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $courseEnrollmentGenderLabels ) !!},
            datasets: [{
                label: 'Males',
                data: {!! json_encode( $courseEnrollmentMaleValues ) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Females',
                data: {!! json_encode( $courseEnrollmentFemaleValues ) !!},
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });

    new Chart(courseEnrollmentActiveChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $courseEnrollmentActiveLabels ) !!},
            datasets: [{
                label: 'Active',
                data: {!! json_encode( $courseEnrollmentActiveValues ) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'InActive',
                data: {!! json_encode( $courseEnrollmentInActiveValues ) !!},
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });

    new Chart(courseModuleChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $courseModuleLabels ) !!},
            datasets: [{
                label: 'Total Modules',
                data: {!! json_encode( $courseModuleValues ) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });

    new Chart(courseLessonChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $courseLessonLabels ) !!},
            datasets: [{
                label: 'Total Lessons',
                data: {!! json_encode( $courseLessonValues ) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });


    new Chart(courseLessonViewsChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $courseLessonViewsLabels ) !!},
            datasets: [{
                label: 'Lesson Views',
                data: {!! json_encode( $courseLessonViewsValues ) !!},
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });



    new Chart(courseTestChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $courseTestLabels ) !!},
            datasets: [{
                label: 'Tests',
                data: {!! json_encode( $courseTestValues ) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });

    new Chart(companiesChart, {
        type: 'bar',
        data: {
            labels: {!! json_encode( $companyLabels ) !!},
            datasets: [{
                label: 'Company Members',
                data: {!! json_encode( $companyValues ) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        fixedStepSize: 1,
                        autoSkip: false
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }]
            }
        }
    });


</script>

@endsection
