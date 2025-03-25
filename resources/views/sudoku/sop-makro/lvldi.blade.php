<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Input Peta Lintas Fungsi</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SUDOKU</a></li>
							<li class="breadcrumb-item active" aria-current="page">Level C</li>
                            <li class="breadcrumb-item active" aria-current="page">Input Peta Lintas Fungsi</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
					@if (session() -> has('success'))
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Success</h4>
							<p class="card-text">{{ session() -> get('success')}}</p>
						</div>
					@endif 
					@if (session() -> has('unsuccess'))
						<div class="card-body text-center" id="unsuccess"> 
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Gagal</h4>
							<p class="card-text">{{ session() -> get('unsuccess')}}</p>
						</div>
					@endif    	
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
						<a href="/sop-makro/{{$proses_id}}"><button type="button" class="btn btn-primary"><i class="fe fe-eye me-2"></i>View SOP Makro</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Tambah Peta Lintas Fungsi</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" enctype="multipart/form-data" class="form-horizontal" action="/sop-makro-store/{{$proses_id}}" >
									@csrf
									@method('post')
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="kode" class="form-label">Kode SOP Makro</label>
											<input type="text" value="{{$kode->kode_peta}}/"  class="form-control  @error('kode') is-invalid @enderror" id="kode" name="kode" >
											@error('kode')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="nama" class="form-label">Nama SOP Makro</label>
											<input type="text" value="{{old('nama')}}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" >
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="tgl_lapor" class="form-label">Tanggal Terbit(Bulan-Tanggal-Tahun)</label>
											<div class="input-group">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{date('d/m/Y')}}" type="text" name="tgl_terbit" id="tgl_terbit">
											</div>
											@error('tgl_terbit')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-4 col-md-6">
											<div class="form-group">
												<div class="form-label">Jangka Waktu Penyimpanan</div>
												<div class="custom-controls-stacked">
													<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="waktu" value=1 checked>
															<span class="custom-control-label">Aktif Berlaku</span>
													</label>
													<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="waktu" value=2>
															<span class="custom-control-label">Aktif Tidak Berlaku</span>
													</label>
													<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="waktu" value=3>
															<span class="custom-control-label">Inaktif</span>
													</label>
												
												</div>
											</div>
										</div>
									</div>
									<div class="form-row" id="sertifikat"  >
                                        <div class="col-xl-8 mb-12 ">
                                            <div class="form-group">
                                                <label class="form-label mt-0">Dokument</label>
                                                <input class="form-control @error('filepdf') is-invalid @enderror" type="file" name="filepdf" id="filepdf">
                                                	
                                                <span>* File harus berextensi pdf</span>
                                            </div>
                                        </div>
                                    </div>
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
										<button type="reset" class="btn btn-secondary">Reset</button>
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

	<!-- DATEPICKER JS -->
	<script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>
       
     <!-- FORMELEMENTS JS -->
     <script src="{{ asset('vendor/js/formelementadvnced.js')}}"></script>
     <script src="{{ asset('vendor/js/form-elements.js')}}"></script>
 
     <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
 
	<!-- INTERNAL Bootstrap-Datepicker js-->
	<script src="{{ asset('vendor/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
     
     <!-- TIMEPICKER JS -->
     <script src="{{ asset('vendor/plugins/time-picker/jquery.timepicker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/time-picker/toggles.min.js')}}"></script>

    </x-HomeLayout>
	
<script type="text/javascript">
    var date = $('#tgl_terbit').datepicker({ dateFormat: 'dd/mm/yy' }).val();
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					kode: {
						required: true
					},
					nama: {
						required: true
					}

				},
				messages: {
					kode: {
						required: "Kode Peta Proses harus diisi"
					},
					nama: {
						required: "Nama Peta Proses harus diisi"
					}			
                },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".mb-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).parents( ".form-control" ).addClass( "is-invalid" ).removeClass( "valid" );
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".mb-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).parents( ".form-control" ).addClass( "valid" ).removeClass( "is-invalid" );
				
				}
			} );
		} );
	</script>