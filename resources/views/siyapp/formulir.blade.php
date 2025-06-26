<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Formulir Pemeliharaan Peralatan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIYAPP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Formulir Pemeliharaan</li>
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
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
					
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir Pemeliharaan Peralatan</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/siyappstore" enctype="multipart/form-data">
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
										<div class="col-xl-12 mb-12 ">
											<label for="kode" class="form-label">Kode-NUP Barang </label>
											<select name="nup" class="form-control form-select select2" id="mySelect" style="width: 100%;">
												<option></option> <!-- Diperlukan agar placeholder Select2 bisa muncul -->
												<option value="-">-</option>
												@foreach($barang as $item)
													<option value="{{$item->id}}" {{ old('barang') == $item->id ? 'selected' : '' }}>
														{{$item->kode}} - {{$item->nup}}
													</option>
												@endforeach 
											</select>	
											</div>
									</div>
									
									<input type="text" id='kode' name="kode" value="" hidden>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nama_barang" class="form-label">Nama Barang</label>
											<input type="text" value="{{old('nama_barang')}}"  class="form-control  @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" >
											@error('nama_barang')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="merek" class="form-label">Merek</label>
											<input type="text" value="{{old('merek')}}"  class="form-control  @error('merek') is-invalid @enderror" id="merek" name="merek" >
											@error('merek')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
								
                                    <div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="tahun" class="form-label">Tahun</label>
											<select id="tahun" name="tahun" class="form-control form-select select2">
											<option value="aa" selected disabled>Pilih Tahun ...</option>
											<option value="-">-</option>
											@for($a = 0;$a<=30;$a++)
											<option value="{{date('Y')-$a}}">{{date("Y")-$a}}</option>
											@endfor
										</select>
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="nup" class="form-label">Bidang/Seksi</label>
											<select name="bidang" class="form-control form-select select2" >
												<option value="aa" selected disabled>Pilih Bidang ...</option>
												<option value="Penindakan">Penindakan</option>
												<option value="Sertifikasi">Sertifikasi</option>
												<option value="Inspeksi">Inspeksi</option>
												<option value="Infokom">Infokom</option>
												<option value="Pengujian (Mikrobiologi)">Pengujian (Mikrobiologi)</option>
												<option value="Pengujian (Teranakoko)">Pengujian (Teranakoko)</option>
												<option value="Pengujian (Pangan)">Pengujian (Pangan)</option>
												<option value="TU (Kepegawaian)">TU (Kepegawaian)</option>
												<option value="TU (Perlengkapan)">TU (Perlengkapan)</option>
												<option value="TU (Keuangan)">TU (Keuangan)</option>
												<option value="TU (IT)">TU (IT)</option>
											</select>	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Jenis Pemeliharaan</label>
											<select name="pemeliharaan" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih Jenis Pemeliharaan ...</option>
												<option value="Operasional Laboratorium">Operasional Laboratorium</option>
												<option value="Inventaris Kantor">Inventaris Kantor</option>

											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<div class="form-group">
												<div class="form-label">Jenis Barang</div>
												<div class="custom-controls-stacked">
													<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="barang" value="1" >
															<span class="custom-control-label">Barang IT (Laptop,Monitor,LCD,Printer,dll..)</span>
													</label>
													<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="barang" value="2" checked>
															<span class="custom-control-label">Barang Non IT</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Sifat Laporan </label>
											<select name="sifat" class="form-control form-select select2" data-bs-placeholder="Select Country">
												<option value="Segera">Segera</option>
												<option value="Sedang">Sedang</option>
												<option value="Biasa">Biasa</option>
												</select>
										</div>
									</div>
									<div class="form-row" id="opt" style="display: inline;">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Input Gambar</label>
											<select name="" id="tahap" onchange="tampil()" class="form-control form-select select2" data-bs-placeholder="Select Country">
												<option value="aa" selected disabled>Pilih Sumber ...</option>		
												<option value="galeri" >Galeri</option>
												<option value="kamera">Kamera</option>
											</select>
											<span class="text-warning">* Input gambar hanya jika diperlukan</span>
										</div>
									</div>

									<div class="form-row" id="galeri"  style="display: none;">
                                        <div class="col-xl-8 mb-12 ">
                                            <div class="form-group">
                                                <label class="form-label mt-0">Pilih Gambar</label>
                                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
												@error('image')
												<span class="invalid-feedback"> {{ $message }} </span>
												@enderror<p>	
                                                <span>* File harus berextensi jpg</span>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-row" id="kamera"  style="display: none;">
										<div class="col-xl-4 mb-12 ">
										<label class="form-label mt-0">Ambil Gambar</label>
											<button class="btn btn-primary show_confirm">Ambil Gambar</button>
										</div>
                                    </div>
									<input type="hidden" name="image" class="image-tag">
                                    <div id="results" ></div>
                                    <div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="jenis" class="form-label">Jenis Kerusakan</label>
											<textarea  class="form-control  @error('jenis') is-invalid @enderror" id="jenis" name="jenis"  rows="4">{{old('jenis')}}</textarea>
											@error('jenis')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div><p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Kirim Laporan</button>
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
	<!-- MODAL EFFECTS -->
	<div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Ambil Gambar Kamera</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
					<div class="form-row">
						<div class="form-group col-xl-12 mb-12 ">
							<div id="my_camera" style=" width: 100%;margin-left:-50px;display: block;"></div>
							
						</div>
						<!--<input type=button class="btn btn-primary" value="Ambil Gambar" onClick="take_snapshot()">-->
						
					</div>
                <button class="btn btn-success" onClick="take_snapshot()" data-bs-dismiss="modal">Take</button>
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

	<!-- Jquery Webcam -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    </x-HomeLayout>
	
