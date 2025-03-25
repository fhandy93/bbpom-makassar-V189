<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- ROW OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                    <div class="col-md-12 text-center">
                        <img src="{{ asset('vendor/images/media/Layanan Info.jpg') }}">
                    </div>
                </div>
				<div class="row">
							
							<div class="col-md-4 col-xl-4" >			
                                <div class="card">
                                <div class="card-status card-status-left bg-success br-bs-7 br-ts-7"></div>
                                <div class="card-body">
                                        <h5 class="card-title">Formulir Konsumen ULPK</h5>
                                        <a href="/formulpk" class="btn btn-success">Formulir</a>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-md-4 col-xl-4">
                            <div class="card">
                            <div class="card-status card-status-left bg-success br-bs-7 br-ts-7"></div>
                                <div class="card-body">
                                        <h5 class="card-title">Laporan Konsumen ULPK</h5>
                                        <a href="/laporanulpk" class="btn btn-success">Laporan</a>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                            <div class="col-md-4 col-xl-4">
                            <div class="card">
                            <div class="card-status card-status-left bg-success br-bs-7 br-ts-7"></div>
                                <div class="card-body">
                                        <h5 class="card-title">Download Laporan ULPK</h5>
                                        <a href="/cetakulpk" class="btn btn-success">Download</a>
                                    </div>
                                </div>
                            </div>
                            <!-- COL END -->
                           
				</div>
				<!-- ROW CLOSED -->
			
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
