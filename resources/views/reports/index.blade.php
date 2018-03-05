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
                                <i class="fa fa-book"></i>
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
                        <canvas id="myChart" width="400" height="400"></canvas>
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

    var ctx = document.getElementById("ageChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode( array_keys ($ageStats) ) !!},
            datasets: [{
                label: 'Client Ages',
                data: {!! json_encode( array_values ($ageStats) ) !!},
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
                        fixedStepSize: 1
                    }
                }]
            }
        },
axis: {
      y: {
        show: false
      },
      y2: {
        show: true
      },
      x: {
        tick: {
          format: function (x) {
            return x;
          }
        }
      }
    }
    });


</script>

@endsection
