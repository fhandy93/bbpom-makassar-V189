<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Form Download Laporan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Download Laporan</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">	
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
						
					<div class="card">
							<div class="card-header">
								<h3 class="card-title">Download Laporan</h3>
                                <div class="card-options ">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x text-white"></i></a>
                                </div>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/ulpk/download-proses" >
									@csrf
									@method('post')		
									
                                    <div class="form-group m-0">
                                            <div class="row ">
                                                <div class="col-6">
                                                        <select name="bulan" class="form-control form-select select2" data-bs-placeholder="Select Month">
                                                            <option value="01" selected>Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">Nopember</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                </div>
                                                <div class="col-6">
                                                        <select name="tahun" class="form-control form-select select2" data-bs-placeholder="Select Year">
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')}}" selected>{{ Carbon\Carbon::now()->format('Y')}}</option>
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')-1}}">{{ Carbon\Carbon::now()->format('Y')-1}}</option>
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')-2}}">{{ Carbon\Carbon::now()->format('Y')-2}}</option>
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')-3}}">{{ Carbon\Carbon::now()->format('Y')-3}}</option>
                                                            
                                                        </select>
                                                </div>
                                                
                                            </div><br>
                                            <div class="row">
                                                 <div class="form-row">
                                                    <div class="col-8 ">
                                                        <label for="user_data" class="form-label">Petugas</label>
                                                        <select name="petugas" class="form-control form-select select2" >
                                                            <option value="-" >Semua Petugas</option>
                                                            @foreach($user as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>	
                                                    </div>
                                                    <div class="col-4 ">
                                                        <label for="user_data" class="form-label">Komoditi</label>
                                                        <select name="komoditi" class="form-control form-select select2" >
                                                            <option value="-" >Semua Komoditi</option>
                                                            <option value="Obat">Obat</option>
                                                            <option value="Obat Tradisional">Obat Tradisional</option>
                                                            <option value="Suplemen Kesehatan">Suplemen Kesehatan</option>
                                                            <option value="Pangan Olahan">Pangan Olahan</option>
                                                            <option value="Kosmetik">Kosmetik</option>
                                                            <option value="Umum">Umum</option>
                                                        </select>	
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            <div class="row ">
                                                <div class="col-2">
                                                    <button type="submit" class="btn btn-primary" style="width:160px;">Download Data</button>
                                                </div>
                                            </div>
                                            
                                        </div>
									<p>
									
								</form><!-- End Multi Columns Form -->
							</div>
						</div>
					</div>
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
	
      