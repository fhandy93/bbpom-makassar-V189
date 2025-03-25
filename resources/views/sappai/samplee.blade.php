<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Input Sample</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Sample</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sample Input</li>
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
						<a href="/sample_sappai"><button type="button" class="btn btn-primary"><i class="fe fe-eye me-2"></i>View Sample</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Tambah Sample</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/sample_update/{{$sample->id}}" enctype="multipart/form-data">
									@csrf
									@method('put')
                                    <div class="form-row">
										<div class="form-group col-xl-8 mb-12 ">
											<label class="form-label">User </label>
											<input type="text" value="{{$sample->user->name}}"  class="form-control"   id="user" name="user" readonly>
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="kode" class="form-label">Kode Sample</label>
											<input type="text" value="{{$sample->kode}}"  class="form-control  @error('kode') is-invalid @enderror" id="kode" name="kode" >
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="tgl_masuk" class="form-label">Tanggal Masuk Sample (Bulan-Tanggal-Tahun)</label>
											<div class="input-group">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{date('m/d/Y',strtotime($sample->tanggal))}}" type="text" name="tgl_masuk" id="tgl_masuk">
											</div>
											@error('tgl_masuk')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="nama" class="form-label">Nama Sample</label>
											<input type="text" value="{{$sample->nama_sample}}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" >
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="komoditi" class="form-label">Komoditi</label>
											<input type="text" value="{{$sample->komoditi}}"  class="form-control  @error('komoditi') is-invalid @enderror" id="komoditi" name="komoditi" >
											@error('komoditi')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="asal" class="form-label">Asal Sample</label>
											<input type="text" value="{{$sample->asal}}"  class="form-control  @error('asal') is-invalid @enderror" id="asal" name="asal" >
											@error('asal')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="billing" class="form-label">Kode Billing</label>
											<input type="text" value="{{$sample->billing}}"  class="form-control  @error('billing') is-invalid @enderror" id="billing" name="billing" >
											@error('billing')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="tahap" class="form-label">Tahap</label>
											<select name="tahap"  id="tahap" onchange="tampil()" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                            @if ($sample -> tahap == 1)
                                                <option value=1 selected>Sampel Dalam Proses Administrasi</option>
                                                <option value=2>Sampel Dalam Proses Pengujian</option>
                                                <option value=3>Sampel Selesai Diuji</option>
                                                <option value=4>Pengambilan Sertifikat Hasil Uji</option>
                                            @elseif ($sample -> tahap == 2)
                                                <option value=1>Sampel Dalam Proses Administrasi</option>
                                                <option value=2 selected>Sampel Dalam Proses Pengujian</option>
                                                <option value=3>Sampel Selesai Diuji</option>
                                                <option value=4>Pengambilan Sertifikat Hasil Uji</option>
                                            @elseif ($sample -> tahap == 3)
                                                <option value=1>Sampel Dalam Proses Administrasi</option>
                                                <option value=2>Sampel Dalam Proses Pengujian</option>
                                                <option value=3 selected>Sampel Selesai Diuji</option>
                                                <option value=4>Pengambilan Sertifikat Hasil Uji</option>
                                            @elseif ($sample -> tahap == 4)
                                                <option value=1>Sampel Dalam Proses Administrasi</option>
                                                <option value=2>Sampel Dalam Proses Pengujian</option>
                                                <option value=3>Sampel Selesai Diuji</option>
                                                <option value=4 selected>Pengambilan Sertifikat Hasil Uji</option>
                                            @endif										
											</select>
										</div>
									</div>
                                    
                                    <div class="form-row" id="sertifikat"  @if ($sample -> tahap == 4) style="display: inline; @else style="display: none; @endif">
                                        <div class="col-xl-8 mb-12 ">
                                            <div class="form-group">
                                                <label class="form-label mt-0">Sertifikat</label>
                                                <input class="form-control @error('filepdf') is-invalid @enderror" type="file" name="filepdf" id="filepdf">
                                                	
                                                <span>* Ukuran maksimal file 500kb dan berextensi pdf</span>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($sample -> berkas && $sample -> tahap == 4)
                                    <p><embed src="{{ asset($sample->berkas) }}" #toolbar=0" width="600" height="500" alt="pdf" id="berkas" @if ($sample -> tahap == 4) style="display: inline; @else style="display: none; @endif" />
                                   @endif
                                    @error('filepdf')
                                        <span style="color: red;"> {{ $message }} </span>
                                    @enderror
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Update Sample</button>
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
                    kode: {
						required: true,
						minlength: 5
					},
					nama: {
						required: true,
						minlength: 2
					},
					tgl_masuk: {
						required: true
					},
                    komoditi: {
						required: true
					},
                    asal: {
						required: true
					},
                    billing: {
						required: true
					}
					

				},
				messages: {
					nama: {
						required: "Nama Sample harus diisi",
						minlength: "Harus berisi minimal 2 karakter"
					},
					tgl_masuk: {
						required: "Tanggal Masuk harus diisi"
					},
                    komoditi : {
						required: "Komoditi harus diisi"
					},
                    kode : {
						required: "Kode Sample harus diisi",
                        minlength: "Harus berisi minimal 5 karakter"
					},
                    asal : {
						required: "Asal Sample harus diisi"
					},
                    billing : {
						required: "Kode Billing harus diisi"
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
        function tampil(){
            var x = document.getElementById("tahap").value;
            if (x==4){
                console.log('Tampil')
                document.getElementById("sertifikat").style.display = "inline";
                document.getElementById("berkas").style.display = "inline";
                // document.getElementById("label1").style.display = "inline";
            }else{
                console.log('Sembunyi')
                document.getElementById("sertifikat").style.display = "none";
                document.getElementById("berkas").style.display = "none";
                // document.getElementById("label1").style.display = "none";
            }

 
        }
	</script>