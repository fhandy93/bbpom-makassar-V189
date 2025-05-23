<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Konfirmasi Izin</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIKAMA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Izin</li>
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
							<p class="card-text">{{ session() -> get('success')}}</p>
						</div>
					@endif    	
					<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-6 col-md-6">
					<a href="/rekapizin" class="btn btn-primary my-3"><i class="fa fa-eye"></i> Lihat Rekap Izin</a>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Konfirmasi Izin Keluar</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/konfirstore/{{ $data->id }}" >
									@csrf
									@method('put')
									<input type="text" value="{{ $data->user_id }}"  name="user_id" hidden>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nama" class="form-label">Nama Pemohon</label>
											<input type="text" value="{{ $data->user->name }}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" readonly>
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="tgl" class="form-label">Tanggal Izin </label>
											<input type="text" value="{{ $data->tgl_izin }}"   class="form-control  @error('nip') is-invalid @enderror" id="tgl" name="tgl" readonly>
											@error('tgl')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="jam" class="form-label">Jam Izin </label>
											<input type="text" value="{{ $data->jam }}"   class="form-control  @error('nip') is-invalid @enderror" id="jam" name="jam" readonly>
											@error('jam')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="keperluan" class="form-label">Keperluan Izin</label>
											<textarea  class="form-control  @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan"  rows="5" readonly>{{ $data->keperluan }}</textarea>
											@error('keperluan')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="status">Konfirmasi</label>
											<select name="status" class="form-control form-select select2" data-bs-placeholder="Konfirmasi">
													<option value="2">Terima</option>
													<option value="3">Tolak</option>
											</select>
										</div>
									</div>
                                    
                                    
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="ket" class="form-label">Keterangan Konfirmasi</label>
											<textarea  class="form-control  @error('ket') is-invalid @enderror" id="ket" name="ket"  rows="5" >{{old('ket')}}</textarea>
											@error('ket')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
								
                                    <p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Kirim Konfirmasi</button>
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
					perlu: {
						required: true
					},
					jam1: {
						required: true
					},
					jam2: {
						required: true
					}
				},
				messages: {
					nama: {
						required: "Nama harus diisi",
						minlength: "Harus berisi minimal 2 karakter"
					},
					perlu: {
						required: "Kolom Keperluan Izin Harus diisi"
					},
					jam1: {
						required: "Kolom Jam harus diisi"
					},
					jam2: {
						required: "Kolom Jam harus diisi"
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
				
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".mb-12" ).addClass( "has-success" ).removeClass( "has-error" );
				
				
				}
			} );
		} );
	</script>           