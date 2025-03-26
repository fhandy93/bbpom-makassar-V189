<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- ROW OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('vendor/images/media/seppulo.png') }}">
                    </div>
                </div>
				<div class="row">
							
							<div class="col-md-6 col-xl-6" >			
                                <div class="card text-white">
                                <div class="card-header bg-success">
                                    <h5 class="card-title">Data Konsumen ULPK</h5>
                                </div>
                                <div class="card-body">
                                        <a href="/ulpkk" class="btn btn-info">ULPK</a>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-md-6 col-xl-6">
                            <div class="card text-white">
                                 <div class="card-header bg-success">
                                     <h5 class="card-title">Layanan Pengaduan/Rujukan</h5>
                                </div>
                                <div class="card-body">  
                                        <a href="/rujukan" class="btn btn-info">Pengaduan/Rujukan</a>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                             <div class="col-md-6 col-xl-6">
                            <div class="card text-white">
                                 <div class="card-header bg-success">
                                     <h5 class="card-title">Layanan Pengaduan/Rujukan V.2</h5>
                                </div>
                                <div class="card-body">
                                        <a href="/rujukan-v2" class="btn btn-info">Pengaduan/Rujukan</a>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                             <div class="col-md-6 col-xl-6">
                            <div class="card text-white">
                                 <div class="card-header bg-success">
                                     <h5 class="card-title ">Layanan Pengaduan/Rujukan V.3</h5>
                                </div>
                                <div class="card-body">
                                        <a href="/rujukan-v3" class="btn btn-info">Pengaduan/Rujukan</a>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                           
				</div>
				<!-- ROW CLOSED -->
				 <!-- CONTAINER CLOSED -->
                 <div class="row">	
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                    <div class="card overflow-hidden" >
                        <div class="card-body pb-0 bg-recentorder">
                            <h5 class="card-title " style="text-align: center;"><i class="breadcrumb-item" aria-current="page">SEPPULO Version: <b>3.0</b></i></h5>
                            <div class="chartjs-wrapper-demo">
                                <canvas id="recentorders" class="chart-dropshadow" style="display: none;"></canvas>
                            </div>
                        </div>
                        <div id="flotback-chart" class="flot-background"></div>    
                    </div>
                </div>
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

    </x-HomeLayout>
	