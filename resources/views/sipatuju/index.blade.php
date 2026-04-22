
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
                    <div class="col-md-4" >
                        <div class="card">
                            <a href="/sipatuju/kckt" class="btn btn-primary">KCKT</a>                    
                        </div>
                    </div>	
                </div>
				<div class="row" >		
                  
				</div>
				<!-- ROW CLOSED -->
                <div class="row">	
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                            <div class="card overflow-hidden" >
                                <div class="card-body pb-0 bg-recentorder">
                                    <h5 class="card-title " style="text-align: center;">SIPATUJU<i class="breadcrumb-item" aria-current="page"> Version: <b>Beta 1</b></i></h5>
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
   