<script type="text/javascript">
    
		
		setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					nama_barang: {
						required: true,
						minlength: 2
					},
					merek: {
						required: true
					},
                    type : {
						required: true
					},
                    nup: {
						required: true
					},
					tahun: {
						required: true
					},
                    bidang: {
						required: true,
					},
					pemeliharaan: {
						required: true,
					},
                    jenis: {
						required: true,
					}	

				},
				messages: {
					nama_barang: {
						required: "Nama barang harus diisi",
						minlength: "Harus berisi minimal 2 karakter"
					},
					merek: {
						required: "Merek harus diisi"
					},
                    type : {
						required: "Type harus diisi"
					},
                    nup: {
						required: "Nomor Inventaris(NUP) Harus Diisi"
					},
					tahun: {
						required: "Tahun harus diisi",
					},
                    bidang: {
						required: "Nama Bidang harus diisi"
					},
					pemeliharaan: {
						required: "Jenis Pemeliharaan harus diisi"
					},
                    jenis: {
						required: "Jenis harus diisi"
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
		$('.show_confirm').click(function(event) {
		  //  document.getElementById('my_camera').style.display = 'inline';
		$('#modaldemo8').modal('show');
        });
		Webcam.set({
			width: 400,
			height: 280,
			image_format: 'jpeg',
			jpeg_quality: 90,
			dest_width: 380,
			dest_height: 280,
			constraints: {
			facingMode: 'environment'
			}
    	});
    	Webcam.attach( '#my_camera' );
    
    	function take_snapshot() {
        Webcam.snap( function(data_uri) {
				$(".image-tag").val(data_uri);
				document.getElementById('results').innerHTML = '<img src="'+data_uri+'" style="border:0; top:0px; left:0px; bottom:0px; right:0px; width:380px; height:350px;"/>';
				// document.getElementById('my_camera').style.display = 'none';
        } );
    }
	function tampil(){
            var x = document.getElementById("tahap").value;
			console.log(x)
            if (x=='galeri'){
                console.log('Tampil')
                document.getElementById("galeri").style.display = "inline";
                document.getElementById("kamera").style.display = "none";
				document.getElementById("opt").style.display = "none";
            }else{
                console.log('Sembunyi')
                document.getElementById("galeri").style.display = "none";
                document.getElementById("kamera").style.display = "inline";
				document.getElementById("opt").style.display = "none";
            }

 
        }
		function showBarang1(str1) {
	// Jika str1 adalah '-', kosongkan semua input
	if (str1 === '-') {
		document.getElementById('nama_barang').value = '';
		document.getElementById('merek').value = '';
		document.getElementById('kode').value = '';
		return; // Hentikan eksekusi fungsi
	}

	const xhttp = new XMLHttpRequest();
	xhttp.onload = function () {
		var obj = JSON.parse(this.responseText);

		if (Array.isArray(obj) && obj.length > 0) {
			document.getElementById('nama_barang').value = obj[0].nm_barang;
			document.getElementById('merek').value = obj[0].merek;
			document.getElementById('kode').value = obj[0].kode + '-' + obj[0].nup;
		} else {
			document.getElementById('nama_barang').value = '';
			document.getElementById('merek').value = '';
			document.getElementById('kode').value = '';
		}
	};

	xhttp.onerror = function () {
		alert("Terjadi kesalahan saat mengambil data.");
		document.getElementById('nama_barang').value = '';
		document.getElementById('merek').value = '';
		document.getElementById('kode').value = '';
	};

	xhttp.open("GET", "show-kode-barang/" + str1);
	xhttp.send();
	}
	$(document).ready(function() {
		$('#mySelect').select2({
			placeholder: "Pilih Kode-NUP Barang",
			allowClear: true,
			language: {
				noResults: function() {
					return "Tidak ditemukan hasil";
				}
			}
		});
		$('#mySelect').on('change', function () {
			let selectedValue = $(this).val();
			if (selectedValue !== '-') {
				$('#merek').prop('readonly', true);
				$('#nama_barang').prop('readonly', true);
			} else {
				$('#merek').prop('readonly', false);
				$('#nama_barang').prop('readonly', false);
			}
		});
		// Tambahkan placeholder khusus untuk kolom pencarian
		$('#mySelect').on('select2:open', function () {
			setTimeout(function() {
				$('.select2-search__field').attr('placeholder', 'Tuliskan kata pencarian di sini');
			}, 10);
		});

		$('#mySelect').on('change', function() {
			var selectedValue = $(this).val();
			showBarang1(selectedValue, '1');
		});
	});

	</script>           