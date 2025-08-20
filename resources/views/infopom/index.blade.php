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
                            <div class="card-header bg-info text-white">
                                <h3 class="card-title">Grafik Data Pengunjung Website {{date('Y')}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="chartBar2" class="h-275"></canvas>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card bg-primary-gradient img-card box-primary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{$qna}}
                                        </h2>
                                        <p class="text-white mb-0">E-learning QNA</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-graduation-cap text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-secondary-gradient img-card box-secondary-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{$faqk}}</h2>
                                        <p class="text-white mb-0">Kategori FAQ</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-list-ul text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                        <div class="card  bg-success-gradient img-card box-success-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-white">
                                        <h2 class="mb-0 number-font">{{$faq}}</h2>
                                        <p class="text-white mb-0">Total FAQ</p>
                                    </div>
                                    <div class="ms-auto"> <i class="fa fa-comments text-white fs-30 me-2 mt-2"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row" >		
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <h3 class="card-title text-white">Data E-Learning QNA <i class="fa fa-paper-plane"></i></h3>                  
                            </div>
                            <div class="card-body">
                            <i class="fa fa-graduation-cap fa-3x text-primary"></i>&nbsp;&nbsp;
                            <button type="button" class="btn btn-sm dropdown-toggle px-1 text-primary h5" style="background-color:white;" data-bs-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                                E-Learning QNA
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/info-pom/qna/pangan">Pangan</a></li>
                                <li><a href="/info-pom/qna/kosmetik">Kosmetik</a></li>
                                <li><a href="/info-pom/qna/ot">Obat Tradisional</a></li>
                                <li><a href="/info-pom/qna/non-pelaku-usaha">Non Pelaku Usaha</a></li>
                            </ul>
                            </div>
                        </div>
                    </div>		
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/info-pom/faq/kategori"><h3 class="card-title text-white">Data Kategori FAQ <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body d-flex  align-items-center gap-2">
                                <a href="/info-pom/faq/kategori" class="text-decoration-none d-flex align-items-center">
                                    <i class="fa fa-list-ul fa-3x" aria-hidden="true"></i>
                                    <span class="ms-2 ">Kategori FAQ</span>
                                </a>
                            </div>

                        </div>
                    </div>	
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                            <a href="/info-pom/faq"><h3 class="card-title text-white">Data FAQ <i class="fa fa-paper-plane"></i></h3></a>                    
                            </div>
                            <div class="card-body d-flex  align-items-center gap-2">
                                <a href="/info-pom/faq" class="text-decoration-none d-flex align-items-center">
                                    <i class="fa fa-comments fa-3x" aria-hidden="true"></i>
                                    <span class="ms-2 ">Frequently Asked Questions (FAQ)</span>
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
                                    <h5 class="card-title " style="text-align: center;">INFOPOM<i class="breadcrumb-item" aria-current="page"> Version: <b>BETA 1.0</b></i></h5>
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
	