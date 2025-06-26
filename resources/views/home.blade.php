<x-HomeLayout>
     <!--app-content open-->
     <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Dashboard</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="card-header">{{ __('Welcome '). Auth::user()->name }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}<p>
                        <h5>Balla POKJA BBPOM Di Makassar</h5>
                        <div class="breadcrumb">
                        
                        </div>
                        
                    </div>
            </div>
             <!-- ROW-1 -->
             <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Visitors This Month</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post2']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="leadschart"
                                                    class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                        @if(count($post['post3'])==0)
                                        <span class="text-muted fs-12"><span class="text-pink"><i
                                        class="fa fa-exclamation-circle text-pink"></i> {{ count($post['post3']) }}</span>
                                        This Day</span>
                                        @else
                                        <span class="text-muted fs-12"><span class="text-pink"><i
                                        class="fe fe-arrow-up-circle text-pink"></i> {{ count($post['post3']) }}</span>
                                        This Day</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total Users</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="saleschart"
                                                    class="h-8 w-9 chart-dropshadow">
                                                </canvas>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <span class="text-muted fs-12"><span class="text-secondary">
                                        @if(count($post['post1'])==0)
                                        <i class="fa fa-exclamation-circle  text-secondary"></i> 
                                        {{ count($post['post1']) }}</span>
                                        This Month</span>
                                        @else
                                        <i class="fe fe-arrow-up-circle  text-secondary"></i> 
                                        {{ count($post['post1']) }}</span>
                                        This Month</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total SIYAPP</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post4']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="profitchart"
                                                    class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($post['post5'])==0)
                                    <span class="text-muted fs-12"><span class="text-green"><i
                                                class="fa fa-exclamation-circle text-green"></i> {{ count($post['post5']) }}</span>
                                        This Month</span>
                                    @else
                                    <span class="text-muted fs-12"><span class="text-green"><i
                                            class="fe fe-arrow-up-circle text-green"></i> {{ count($post['post5']) }}</span>
                                        This Month</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total ULPK</h6>
                                            <h2 class="mb-0 number-font">{{ count($post['post6']) }}</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="costchart"
                                                    class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($post['post7'])==0)
                                    <span class="text-muted fs-12"><span class="text-warning"><i
                                                class="fa fa-exclamation-circle text-warning"></i> {{count($post['post7'])}}</span>
                                        This Month</span>
                                    @else
                                    <span class="text-muted fs-12"><span class="text-warning"><i
                                                class="fe fe-arrow-up-circle text-warning"></i> {{count($post['post7'])}}</span>
                                        This Month</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 END -->
           <!-- ROW OPEN -->
           <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body pb-0">
                            <div class="float-start">
                                <p class="mb-1">Total Data SIPINTAR</p>
                                <h2 class="counter mb-0"> {{ $totalLayanan }}</h2>
                            </div>
                            <div class="float-end">
                                <span class="mini-stat-icon bg-info"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-0 border-top-0 overflow-hidden">
                            <div class="chart-wrapper overflow-hidden">
                                <canvas id="areaChart1" class="areaChart overflow-hidden chart-dropshadow-primary"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-start">
                                <p class="mb-1">Total Data SIIKMA</p>
                                <h2 class="counter mb-0">{{ $totalSiikma }}</h2>
                            </div>
                            <div class="float-end">
                                <span class="mini-stat-icon bg-danger"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-0 border-top-0 overflow-hidden">
                            <div class="chart-wrapper">
                                <canvas id="areaChart4" class="areaChart chart-dropshadow-danger"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-start">
                                <p class="mb-1">Total Data Smile</p>
                                <h2 class="counter mb-0">{{ $totalSmile }}</h2>
                            </div>
                            <div class="float-end">
                                <span class="mini-stat-icon bg-success"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-0 border-top-0 overflow-hidden">
                            <div class="chart-wrapper">
                                <canvas id="areaChart2" class="areaChart chart-dropshadow-success"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-start">
                                <p class="mb-1">Total Data SPPD Online</p>
                                <h2 class="counter mb-0">{{ $totalSppd }}</h2>
                            </div>
                            <div class="float-end">
                                <span class="mini-stat-icon bg-warning"><i class="fa fa-bar-chart"></i></span>
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-0 border-top-0 overflow-hidden">
                            <div class="chart-wrapper">
                                <canvas id="areaChart3" class="areaChart chart-dropshadow-warning"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
            </div>
            <!-- ROW CLOSED -->
                <!-- ROW-2 -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Visitors Analytics</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                <div class="d-flex text-center justify-content-center me-3"><span
                                        class="dot-label bg-primary my-auto"></span>Total Visitors By Month</div>
                                
                            </div>
                            <div class="chartjs-wrapper-demo">
                                <canvas id="transactions" class="chart-dropshadow"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body pb-0 bg-recentorder">
                            <h3 class="card-title text-white">Report SIYAPP confirmation</h3>
                            <div class="chartjs-wrapper-demo">
                                <canvas id="recentorders" class="chart-dropshadow"></canvas>
                            </div>
                        </div>
                        <div id="flotback-chart" class="flot-background"></div>
                        <div class="card-body">
                            <div class="d-flex mb-4 mt-3">
                                <div
                                    class="avatar avatar-md bg-warning-transparent text-warning bradius me-3">
                                    <i class="fe fe-alert-triangle"></i>
                                </div>
                                <div class="">
                                    <h6 class="mb-1 fw-semibold">Data Confirmed</h6>
                                    
                                </div>
                                <div class=" ms-auto my-auto">
                                    <p class="fw-bold fs-20"> {{$confirmed}} </p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="avatar  avatar-md bg-pink-transparent text-pink bradius me-3">
                                    <i class="fe fe-x"></i>
                                </div>
                                <div class="">
                                    <h6 class="mb-1 fw-semibold">Data Not Confirmed</h6>
                                   
                                </div>
                                <div class=" ms-auto my-auto">
                                    <p class="fw-bold fs-20 mb-0"> {{$unconfirmed}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
            </div>
            <!-- ROW-2 END -->
            <!-- ROW-3 -->
            <div class="row" >
                 <!-- COL END -->
                <div class="col-md-12 col-xl-6">
                    <div class="card ">
                        <div class="card-body ">
                            <h4 class="card-title">NOTA DINAS Petunjuk Recovery dan Reset Password Email Coorporate</h4>
                            <p class="card-text"><a  target="_new" href="https://drive.google.com/file/d/1gljRdMwR07Cl7J8JuAmxGF5YmlDiHbTS/view?usp=sharing">Download File PDF <i class="fa fa-download"></i></a></p>
                        </div>
                    </div>
                </div>
                <!-- COL END -->
                <!-- COL END -->
                <div class="col-md-12 col-xl-6">
                    <div class="card ">
                        <div class="card-body ">
                            <h4 class="card-title">Video Tutorial Recovery dan Reset Password Email Coorporate</h4>
                            <p class="card-text"><a target="_new" href="https://drive.google.com/file/d/1nkjOT95-UFYS_XqAHRZQts3ORVBLZl3G/view?usp=share_link">Download/Streaming <i class="fa fa-download"></i></a></p>
                        </div>
                    </div>
                </div>
                
                <!-- COL END -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                    <div class="card " >
                        <div class="card-body pb-0 bg-recentorder">
                            <h5 class="card-title " style="text-align: center;"><i class="breadcrumb-item" aria-current="page">Version: <b>{{ getVersion() }}</b></i></h5>
                            <div class="chartjs-wrapper-demo">
                                <canvas id="recentorders" class="chart-dropshadow" style="display: none;"></canvas>
                            </div>
                        </div>
                        <div id="flotback-chart" class="flot-background"></div>
                        
                    </div>
                </div>
                <!-- COL END -->
            </div>
            <!-- ROW-3 END -->
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">                
            </div>
        </div>
    </div>
<!-- JQUERY JS -->
<script src="{{ asset('vendor/js/jquery.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- SPARKLINE JS-->
<script src="{{ asset('vendor/js/jquery.sparkline.min.js') }}"></script>

<!-- Sticky js -->
<script src="{{ asset('vendor/js/sticky.js') }}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('vendor/js/circle-progress.min.js') }}"></script>

<!-- PIETY CHART JS-->
<script src="{{ asset('vendor/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/peitychart/peitychart.init.js') }}"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset('vendor/plugins/sidebar/sidebar.js') }}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js') }}"></script>
<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js') }}"></script>

