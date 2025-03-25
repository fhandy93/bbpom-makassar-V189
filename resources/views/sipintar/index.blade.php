<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- ROW 1 OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 50px;">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('vendor/images/media/sipintar.png') }}">
                    </div>
                </div>
				
				<!-- ROW CLOSED -->
                <div class="row" >
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Data Pengunjung/Tamu dan Survey {{date('Y')}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="chartBar2" class="h-275"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Diagram Hasil Survey {{date('Y')}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="chartPie" class="h-275"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row" >		
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/sipintar/data-tamu"><h3 class="card-title text-white">Data Pengunjung/Tamu <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            <i class="fa fa-users fa-3x"></i>&nbsp;&nbsp;Pengunjung/Tamu
                            </div>
                        </div>
                    </div>		
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/sipintar/data-petugas"><h3 class="card-title text-white">Data Petugas <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                             <i class="fa fa-user fa-3x"></i>&nbsp;Petugas
                            </div>
                        </div>
                    </div>	
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/sipintar/data-survey"><h3 class="card-title text-white">Data Survey <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            <i class="fa fa-pie-chart fa-3x"></i>&nbsp; Survey
                            </div>
                        </div>
                    
                    </div>	
				</div>
				<!-- ROW CLOSED -->
                <div class="row">	
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                            <div class="card overflow-hidden" >
                                <div class="card-body pb-0 bg-recentorder">
                                    <h5 class="card-title text-white" style="text-align: center;">SIPINTAR<i class="breadcrumb-item" aria-current="page"> Version: <b>1.0</b></i></h5>
                                    <div class="chartjs-wrapper-demo">
                                        <canvas id="recentorders" class="chart-dropshadow" style="display: none;"></canvas>
                                    </div>
                                </div>
                                <div id="flotback-chart" class="flot-background"></div>    
                            </div>
                        </div>
                <!-- COL END -->
                </div>
                           
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
    
    <!-- JQUERY JS -->
    <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('vendor/js/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('vendor/js/circle-progress.min.js')}}"></script>


    <!-- SIDE-MENU JS -->
    <script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>


    <!-- SIDEBAR JS -->
    <script src="{{ asset('vendor/plugins/sidebar/sidebar.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
    <script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('vendor/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('vendor/js/sticky.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('vendor/js/custom.js')}}"></script>

	<!-- Perfect SCROLLBAR JS-->
	<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

	<!-- FORMVALIDATION JS -->
	<script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendor/js/select2.js')}}"></script>






    <!-- INPUT MASK JS-->
    <script src="{{ asset('vendor/plugins/input-mask/jquery.mask.min.js')}}"></script>



    <!-- CHARTJS JS -->
    <script src="{{ asset('vendor/plugins/chart/Chart.bundle.js')}}"></script>
    <script src="{{ asset('vendor/js/chart.js')}}"></script>

    <!-- SIDEBAR JS -->
    <script src="../assets/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="../assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/p-scroll/pscroll.js"></script>
    <script src="../assets/plugins/p-scroll/pscroll-1.js"></script>

    <!-- Color Theme js -->
    <script src="../assets/js/themeColors.js"></script>

    <!-- Sticky js -->
    <script src="../assets/js/sticky.js"></script>

    <!-- CUSTOM JS -->
    <script src="../assets/js/custom.js"></script>

    </x-HomeLayout>
    <script  type="text/javascript">
    /* Bar-Chart2*/
    var ctx = document.getElementById("chartBar2");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul","Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pengunjung/Tamu",
                data: [
                        {{$count1}}, 
                        {{$count2}}, 
                        {{$count3}}, 
                        {{$count4}}, 
                        {{$count5}}, 
                        {{$count6}}, 
                        {{$count7}}, 
                        {{$count8}}, 
                        {{$count9}}, 
                        {{$count10}}, 
                        {{$count11}}, 
                        {{$count12}}
                    ],
                borderColor: "#6c5ffc",
                borderWidth: "0",
                backgroundColor: "#6c5ffc"
            }, {
                label: "Survey",
                data: [
                        {{$countsurvey1}}, 
                        {{$countsurvey2}}, 
                        {{$countsurvey3}}, 
                        {{$countsurvey4}}, 
                        {{$countsurvey5}}, 
                        {{$countsurvey6}}, 
                        {{$countsurvey7}},
                        {{$countsurvey8}}, 
                        {{$countsurvey9}}, 
                        {{$countsurvey10}}, 
                        {{$countsurvey11}}, 
                        {{$countsurvey12}}
                    ],
                borderColor: "#05c3fb",
                borderWidth: "0",
                backgroundColor: "#05c3fb"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    barValueSpacing: 0,
                    barDatasetSpacing: 0,
                    barRadius: 0,
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
                labels: {
                    fontColor: "#9ba6b5"
                },
            },
        }
    });
       /* Pie Chart*/
       var datapie = {
        labels: ['Kurang Puas(%)', 'Cukup Puas(%)', 'Puas(%)', 'Sangat Memuaskan(%)'],
        datasets: [{
            data: [ 
                    Math.round({{$ckpuas}} * 100) / 100, 
                    Math.round({{$ccpuas}} * 100) / 100, 
                    Math.round({{$cpuass}} * 100) / 100, 
                    Math.round({{$cspuas}} * 100) / 100
                ],
            backgroundColor: [ '#e82646','#05c3fb', '#09ad95', '#1170e4']
        }]
    };
    var optionpie = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: false,
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    };

    /* Doughbut Chart*/
    var ctx6 = document.getElementById('chartPie');
    var myPieChart6 = new Chart(ctx6, {
        type: 'doughnut',
        data: datapie,
        options: optionpie
    });
    </script>
	