<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- ROW OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('vendor/images/media/sinonim.png') }}">
                    </div>
                </div>
				<div class="row">				
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/reagensiav"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                                REAGENSIA
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/mikrobiologiv"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                                MEDIA MIKROBIOLOGI
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/operasionalv"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            OPERASIONAL PENGUJIAN
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/kuantitatifv"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            ALAT GELAS KUANTITATIF
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/kualitatifv"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            ALAT GELAS KUALITATIF
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/bakuv"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            BAKU PEMBANDING
                            </div>
                        </div>
                    </div>
                      <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/sukuv"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            SUKU CADANG
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href=" "><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            BAHAN RUMAH TANGGA
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                  
                    <div class="col-md-4 col-xl-4" >
                        <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href=" "><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body">
                            PERALATAN & SARPRAS LABORATORIUM
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
                            <h5 class="card-title text-white" style="text-align: center;"><i class="breadcrumb-item" aria-current="page">SINONIM Version: <b>2.0</b></i></h5>
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
	