<!-- INTERNAL CHARTJS CHART JS-->
<script src="{{ asset('vendor/plugins/chart/chart.bundle.js') }}"></script>
<script src="{{ asset('vendor/plugins/chart/rounded-barchart.js') }}"></script>
<script src="{{ asset('vendor/plugins/chart/utils.js') }}"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{ asset('vendor/plugins/select2/select2.full.min.js') }}"></script>

<!-- INTERNAL Data tables js-->
<script src="{{ asset('vendor/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatable/dataTables.responsive.min.js') }}"></script>

<!-- INTERNAL APEXCHART JS -->
<script src="{{ asset('vendor/js/apexcharts.js') }}"></script>
<script src="{{ asset('vendor/plugins/apexchart/irregular-data-series.js') }}"></script>

<!-- C3 CHART JS -->
<script src="{{ asset('vendor/plugins/charts-c3/d3.v5.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/charts-c3/c3-chart.js') }}"></script>

<!-- CHART-DONUT JS -->
<script src="{{ asset('vendor/js/charts.js') }}"></script>

<!-- CHARTJS JS -->
<script src="{{ asset('vendor/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ asset('vendor/js/chart.js') }}"></script>

<!-- INTERNAL Flot JS -->
<script src="{{ asset('vendor/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('vendor/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
<script src="{{ asset('vendor/plugins/flot/chart.flot.sampledata.js') }}"></script>
<script src="{{ asset('vendor/plugins/flot/dashboard.sampledata.js') }}"></script> 

