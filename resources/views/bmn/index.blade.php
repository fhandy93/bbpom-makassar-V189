<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- ROW 1 OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 50px;">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('vendor/images/media/bmn.png') }}">
                    </div>
                </div>
				
				<!-- ROW CLOSED -->
                 <div class="row">
                     <!-- ROW OPEN -->
                     <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card bg-primary img-card box-primary-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <h2 class="mb-0 number-font">{{$bastkembali}}
                                                </h2>
                                                <p class="text-white mb-0">BA Pengembalian</p>
                                            </div>
                                            <div class="ms-auto"> <i class="fa fa-sign-in text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card bg-secondary img-card box-secondary-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <h2 class="mb-0 number-font">{{$bastpinjam}}</h2>
                                                <p class="text-white mb-0">BA Peminjaman</p>
                                            </div>
                                            <div class="ms-auto"> <i class="fa fa-sign-out text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card  bg-success img-card box-success-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <h2 class="mb-0 number-font">{{$kendaraan}}</h2>
                                                <p class="text-white mb-0">Pemin. Kendaraan</p>
                                            </div>
                                            <div class="ms-auto"> <i class="fa fa-car text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card  bg-info img-card box-success-shadow">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="text-white">
                                                <h2 class="mb-0 number-font">{{$aula}}</h2>
                                                <p class="text-white mb-0">Pemin. AULA</p>
                                            </div>
                                            <div class="ms-auto"> <i class="fa fa-university text-white fs-30 me-2 mt-2"></i> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                        
                 </div>
                <div class="row" >
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Data Pelaporan BA Tahun {{date('Y')}} </h3>
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
                                <h3 class="card-title">Grafik Data Peminjaman (Kendaraan/Aula) Tahun {{date('Y')}} </h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="chartBar3" class="h-275"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row" >		
                    <div class="col-md-6" >
                        <div class="card">
                            <a href="/bmn/bast-pengembalian">
                                <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                                    <h3 class="card-title text-white" >Berita Acara (BA) <i class="fa fa-paper-plane"></i></h3>               
                                </div>
                            </a>     
                            <div class="card-body">
                            <a   href="/bmn/bast-pengembalian"><i class="fa fa-sign-in fa-3x"></i>&nbsp;&nbsp;Pengembalian</a>
                            </div>
                        </div>
                    </div>		
                    <div class="col-md-6" >
                        <div class="card">
                            <a href="/bmn/bast-peminjaman">
                                <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                                    <h3 class="card-title text-white">Berita Acara (BA) <i class="fa fa-paper-plane"></i></h3>               
                                </div>
                            </a>     
                            <div class="card-body">
                            <a   href="/bmn/bast-peminjaman"><i class="fa fa-sign-out fa-3x"></i>&nbsp;Peminjaman</a>
                            </div>
                        </div>
                    </div>	
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/bmn/pinjam-kendaraan"><h3 class="card-title text-white">Peminjaman <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            <a href="/bmn/pinjam-kendaraan"  ><i class="fa fa-car fa-3x"></i>&nbsp; Kendaraan</a>
                            </div>
                        </div>
                    </div>	
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/bmn/pinjam-aula"><h3 class="card-title text-white">Peminjaman <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            <a href="/bmn/pinjam-aula"  ><i class="fa fa-university fa-3x"></i>&nbsp; AULA</a>
                            </div>
                        </div>
                    </div>	
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/bmn/pinjam-non-bast"><h3 class="card-title text-white">Peminjaman<i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            <a href="/bmn/pinjam-non-bast"  ><i class="fa fa-cube fa-3x"></i>&nbsp; Barang</a>
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
                                    <h5 class="card-title " style="text-align: center;">BMN Moments<i class="breadcrumb-item" aria-current="page"> Version: <b>1.0</b></i></h5>
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
                label: "BA Pengembalian",
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
                label: "BA Peminjaman",
                data: [
                        {{$countpinjam1}}, 
                        {{$countpinjam2}}, 
                        {{$countpinjam3}}, 
                        {{$countpinjam4}}, 
                        {{$countpinjam5}}, 
                        {{$countpinjam6}}, 
                        {{$countpinjam7}},
                        {{$countpinjam8}}, 
                        {{$countpinjam9}}, 
                        {{$countpinjam10}}, 
                        {{$countpinjam11}}, 
                        {{$countpinjam12}}
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
     /* Bar-Chart3*/
     var ctx = document.getElementById("chartBar3");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul","Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Peminjaman Kendaraan",
                data: [
                        {{$countkend1}}, 
                        {{$countkend2}}, 
                        {{$countkend3}}, 
                        {{$countkend4}}, 
                        {{$countkend5}}, 
                        {{$countkend6}}, 
                        {{$countkend7}}, 
                        {{$countkend8}}, 
                        {{$countkend9}}, 
                        {{$countkend10}}, 
                        {{$countkend11}}, 
                        {{$countkend12}}
                    ],
                borderColor: "#5cb85c",
                borderWidth: "0",
                backgroundColor: "#5cb85c"
            }, {
                label: "Peminjaman Aula",
                data: [
                        {{$countaul1}}, 
                        {{$countaul2}}, 
                        {{$countaul3}}, 
                        {{$countaul4}}, 
                        {{$countaul5}}, 
                        {{$countaul6}}, 
                        {{$countaul7}},
                        {{$countaul8}}, 
                        {{$countaul9}}, 
                        {{$countaul10}}, 
                        {{$countaul11}}, 
                        {{$countaul12}}
                    ],
                borderColor: "#233fb0",
                borderWidth: "0",
                backgroundColor: "#233fb0"
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
     
    </script>
	