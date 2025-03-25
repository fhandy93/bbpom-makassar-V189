<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Formulir Data Konsumen ULPK</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Konsumen ULPK</li>
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
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
					<a href="/laporanulpk" class="btn btn-primary my-3"><i class="fa fa-eye"></i> Lihat Laporan</a>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Identitas Konsumen</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/store" >
									@csrf
									@method('post')
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="tgl_lapor" class="form-label">Tanggal Terima. (Bulan-Tanggal-Tahun)</label>
											<div class="input-group">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="00/00/0000" type="text" name="tgl_lapor" id="tgl_lapor">
											</div>
											@error('tgl_terima')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nama" class="form-label">Nama</label>
											<input type="text" value="{{old('nama')}}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" >
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="umur">Umur</label>
											<select name="umur" class="form-control form-select select2" data-bs-placeholder="Select Country">
													<option value="<25 Tahun"> <25 Tahun </option>
													<option value="25-30 Tahun">25-30 Tahun</option>
													<option value="31-40 Tahun">31-40 Tahun</option>
													<option value="41-50 Tahun">41-50 Tahun</option>
													<option value="51-60 Tahun">51-60 Tahun</option>
													<option value=">60 Tahun">>60 Tahun</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Jenis Kelamin</label>
											<select name="kelamin" class="form-control form-select select2" data-bs-placeholder="Select Country">
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="jenis" class="form-label">Alamat</label>
											<textarea  class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  rows="4">{{old('alamat')}}</textarea>
											@error('alamat')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="hp" class="form-label">HP/Telp.</label>
											<input type="text" value="{{old('hp')}}"  class="form-control  @error('hp') is-invalid @enderror" id="hp" name="hp" >
											@error('hp')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="email" class="form-label">Email</label>
											<input type="text" value="{{old('email')}}"  class="form-control  @error('email') is-invalid @enderror" id="email" name="email" >
											@error('email')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="perusahaan" class="form-label">Nama Perusahaan</label>
											<input type="text" value="{{old('perusahaan')}}"  class="form-control  @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" >
											@error('perusahaan')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="Pekerjaan">Pekerjaan</label>
											<select name="pekerjaan" class="form-control form-select select2" data-bs-placeholder="Select Country">
													<option value="Pegawai swasta">Pegawai swasta</option>
													<option value="Wiraswasta">Wiraswasta</option>
													<option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
													<option value="PNS">PNS</option>
													<option value="Dosen/Peneliti">Dosen/Peneliti</option>
													<option value="Lainnya">Lainnya</option>
											</select>
										</div>
									</div>
                                    <p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Next</button>
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
    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{ asset('vendor/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
     
     <!-- TIMEPICKER JS -->
     <script src="{{ asset('vendor/plugins/time-picker/jquery.timepicker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/time-picker/toggles.min.js')}}"></script>
 
      <!-- DATEPICKER JS -->
      <script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>
       
     <!-- FORMELEMENTS JS -->
     <script src="{{ asset('vendor/js/formelementadvnced.js')}}"></script>
     <script src="{{ asset('vendor/js/form-elements.js')}}"></script>
 
     <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
 


    </x-HomeLayout>
	
<script type="text/javascript">
    
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					nama: {
						required: true,
						minlength: 2
					},
					alamat: {
						required: true
					}
				},
				messages: {
					nama: {
						required: "Nama harus diisi",
						minlength: "Harus berisi minimal 2 karakter"
					},
					alamat: {
						required: "Alamat harus diisi"
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