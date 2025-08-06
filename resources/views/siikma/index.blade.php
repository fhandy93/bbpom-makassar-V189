<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- ROW 1 OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 50px;">
                    <div class="col-md-12 text-center">
                        <!-- <img src="{{ asset('vendor/images/media/sipintar.png') }}"> -->
                    </div>
                </div>
				
				<!-- ROW CLOSED -->
                <div class="row" >
                    <div class="col-lg-8 col-md-5">
                        <div class="card ">
                            <div class="card-header bg-gray text-white">
                                <h3 class="card-title">Grafik Data Penggunaan SIIKMA {{date('Y')}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="chartBar2" class="h-275"></canvas>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card bg-warning-gradient img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{$totalByMont->total_izin}}
                                        </h2>
                                        <p class="text-white mb-0">Total izin bulan ini (Jam)</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-clock-o text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-secondary-gradient img-card box-secondary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{$byMonth}}</h2>
                                        <p class="text-white mb-0">Total SIIKMA bulan ini</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-arrow-circle-up text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                        <div class="card  bg-success-gradient img-card box-success-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{$byYear}}</h2>
                                        <p class="text-white mb-0">Total SIIKMA tahun ini</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-arrow-circle-o-up text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row" >		
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray br-te-3 br-ts-3">
                            <a href="/siikma/formulir"><h3 class="card-title text-white">Formulir Izin <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body d-flex  align-items-center gap-2">
                                <a href="/siikma/formulir" class="text-decoration-none d-flex align-items-center">
                                    <i class="fa fa-list-ul fa-3x" aria-hidden="true"></i>
                                    <span class="ms-2 ">Formulir</span>
                                </a>
                            </div>

                        </div>
                    </div>		
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray br-te-3 br-ts-3">
                            <a href="/siikma/daftar-izin"><h3 class="card-title text-white">Daftar Penggunaan SIIKMA <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body d-flex  align-items-center gap-2">
                                <a href="/siikma/daftar-izin" class="text-decoration-none d-flex align-items-center">
                                    <i class="fa fa-list-ul fa-3x" aria-hidden="true"></i>
                                    <span class="ms-2 ">Daftar SIIKMA</span>
                                </a>
                            </div>

                        </div>
                    </div>	
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray br-te-3 br-ts-3">
                            <a href="/siikma/rekap-data"><h3 class="card-title text-white">Data Rekap (Ketua Tim) <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body d-flex  align-items-center gap-2">
                                <a href="/siikma/rekap-data" class="text-decoration-none d-flex align-items-center">
                                    <i class="fa fa-list-alt fa-3x" aria-hidden="true"></i>
                                    <span class="ms-2 ">Data Rekap SIIKMA</span>
                                </a>
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
                                    <h5 class="card-title " style="text-align: center;">SIIKMA<i class="breadcrumb-item" aria-current="page"> Version: <b>Beta 2.1</b></i></h5>
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
                label: "Pengunjung",
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
     

    /* Doughbut Chart*/
 
    </script>
	