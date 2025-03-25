<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Formulir Pengajuan Lembur</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SMILE</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Formulir Pengajuan Lembur</li>
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
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Success</h4>
							<p class="card-text">{{ session() -> get('unsuccess')}}</p>
						</div>
					@endif    	
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
					<a href="/smile"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left me-2"></i>Kembali</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir Pengajuan Lembur</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/smile-store" >
									@csrf
									@method('post')
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nama" class="form-label">Nama</label>
											<input type="text" value="{{ Auth::user()->name}}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" readonly>
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nip" class="form-label">NIP</label>
											<input type="text" value="{{ $lembur->nip }}"  class="form-control  @error('nip') is-invalid @enderror" id="nip" name="nip" readonly>
											@error('nip')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									
									<div class="form-row">
										<div class="col-xl-4 mb-12 ">
											<label for="pangkat" class="form-label">Pangkat/Gol.</label>
											<input type="type" value="{{ $lembur->pangkat }}"  class="form-control  @error('pangkat') is-invalid @enderror" id="pangkat" name="pangkat" readonly>
											@error('pangkat')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="jabatan" class="form-label">Jabatan</label>
											<input type="text" value="{{$lembur->jabatan}}"  class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" readonly>
											@error('jabatan')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<p>
									<div class="form-group">
										<label for="tag">Tambahan Peserta Lembur</label>
										<select name="user[]" class="form-control select2 @error('user') is-invalid @enderror" multiple>
											@foreach ($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
											@endforeach
										</select>
										@error('user')
										<div class="invalid-feedback">
											{{ $message }}    
										</div>
										@enderror
										<span><b style="color: yellow;">*Hanya diisi jika pengajuan lembur dilakukan lebih dari 1 orang</b></span>
									</div>
                                   
                                    <div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="tugas" class="form-label">Tugas Lembur</label>
											<textarea  class="form-control  @error('tugas') is-invalid @enderror" id="tugas" name="tugas"  rows="4">{{old('jawaban')}}</textarea>
											@error('tugas')
											<span style="color: red; font-size: 8;"> Detail Tugas haru diisi </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-4 mb-12 ">
											<label for="tgl_masuk" class="form-label">Tanggal Mulai Lembur</label>
											<div class="input-group">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
												<input class="form-control fc-datepicker" value="{{date('d/m/Y')}}" placeholder="MM/DD/YYYY" type="text" name="tgl_mulai" id="tgl_mulai">
											</div>
											@error('tgl_mulai')
											<span style="color: red; font-size: 8;"> Tanggal Mulai haru diisi </span>
											@enderror	
										</div>
                                        <div class="col-xl-1 mb-12 ">
											<label for="s.d" class="form-label">s.d</label>
											
										</div>
                                        <div class="col-xl-4 mb-12 ">
											<label for="tgl_selesai" class="form-label">Tanggal Selesai Lembur</label>
											<div class="input-group">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"  type="text" name="tgl_selesai" id="tgl_selesai">
											</div>
											
                                            <span><b style="color: yellow;">*Hanya diisi jika pengajuan lembur dilakukan lebih dari 1 Hari</b></span>
										</div>
                                       
									</div>
                                    <p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Kirim Pengajuan</button>
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
     <!-- MODAL EFFECTS -->
     <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Petunjuk Teknis Aplikasi SMILE</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>
                        Bagi PNS BBPOM Makassar yang belum melengkapi data pegawai harap mengisi data lengkap pegawai pada Kolom <b style="color: yellow;">Edit Data Pegawai</b> dan <b style="color: yellow;">No. Telpon</b> untuk PNS dan PPNPN untuk akses Notifikasi lembur
                        sebelum mengajukan lembur sebagai syarat pengajuan lembur melalui link <a class="btn btn-success" href="/user/{{Auth::user()-> username}}/editprof">Profile</a> 
                    </p>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
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
    var date = $('#tgl_selesai').datepicker({ dateFormat: 'dd/mm/yy' }).val();
    var date = $('#tgl_mulai').datepicker({ dateFormat: 'dd/mm/yy' }).val();
    $(window).on('load', function() {
        $('#modaldemo8').modal('show');
    });
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
					nip: {
						required: true
					},
                    pangkat : {
						required: true
					},
                    jabatan: {
						required: true
					},
                    tugas: {
						required: true,
					}	

				},
				messages: {
					nama: {
						required: "Nama harus diisi",
						minlength: "Harus berisi minimal 2 karakter"
					},
					nip: {
						required: "NIP harus diisi"
					},
                    pangkat : {
						required: "Pangkat harus diisi"
					},
                    jabatan: {
						required: "Jabatan Harus Diisi"
					},
                    tugas: {
						required: "Tugas Lembur harus diisi"
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
    <!-- CkEditorJs -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
        CKEDITOR.replace('desc', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Choose Some Tags"
            });
        });
    </script>    