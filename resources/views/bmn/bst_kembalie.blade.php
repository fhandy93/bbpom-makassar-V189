<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">BAST Pengembalian</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BAST Pengembalian</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Data</li>
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
					<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-10 col-md-10">
					
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir BAST Pengembalian</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/bmn/bast-pengembalian-update/{{$bmn->id}}" >
									@csrf
									@method('put')

									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="user_id" class="form-label">Nama Pegawai</label>
											<input type="text" class="form-control " value="{{$bmn->user->name}}"  readonly>
											@error('user_id')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>	
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="no_surat" class="form-label">Nomor Surat</label>
											<input type="text" class="form-control  @error('no_surat') is-invalid @enderror" name="no_surat" id="no_surat" value="{{$bmn->no_surat}}" readonly>
											@error('no_surat')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>	
									<div class="form-row">
										<div class="form-group col-xl-8 mb-12 ">
											<label class="form-label">Kondisi Barang</label>
											<select name="kondisi" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih Kondisi ...</option>
												<option value="Baik" {{ $bmn->kondisi == 'Baik' ? 'selected' : '' }} >Baik</option>
												<option value="Rusak Ringan" {{ $bmn->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
												<option value="Rusak Berat" {{ $bmn->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
											</select>
											@error('kondisi')
												<span class="invalid-feedback"> {{ $message }} </span>
											@enderror
										</div>
									</div>
									<div class="card">
										<div class="card-header" >
											<h3 class="card-title">Detail Barang</h3>
										</div>
										<div class="card-body">
										@foreach($data as $index => $data)
											<input type="text"  value="{{$data->id}}" name="id_barang[{{$index+1}}]" hidden>
											<div class="form-row">
												<div class="col-xl-6 mb-12 ">
													<label for="nama_barang" class="form-label">Nama Barang {{$index+1}}</label>
													<input type="text" class="form-control  @error('nama_barang') is-invalid @enderror" value="{{$data->nm_barang}}" name="nama_barang[{{$index+1}}]" >
													@error('nama_barang')
													<span class="invalid-feedback"> {{ $message }} </span>
													@enderror	
												</div>
											</div>
											<div class="form-row">
												<div class="col-xl-6 mb-12 ">
													<label for="type" class="form-label">Tipe Barang {{$index+1}}</label>
													<input type="text" class="form-control  @error('type') is-invalid @enderror" value="{{$data->type}}" name="type[{{$index+1}}]" >
													@error('type')
													<span class="invalid-feedback"> {{ $message }} </span>
													@enderror	
												</div>
											</div>
											<div class="form-row">
												<div class="col-xl-6 mb-12 ">
													<label for="nup" class="form-label">Kode Barang/NUP {{$index+1}}</label>
													<input type="text" class="form-control  @error('nup') is-invalid @enderror" value="{{$data->kode}}" name="nup[{{$index+1}}]" >
													@error('nup')
													<span class="invalid-feedback"> {{ $message }} </span>
													@enderror	
												</div>
											</div>
											<div class="form-row">
												<div class="col-xl-4 mb-12 ">
													<label for="tahun" class="form-label">Tahun Barang {{$index+1}}</label>
													<input type="text" class="form-control  @error('tahun') is-invalid @enderror" value="{{$data->tahun}}" name="tahun[{{$index+1}}]" >
													@error('tahun')
													<span class="invalid-feedback"> {{ $message }} </span>
													@enderror	
												</div>
											</div>
											<div class="form-row">
												<div class="col-xl-2 mb-12 ">
													<label for="jumlah" class="form-label">Jumlah Barang {{$index+1}}</label>
													<input type="text" class="form-control  @error('jumlah') is-invalid @enderror" value="{{$data->jumlah}}" name="jumlah[{{$index+1}}]" >
													@error('jumlah')
													<span class="invalid-feedback"> {{ $message }} </span>
													@enderror	
												</div>
											</div>
										@endforeach
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-8 mb-12 ">
											<label class="form-label">Petugas BMN</label>
											<select name="petugas" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih Petugas BMN ...</option>
												@foreach($pet as $index => $pet)
													<option value="{{$pet->id}}" {{ $bmn->user_bmn == $pet->id ? 'selected' : '' }}>{{$pet->name}}</option>
												@endforeach
											</select>
											@error('petugas')
												<span class="invalid-feedback"> {{ $message }} </span>
											@enderror
										</div>
									</div>
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Update Data</button>
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

	<!-- DATEPICKER JS -->
	<script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendor/js/select2.js')}}"></script>

	 <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

	<!-- Swet Alert -->
	<script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    </x-HomeLayout>
	
	<script type="text/javascript">
    	var date = $('#tgl_berangkat').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_kembali').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					user_data: {
						required: true
					},
					level_biaya: {
						required: true
					},
                    maksud : {
						required: true
					},
                    transport: {
						required: true
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
					asal: {
						required: true
					},
                    tujuan: {
						required: true,
					},
					instansi: {
						required: true,
					},
                    akun: {
						required: true,
					},
					ket: {
						required: true,
					},
					ppk: {
						required: true,
					},
					mengetahui: {
						required: true,
					}

				},
				messages: {
					user_data: {
						required: "Nama Pegawai harus diisi"
					},
					level_biaya: {
						required: "Tingkat Biaya Perjalanan harus dipilih"
					},
                    maksud : {
						required: "Maksud Perjalanan Dinas harus diisi"
					},
                    transport: {
						required: "Moda Transport harus dipilih"
					},
					nip: {
						required: "NIP harus terisi"
					},
                    pangkat : {
						required: "Pangkat harus terisi"
					},
                    jabatan: {
						required: "Jabatan harus terisi"
					},
					asal: {
						required: "Tempat Berangkat harus diisi",
					},
                    tujuan: {
						required: "Tempat Tujuan harus diisi"
					},
					instansi: {
						required: "Instansi harus diisi"
					},
                    akun: {
						required: "Akun harus diisi"
					},
                    ket: {
						required: "Keterangan harus diisi"
					},
                    ppk: {
						required: "Nama PPK harus dipilih"
					},
                    mengetahui: {
						required: "Atasan Mengetahui harus diisi"
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
		
    function showDetail(str1) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
	var obj = JSON.parse(this.responseText);
	var objLength = Object.keys(obj).length;
	document.getElementById('nip').value=obj[0].nip;
	document.getElementById('pangkat').value=obj[0].pangkat;
	document.getElementById('jabatan').value=obj[0].jabatan;

	}
	xhttp.open("GET", "show-nip/"+str1);
	xhttp.send();
	
	}
	$('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Anda yakin ingin mengirim data ini ?`,
            text: "Setelah data terkirim, data tidak dapat diedit kembali.",
            icon: "info",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            form.submit();
            }
        });
    });
	
	</script>          