<!-- INTERNAL Vector js -->
<script src="{{ asset('vendor/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- SIDE-MENU JS-->
<script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js') }}"></script>

<!-- INTERNAL INDEX JS -->
<script src="{{ asset('vendor/js/index1.js') }}"></script>

<!-- Color Theme js -->
<script src="{{ asset('vendor/js/themeColors.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('vendor/js/custom.js') }}"></script>
</x-HomeLayout>

<script>
    /* Chartjs (#areaChart1) */
	var ctx = document.getElementById('areaChart1').getContext('2d');

var myChart = new Chart( ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep','Okt','Nop','Des'],
        type: 'line',
        datasets: [ {
            label: 'Total Guest',
            data: [{{$countLayanan[1]}},{{$countLayanan[2]}}, {{$countLayanan[3]}}, {{$countLayanan[4]}}, {{$countLayanan[5]}}, {{$countLayanan[6]}}, {{$countLayanan[7]}}, {{$countLayanan[8]}}, {{$countLayanan[9]}}, {{$countLayanan[10]}}, {{$countLayanan[11]}}, {{$countLayanan[12]}}],
            backgroundColor: 'transparent',
            borderColor: '#1170e4',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:'#1170e4',
            pointBorderColor :'#1170e4',
            pointHoverBorderColor :'#1170e4',
            pointBorderWidth :2,
            pointRadius :2,
            pointHoverRadius :2,
            borderWidth: 4
        }, ]
    },
    options: {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#6b6f80',
            bodyFontColor: '#6b6f80',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
        },
        scales: {
            xAxes: [ {
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 2,
                    fontColor: 'transparent'
                }
            } ],
            yAxes: [ {
                display:false,
                ticks: {
                    display: false,
                }
            } ]
        },
        title: {
            display: false,
        },
        elements: {
            line: {
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4
            }
        }
    }
});
/* Chartjs (#areaChart1) closed */

/* Chartjs (#areaChart2) */
var ctx = document.getElementById('areaChart2').getContext('2d');

var myChart = new Chart( ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep','Okt','Nop','Des'],
        type: 'line',
        datasets: [ {
            label: 'Total Request',
            data: [{{$countSmile[1]}},{{$countSmile[2]}}, {{$countSmile[3]}}, {{$countSmile[4]}}, {{$countSmile[5]}}, {{$countSmile[6]}}, {{$countSmile[7]}}, {{$countSmile[8]}}, {{$countSmile[9]}}, {{$countSmile[10]}}, {{$countSmile[11]}}, {{$countSmile[12]}}],
            backgroundColor: 'transparent',
            borderColor: '#09ad95',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:'#09ad95',
            pointBorderColor :'#09ad95',
            pointHoverBorderColor :'#09ad95',
            pointBorderWidth :2,
            pointRadius :2,
            pointHoverRadius :2,
            borderWidth: 4
        }, ]
    },
    options: {

        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#6b6f80',
            bodyFontColor: '#6b6f80',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
        },
        scales: {
            xAxes: [ {
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 2,
                    fontColor: 'transparent'
                }
            } ],
            yAxes: [ {
                display:false,
                ticks: {
                    display: false,
                }
            } ]
        },
        title: {
            display: false,
        },
        elements: {
            line: {
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4
            }
        }
    }
});
/* Chartjs (#areaChart2) closed */

/* Chartjs (#areaChart3) */
var ctx = document.getElementById('areaChart3').getContext('2d');

