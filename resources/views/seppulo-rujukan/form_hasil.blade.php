<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Formulir Hasil Rujukan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Formulir Hasil Rujukan</li>
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
					<div class="col-lg-12 col-md-12">
						<a href="/v3-rujukan-view"><button type="button" class="btn btn-primary"><i class="fe fe-eye me-2"></i>View Rujukan</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir Hasil Rujukan </h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/v3-rujuk-hasil/{{ $rujuk->id }}" enctype="multipart/form-data">
									@csrf
									@method('put')			
									<div class="form-group">
                                        <textarea class="editor form-control @error('desc') is-invalid @enderror" name="desc" id="desc">{{ $rujuk->desc}}</textarea>
                                        @error('desc')
                                        <div class="invalid-feedback">
                                            {{ $message }}    
                                        </div>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="form-group">
                                            
                                            <label class="form-label mt-0">File 1</label>
                                            <input class="form-control @error('gambar1') is-invalid @enderror" type="file" name="gambar1" id="gambar1">
                                            @if(isset($rujuk->gambar1))
                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v3-rujuk-download{{ $rujuk->gambar1  }}">{{ $rujuk->gambar1  }}</a></li>
                                            @endif
                                            @error('gambar1')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                            <span>* Ukuran maksimal file 500kb dan berextensi pdf,jpg,img,png,gif</span>
                                    </div>
                                    <div class="form-group">
                                           
                                            <label class="form-label mt-0">File 2</label>
                                            <input class="form-control @error('gambar2') is-invalid @enderror" type="file" name="gambar2" id="gambar2">
                                            @if(isset($rujuk->gambar2))
                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v3-rujuk-download{{ $rujuk->gambar2  }}">{{ $rujuk->gambar2  }}</a></li>
                                            @endif
                                            @error('gambar2')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                            <span>* Ukuran maksimal file 500kb dan berextensi pdf,jpg,img,png,gif</span>
                                    </div>
                                    <div class="form-group">
                                           
                                            <label class="form-label mt-0">File 3</label>
                                            <input class="form-control @error('gambar3') is-invalid @enderror" type="file" name="gambar3" id="gambar3">
                                            @if(isset($rujuk->gambar3))
                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v3-rujuk-download{{ $rujuk->gambar3  }}">{{ $rujuk->gambar3  }}</a></li>
                                            @endif
                                            @error('gambar3')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                            <span>* Ukuran maksimal file 500kb dan berextensi pdf,jpg,img,png,gif</span>
                                    </div>
                                    <div class="form-group">
                                           
                                            <label class="form-label mt-0">File 4</label>
                                            <input class="form-control @error('gambar4') is-invalid @enderror" type="file" name="gambar4" id="gambar4">
                                            @if(isset($rujuk->gambar4))
                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v3-rujuk-download{{ $rujuk->gambar4  }}">{{ $rujuk->gambar4  }}</a></li>
                                            @endif
                                            @error('gambar4')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                            <span>* Ukuran maksimal file 500kb dan berextensi pdf,jpg,img,png,gif</span>
                                    </div>
                                    <div class="form-group">
                                           
                                            <label class="form-label mt-0">File 5</label>
                                            <input class="form-control @error('gambar5') is-invalid @enderror" type="file" name="gambar5" id="gambar5">
                                            @if(isset($rujuk->gambar5))
                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v3-rujuk-download{{ $rujuk->gambar5  }}">{{ $rujuk->gambar5  }}</a></li>
                                            @endif
                                            @error('gambar5')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                            <span>* Ukuran maksimal file 500kb dan berextensi pdf,jpg,img,png,gif</span>
                                    </div>
                                    <div class="form-group">
                                            
                                            <label class="form-label mt-0">File 6</label>
                                            <input class="form-control @error('gambar6') is-invalid @enderror" type="file" name="gambar6" id="gambar6">
                                            @if(isset($rujuk->gambar6))
                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v3-rujuk-download{{ $rujuk->gambar6  }}">{{ $rujuk->gambar6  }}</a></li>
                                            @endif
                                            @error('gambar6')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                            <span>* Ukuran maksimal file 500kb dan berextensi pdf,jpg,img,png,gif</span>
                                    </div>
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:160px;">Save Data</button>
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
 
     <!-- CKeditor 5 js-->
     <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    </x-HomeLayout>
	
    <script type="text/javascript">
    ClassicEditor
    .create( document.querySelector( '.editor' ),{})
    setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
    $(function() {
    $('#signupForm').validate({
        ignore: [],
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
            
        },

        rules: {
            tgl_terima: {
                required: true
            },
            nama: {
                required: true,
                minlength: 2
            },
            ttl: {
                required: true
            },
            umur: {
                required: true
            },
            kelamin: {
                required: true
            },
            agama: {
                required: true
            },
            pekerjaan: {
                required: true
            },
            alamat: {
                required: true
            },
            hp: {
                required: true
            },
            fax: {
                required: true
            },
            email: {
                required: true
            },
            pengaduan: {
                required: true
            },
            produk: {
                required: true
            },
            regis: {
                required: true
            },
            batch: {
                required: true
            },
            pabrik: {
                required: true
            },
            alm_pab: {
                required: true
            },
            nama_kor: {
                required: true
            },
            alm_kor: {
                required: true
            },
            desc: {
                required: true
            },
            kadaluarsa: {
                required: true
            },
            tindak: {
                required: true
            },
            tujuan: {
                required: true
            },
            hal: {
                required: true
            },
            ket: {
                required: true
            }
        },messages: {
            tgl_terima: {
                required: "Kolom Tanggal Terima Laporan Harus diisi"
            },
            nama: {
                required: "Kolom Nama harus diisi",
                minlength: "Harus berisi minimal 2 karakter"
            },
            ttl: {
                required: "Kolom Tempat Tanggal Lahir harus diisi"
            },
            umur: {
                required: "Kolom Umur harus diisi"
            },
            kelamin: {
                required: "Tempat Tanggal Lahir harus diisi"
            },
            agama: {
                required: "Kolom Agama harus diisi"
            },
            pekerjaan: {
                required: "Kolom Pekerjaan harus diisi"
            },
            alamat: {
                required: "Kolom Alamat harus diisi"
            },
            hp: {
                required: "Kolom Nomor Hp harus diisi"
            },
            fax: {
                required: "Kolom Fax harus diisi"
            },
            email: {
                required: "Kolom Email harus diisi"
            },
            pengaduan: {
                required: "Kolom Pengaduan harus diisi"
            },
            produk: {
                required: "Kolom Nama Produk harus diisi"
            },
            regis: {
                required: "Kolom Registrasi harus diisi"
            },
            batch: {
                required: "Kolom No. Batch harus diisi"
            },
            pabrik: {
                required: "Kolom Nama Pabrik harus diisi"
            },
            alm_pab: {
                required: "Kolom Alamat Pabrik harus diisi"
            },
            nama_kor: {
                required: "Kolom Nama Korban harus diisi"
            },
            alm_kor: {
                required: "Kolom Alamat Korban harus diisi"
            },
            desc: {
                required: "Uraian Masalah Harus disi"
            },
            kadaluarsa: {
                required: "Kolom Kadaluarsa harus diisi"
            },
            tindak: {
                required: "Kolom Tindak Lanjut harus diisi"
            },
            tujuan: {
                required: "Kolom Tujuan harus diisi"
            },
            hal: {
                required: "Kolom Hal harus diisi"
            },
            ket: {
                required: "Kolom Keterangan harus diisi"
            }  
        }
        
    });
    
});

	</script>
   
