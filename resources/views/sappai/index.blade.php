<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">SAPPAI <i>V. 2</i></h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SAPPAI BBPOM Makassar</a></li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
				<div class="row" >				
                    <div class="col-md-4 " >
                        <!-- <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/reagensiav"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body" balloon.jpg>
                                REAGENSIA
                            </div>
                        </div> -->
                        <div class="card" >
                        <img class="card-img-top" src="{{ asset('vendor/images/media/sappaisampel.jpg') }}" height="330px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Sample Pengujian</h5>
                           
                            <a href="/sample_sappai" class="btn bg-indigo">Daftar Sample</a>
                        </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <div class="col-md-4 " >
                        <!-- <div class="card">
                            <div class="card-header bg-secondary br-te-3 br-ts-3">
                            <a href="/reagensiav"><h3 class="card-title text-white">Saldo Akhir <i class="fa fa-arrow-circle-right fa-1x"></i></h3></a>                    
                            </div>
                            <div class="card-body" balloon.jpg>
                                REAGENSIA
                            </div>
                        </div> -->
                        <div class="card">
                        <img class="card-img-top" src="{{ asset('vendor/images/media/sappaiuser.jpg') }}" alt="Card image cap" height="330px">
                        <div class="card-body">
                            <h5 class="card-title">User SAPPAI</h5>
                           
                            <a href="/user_sappai" class="btn bg-indigo">Daftar User</a>
                        </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    
                    <div class="col-md-4" >
                        
                            <div class="card">
                                <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                                <a href="/kuisioner"><h3 class="card-title text-white">Daftar Kuisioner <i class="fa fa-paper-plane"></i></h3></a>                    
                                </div>
                                <div class="card-body">
                                <i class="fa fa-file-text fa-2x"></i>   Kuisioner
                                </div>
                            </div>
                       
                        
                            <div class="card">
                                <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                                <a href="/samplei_sappai"><h3 class="card-title text-white">Input Sample Baru <i class="fa fa-paper-plane"></i></h3></a>                    
                                </div>
                                <div class="card-body">
                                 <i class="fa fa-flask fa-2x"></i>   New Sample
                                </div>
                            </div>
                      
                        
                            <div class="card">
                                <div class="card-header bg-gray-dark br-te-3 br-ts-3">
                                <a href="/useri_sappai"><h3 class="card-title text-white">Input User Baru <i class="fa fa-paper-plane"></i></h3></a>                    
                                </div>
                                <div class="card-body">
                                <i class="fa fa-users fa-2x"></i>   New Users
                                </div>
                            </div>
                        
                    </div>
                    
                    
				</div>
				<!-- ROW CLOSED -->
				 <div class="row">	
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                    <div class="card overflow-hidden" >
                        <div class="card-body pb-0 bg-recentorder">
                            <h5 class="card-title " style="text-align: center;"><i class="breadcrumb-item" aria-current="page">SAPPAI Version: <b>2.0</b></i></h5>
                            <div class="chartjs-wrapper-demo">
                                <canvas id="recentorders" class="chart-dropshadow" style="display: none;"></canvas>
                            </div>
                        </div>
                        <div id="flotback-chart" class="flot-background"></div>    
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
	