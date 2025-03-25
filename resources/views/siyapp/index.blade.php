<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- ROW 1 OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 50px;">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('vendor/images/media/siyapp.png') }}">
                    </div>
                </div>
				
				<!-- ROW CLOSED -->
				
                 <!-- ROW 2 OPEN -->
                 <div class="row row-cols-4">
                    <div class="col-xl-3 col-sm-12">
                        <div class="card border p-0">
                            <div class="card-header">
                                <h3 class="card-title">Formulir</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <a href="/formulir" style="color: white;">
                                    <p class="card-text"><i class="fa fa-edit fa-4x"></i></p>
                                    <h4 class="h4 mb-0 mt-3">Formulir Laporan</h4>
                                </a>
                            </div>
                            <div class="card-footer text-center bg-gray">
                                <div class="row">
                                    <div class="text-center">
                                        Formulir pengaduan perbaikan dan pemeliharaan peralatan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-12">
                        <div class="card border p-0">
                            <div class="card-header">
                                <h3 class="card-title">Laporan</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <a href="/laporan" style="color: white;">
                                    <p class="card-text"><i class="fa fa-building fa-4x"></i></p>
                                    <h4 class="h4 mb-0 mt-3">Perlengkapan Kantor</h4>
                                </a>
                            </div>
                            <div class="card-footer text-center bg-gray">
                                <div class="row">
                                    <div class="text-center">
                                        Laporan kerusakan dan pemeliharaan barang/perlengkapan kantor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-12">
                        <div class="card border p-0">
                            <div class="card-header">
                                <h3 class="card-title">Laporan</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <a href="/laporan-it" style="color: white;">
                                    <p class="card-text"><i class="fa fa-laptop fa-4x"></i></p>
                                    <h4 class="h4 mb-0 mt-3">Perlengkapan IT</h4>
                                </a>
                            </div>
                            <div class="card-footer text-center bg-gray">
                                <div class="row">
                                    <div class="text-center">
                                    Laporan kerusakan dan pemeliharaan barang/perlengkapan IT
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-12">
                        <div class="card border p-0">
                            <div class="card-header">
                                <h3 class="card-title">Cetak</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <a href="/form-cetak" style="color: white;">
                                    <p class="card-text"><i class="fa fa-print fa-4x"></i></p>
                                    <h4 class="h4 mb-0 mt-3">Cetak Laporan</h4>
                                </a>
                            </div>
                            <div class="card-footer text-center bg-gray">
                                <div class="row">
                                    <div class="text-center">
                                        Cetak laporan hasil perbaikan dan pemeliharaan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                </div>
                <!-- ROW 2 CLOSED -->
                  <div class="row">	
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                            <div class="card overflow-hidden" >
                                <div class="card-body pb-0 bg-recentorder">
                                    <h5 class="card-title text-white" style="text-align: center;"><i class="breadcrumb-item" aria-current="page">SIYAPP Version: <b>2.0</b></i></h5>
                                    <div class="chartjs-wrapper-demo">
                                        <canvas id="recentorders" class="chart-dropshadow" style="display: none;"></canvas>
                                    </div>
                                </div>
                                <div id="flotback-chart" class="flot-background"></div>    
                            </div>
                        </div>
                        <!-- COL END -->
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
	