<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Input Barang</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Barang</li>
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
                    <a href="/bmn/admin/daftar-barang"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left me-2"></i>Back</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Input Barang</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/bmn/admin/input-barang-store" >
									@csrf
									@method('post')
									
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="satker" class="form-label">Kode Satker</label>
											<input type="text" value="063011900432923000KD"  class="form-control  @error('satker') is-invalid @enderror" id="satker" name="satker" >
											@error('satker')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>

									<div class="form-row">
										<div class="col-xl-5 mb-12 ">
											<label for="kode" class="form-label">Kode Barang</label>
											<input type="text" value=""  class="form-control  @error('kode') is-invalid @enderror" id="kode" name="kode" >
											@error('kode')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>

									<div class="form-row">
										<div class="col-xl-4 mb-12 ">
											<label for="nup" class="form-label">No. Inven.(NUP)</label>
											<input type="number" value=""  class="form-control  @error('nup') is-invalid @enderror" id="nup" name="nup" >
											@error('nup')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>

									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="id" class="form-label">Nama Barang</label>
											<input type="text" value=""  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama">
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="merek" class="form-label">Merek</label>
											<input type="text" value=""  class="form-control  @error('merek') is-invalid @enderror" id="merek" name="merek" >
											@error('merek')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                   
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="kondisi" class="form-label">Kondisi Barang</label>
											<select id="kondisi" name="kondisi" class="form-control form-select select2" style="width: 100%;">
											<option value="aa" selected disabled>Pilih Kondisi ...&nbsp;      </option>
											<option value="1">Baik</option>
											<option value="2">Rusak Ringan</option>
											<option value="3">Rusak Berat</option>
										</select>
										@error('kondisi')
										<span style="color:#e23e3d;"> {{ $message }} </span>
										@enderror	
										</div>
									</div>

									<div class="form-row">
										<div class="col-xl-5 mb-12 ">
											<label for="tgl_terima" class="form-label">Tanggal Perolehan</label>
											<div class="input-group">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" type="text" name="tgl" id="tgl">
											</div>
											@error('tgl')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>

									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="user_data" class="form-label">Lokasi Barang</label>
											<select name="lokasi" class="form-control form-select select2" style="width: 100%;" >
												<option value="aa" selected disabled>Pilih Lokasi ...</option>
												@foreach($ruang as $item)
												<option value="{{$item->id}}">{{$item->nm_ruangan}}</option>
												@endforeach
											</select>	
											@error('lokasi')
											<span style="color:#e23e3d;"> {{ $message }} </span>
											@enderror	
										</div>
									</div>

									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="nilai" class="form-label">Nilai Perolehan</label>
											<input type="text" value=""  class="form-control  @error('nilai') is-invalid @enderror" id="nilai" name="nilai" placeholder="Contoh : 1000000 (Tanpa Tanda Baca Titik)">
											@error('nilai')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>

									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Tambah Barang</button>
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
    var date = $('#tgl').datepicker({ dateFormat: 'dd/mm/yy' }).val();
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
                    satker: {
						required: true
					},
                    kode:{
                        required:true
                    },
                    nup:{
                        required:true,
						number : true
                    },
                    nama:{
                        required:true
                    },
                    merek:{
                        required:true
                    },
                    tgl:{
                        required:true
                    },
                    nilai:{
                        required:true,
						number:true
                    }
				},
				messages: {
                    satker: {
						required: "Kolom Kode Satker harus diisi"
					},			
                    kode :{
                        required:"Kolom Kode Barang harus diisi"
                    },			
                    nup :{
                        required:"Kolom NUP harus diisi",
						number:"Harus Berisi Angka 0-9"
                    },			
                    nama :{
                        required:"Kolom Nama Barang harus diisi"
                    },			
                    merek :{
                        required:"Kolom Merek Barang harus diisi"
                    },			
                    tgl :{
                        required:"Kolom Tanggal Perolehan harus diisi"
                    },			
                    nilai :{
                        required:"Kolom Nilai Perolehan harus diisi",
						number:"Harus Berisi Angka 0-9"
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