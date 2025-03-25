<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Form Cetak Laporan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIYAPP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Cetak Laporan</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">	
					<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-6 col-md-6">
						
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Cetak Laporan</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/siyappcetak" target="new">
									@csrf
									<div class="form-row">
										<div class="form-group col-xl-12 mb-12 ">
											<label class="form-label">Pilih Laporan</label>
											<select name="id" class="form-control form-select select2" data-bs-placeholder="Select Country" onchange="showDetail(this.value)">
                                                    @foreach ($lapor as $lapor)
													<option value="{{$lapor -> id}}">{{$lapor -> id}} | {{$lapor -> user ->name}} | {{$lapor -> tanggal_lapor}}</option>
													@endforeach
												</select>
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-12 mb-12 ">
                                        <div class="table-responsive">
                                            <h4 class="text-center">Spesifikasi Perlengkapan</h4>
                                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Nama Barang</td>
                                                        <td id="nama"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Merek</td>
                                                        <td id="merek"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Type</td>
                                                        <td id="type"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>No. Inven. (NUP)</td>
                                                        <td id="nup"></td>
                                                    </tr>
													<tr>
                                                        <td>5</td>
                                                        <td>Jenis Kerusakan</td>
                                                        <td id="jenis"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
										</div>
									</div><p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Cetak Laporan</button>
									</div>
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
	
<script type="text/javascript">
    function showDetail(str1) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
	var obj = JSON.parse(this.responseText);
	var objLength = Object.keys(obj).length;
	document.getElementById('nama').innerHTML=obj[0].nama_barang;
    document.getElementById('merek').innerHTML=obj[0].merek;
    document.getElementById('type').innerHTML=obj[0].type;
    document.getElementById('nup').innerHTML=obj[0].nup;
    document.getElementById('jenis').innerHTML=obj[0].jenis;
  }
  xhttp.open("GET", "showw/"+str1);
  xhttp.send();
  
}
	
	</script>           