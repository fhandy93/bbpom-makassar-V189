<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- ROW OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('vendor/images/media/pengaduan.png') }}">
                    </div>
                </div>
				<div class="row">		
                    <!-- COL START -->
                    <div class="col-md-4 col-xl-4">
                        <div class="card">
                            <div class="card-header bg-success br-te-3 br-ts-3">
                                <h3 class="card-title text-white">Formulir Pengaduan/Rujukan</h3>
                                
                            </div>
                            <div class="card-body">
                            <a href="/v3-formrujukan" class="btn btn-success">Formulir</a>
                            </div>
                            <div class="card-footer">
                                Formulir Pengaduan Layanan Rujukan
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <!-- COL START -->
                    <div class="col-md-4 col-xl-4">
                        <div class="card">
                            <div class="card-header bg-success br-te-3 br-ts-3">
                                <h3 class="card-title text-white">Laporan Pengaduan/Rujukan</h3>
                                
                            </div>
                            <div class="card-body">
                                <a href="/v3-rujukan-view" class="btn btn-success">Laporan</a>
                            </div>
                            <div class="card-footer">
                                Laporan Pengaduan Layanan Rujukan 
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <!-- COL START -->
                  
                    <div class="col-md-4 col-xl-4">
                        <div class="card">
                            <div class="card-header bg-success br-te-3 br-ts-3">
                                <h3 class="card-title text-white">Info Aplikasi</h3>
                                
                            </div>
                            <div class="card-body">
                                <a href="/v2-info-rujuk" class="btn btn-success">Info Aplikasi</a>
                            </div>
                            <div class="card-footer">
                                Info Aplikasi Layanan Rujukan 
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
				</div>
				<!-- ROW CLOSED -->
                <div class="row">	
			        <!-- COL END -->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                        <div class="card overflow-hidden" >
                            <div class="card-body pb-0 bg-recentorder">
                                <h5 class="card-title text-white" style="text-align: center;"><i class="breadcrumb-item" aria-current="page">Layanan Rujukan Version: <b>3.0</b></i></h5>
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

    </x-HomeLayout>