var myChart = new Chart( ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep','Okt','Nop','Des'],
        type: 'line',
        datasets: [ {
            label: 'Total Request',
            data: [{{$countSppd[1]}},{{$countSppd[2]}}, {{$countSppd[3]}}, {{$countSppd[4]}}, {{$countSppd[5]}}, {{$countSppd[6]}}, {{$countSppd[7]}}, {{$countSppd[8]}}, {{$countSppd[9]}}, {{$countSppd[10]}}, {{$countSppd[11]}}, {{$countSppd[12]}}],
            backgroundColor: 'transparent',
            borderColor: '#f7b731',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:'#f7b731',
            pointBorderColor :'#f7b731',
            pointHoverBorderColor :'#f7b731',
            pointBorderWidth :2,
            pointRadius :2,
            pointHoverRadius :2,
            borderWidth: 4
        }, ]
    },
    options: {

        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#6b6f80',
            bodyFontColor: '#6b6f80',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
        },
        scales: {
            xAxes: [ {
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 2,
                    fontColor: 'transparent'
                }
            } ],
            yAxes: [ {
                display:false,
                ticks: {
                    display: false,
                }
            } ]
        },
        title: {
            display: false,
        },
        elements: {
            line: {
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4
            }
        }
    }
});
/* Chartjs (#areaChart3) closed */

/* Chartjs (#areaChart4) */
var ctx = document.getElementById('areaChart4').getContext('2d');

var myChart = new Chart( ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep','Okt','Nop','Des'],
        type: 'line',
        datasets: [ {
            label: 'Total Request',
            data: [{{$countSiikma[1]}},{{$countSiikma[2]}}, {{$countSiikma[3]}}, {{$countSiikma[4]}}, {{$countSiikma[5]}}, {{$countSiikma[6]}}, {{$countSiikma[7]}},{{$countSiikma[8]}},{{$countSiikma[9]}},{{$countSiikma[10]}},{{$countSiikma[11]}},{{$countSiikma[12]}}],
            backgroundColor: 'transparent',
            borderColor: '#e82646',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:'#e82646',
            pointBorderColor :'#e82646',
            pointHoverBorderColor :'#e82646',
            pointBorderWidth :2,
            pointRadius :2,
            pointHoverRadius :2,
            borderWidth: 4
        }, ]
    },
    options: {

        maintainAspectRatio: false,
        legend: {
            display: false
        },
        responsive: true,
        tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#6b6f80',
            bodyFontColor: '#6b6f80',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
        },
        scales: {
            xAxes: [ {
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 2,
                    fontColor: 'transparent'
                }
            } ],
            yAxes: [ {
                display:false,
                ticks: {
                    display: false,
                }
            } ]
        },
        title: {
            display: false,
        },
        elements: {
            line: {
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4
            }
        }
    }
});
/* Chartjs (#areaChart4) closed */
 /*-----Transactions-----*/
 var myCanvas = document.getElementById("transactions");
    myCanvas.height = "330";

    var myCanvasContext = myCanvas.getContext("2d");
    var gradientStroke1 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
    gradientStroke1.addColorStop(0, hexToRgba(myVarVal, 0.8) || 'rgba(108, 95, 252, 0.8)');
    gradientStroke1.addColorStop(1, hexToRgba(myVarVal, 0.2) || 'rgba(108, 95, 252, 0.2) ');

  

    var myChart = new Chart(myCanvas, {

        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
            type: 'line',
            datasets: [{
                label: 'Total Sales',
                data: [{{$countVisit[1]}},{{$countVisit[2]}}, {{$countVisit[3]}}, {{$countVisit[4]}}, {{$countVisit[5]}}, {{$countVisit[6]}}, {{$countVisit[7]}},{{$countVisit[8]}},{{$countVisit[9]}},{{$countVisit[10]}},{{$countVisit[11]}},{{$countVisit[12]}}],
                backgroundColor: gradientStroke1,
                borderColor: myVarVal,
                pointBackgroundColor: '#fff',
                pointHoverBackgroundColor: gradientStroke1,
                pointBorderColor: myVarVal,
                pointHoverBorderColor: gradientStroke1,
                pointBorderWidth: 0,
                pointRadius: 0,
                pointHoverRadius: 0,
                borderWidth: 3,
                fill: 'origin'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                enabled: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: false,
                },
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        color: 'rgba(119, 119, 142, 0.08)'
                    },
                    ticks: {
                        fontColor: '#b0bac9',
                        autoSkip: true,
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month',
                        fontColor: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 10000,
                        stepSize: 1000,
                        fontColor: "#b0bac9",
                    },
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false,
                        zeroLineColor: 'rgba(142, 156, 173,0.1)',
                        color: "rgba(142, 156, 173,0.1)",
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'sales',
                        fontColor: 'transparent'
                    }
                }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    });
</script>