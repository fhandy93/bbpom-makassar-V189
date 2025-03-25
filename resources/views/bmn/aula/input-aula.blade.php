<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Input AULA Kantor</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
							<li class="breadcrumb-item active" aria-current="page">Input AULA</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
				@if (session() -> has('succes'))
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Success</h4>
							<p class="card-text">{{ session() -> get('succes')}}</p>
						</div>
					@endif 
					@if (session() -> has('unsucces'))
						<div class="card-body text-center" id="success"> 
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#fad383" d="M15.728,22H8.272a1.00014,1.00014,0,0,1-.707-.293l-5.272-5.272A1.00014,1.00014,0,0,1,2,15.728V8.272a1.00014,1.00014,0,0,1,.293-.707l5.272-5.272A1.00014,1.00014,0,0,1,8.272,2H15.728a1.00014,1.00014,0,0,1,.707.293l5.272,5.272A1.00014,1.00014,0,0,1,22,8.272V15.728a1.00014,1.00014,0,0,1-.293.707l-5.272,5.272A1.00014,1.00014,0,0,1,15.728,22Z"/><circle cx="12" cy="16" r="1" fill="#f7b731"/><path fill="#f7b731" d="M12,13a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v4A1,1,0,0,1,12,13Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3"><b>Update Stok Gagal</b></h4>
							<p class="card-text">{{ session() -> get('unsucces')}}</p>
						</div>
					@endif    	 	
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
                    <a href="/bmn/admin/daftar-aula"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left me-2"></i>Back</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Input AULA Kantor</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" enctype="multipart/form-data" class="form-horizontal" action="/bmn/admin/input-aula-store" >
									@csrf
									@method('post')
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nama" class="form-label">Nama AULA</label>
											<input type="text" value="{{old('nama')}}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama">
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="pj" class="form-label">Penanggung Jawab</label>
											<input type="text" value="{{old('pj')}}"  class="form-control  @error('pj') is-invalid @enderror" id="pj" name="pj">
											@error('pj')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-4 mb-12 ">
											<label for="ukuran" class="form-label">Ukuran</label>
											<input type="text" value="{{old('ukuran')}}"  class="form-control  @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" placeholder="Contoh:20x20 Meter">
											@error('ukuran')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-4 mb-12 ">
											<label for="kapasitas" class="form-label">Kapasitas (Orang)</label>
											<input type="text" value="{{old('kapasitas')}}"  class="form-control  @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" placeholder="Contoh:Max 150 Orang">
											@error('kapasitas')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="petugas" class="form-label">Petugas Kebersihan</label>
											<input type="text" value="{{old('petugas')}}"  class="form-control  @error('petugas') is-invalid @enderror" id="petugas" name="petugas">
											@error('petugas')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="wa" class="form-label">WhatsApp Petugas</label>
											<input type="text" value="{{old('wa')}}"  class="form-control  @error('wa') is-invalid @enderror" id="wa" name="wa" placeholder="+62">
											@error('wa')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row" id="sertifikat"  >
                                        <div class="col-xl-8 mb-12 ">
                                            <div class="form-group">
                                                <label class="form-label mt-0">Foto</label>
                                                <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" id="file">
                                                	
                                                <p><span>* File harus berextensi png dan jpg</span>
                                            </div>
                                        </div>
                                    </div>
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Input</button>
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
					nama: {
						required: true
					},
					pj: {
						required: true
					},
					ukuran: {
						required: true
					},
					kapasitas: {
						required: true
					},
					petugas: {
						required: true
					},
					wa: {
						required: true
					}

				},
				messages: {
					nama: {
						required: "Nama AULA harus diisi"
					},
					pj: {
						required: "Nama Penanggung Jawab AULA harus diisi"
					},
					ukuran: {
						required: "Ukuran Aula harus diisi"
					},
					kapasitas: {
						required: "Kapasitas AULA harus diisi"
					},
					petugas: {
						required: "Petugas AULA"
					},
					wa: {
						required: "Nomor WhatsApp Petugas AULA harus diisi"
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