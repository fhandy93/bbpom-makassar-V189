<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Form Input Nomor Surat SPML</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SMILE</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Input Nomor</li>
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
					<a href="/detail-absen/{{$data->lembur_id}}/{{$data->user_id}}" class="btn btn-primary my-3"><i class="fa fa-arrow-left me-2"></i>Kembali</a>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Input Nomor Surat SPML</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/smile-absen-edit/{{$data->id}}/{{$data->lembur_id}}/{{$data->user_id}}" enctype="multipart/form-data">
									@csrf
									@method('put')
                                    
                                    <div class="form-row">
                                        <div class="col-xl-4 mb-12 ">
											<label for="tgl_masuk" class="form-label">Tanggal Lembur</label>
											<div class="input-group">
												<div class="input-group-text">
													<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
												</div>
												<input class="form-control fc-datepicker" value="{{date('d/m/Y', strtotime($data->tgl_lembur)) }}" placeholder="MM/DD/YYYY" type="text" name="tgl_lembur" id="tgl_lembur">
                                                <!-- date('d/m/Y') -->
                                            </div>
											@error('tgl_lembur')
											<span style="color: red; font-size: 8;"> Tanggal lembur harus diisi </span>
											@enderror	
										</div>
                                    </div>

                                    <div class="form-row">
										<div class="col-md-12 ">
											<label for="no_surat" class="form-label">Jam mulai</label>
                                                <div class="row col-md-8">
                                                <div class="col-md-2">
                                                    <select name="jam1" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                        
                                                        <option value="{{substr($data->jam_mulai,0,2)}}">{{substr($data->jam_mulai,0,2)}}</option>
                                                        <option value="00">00</option>
                                                        @for($i = 1; $i <= 9; $i++)
                                                            <option value="0{{$i}}">0{{$i}}</option>
                                                        @endfor
                                                        @for($i = 10; $i <= 24; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    :
                                                </div>
											    <div class="col-md-2">
                                                    <select name="menit1" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                        <option value="{{substr($data->jam_mulai,3,2)}}">{{substr($data->jam_mulai,3,2)}}</option>
                                                        <option value="00">00</option>
                                                        @for($i = 1; $i <= 9; $i++)
                                                            <option value="0{{$i}}">0{{$i}}</option>
                                                        @endfor
                                                        @for($i = 10; $i <= 59; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    :
                                                </div>
											    <div class="col-md-2">
                                                    <select name="detik1" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                        <option value="{{substr($data->jam_mulai,6,2)}}">{{substr($data->jam_mulai,6,2)}}</option>
                                                        <option value="00">00</option>
                                                        @for($i = 1; $i <= 9; $i++)
                                                            <option value="0{{$i}}">0{{$i}}</option>
                                                        @endfor
                                                        @for($i = 10; $i <= 59; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                </div>

											@error('no_surat')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-md-12 ">
											<label for="no_surat" class="form-label">Jam Selesai</label>
                                                <div class="row col-md-8">
                                                <div class="col-md-2">
                                                    <select name="jam2" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                        <option value="{{substr($data->jam_selesai,0,2)}}">{{substr($data->jam_selesai,0,2)}}</option>
                                                        <option value="00">00</option>
                                                        @for($i = 1; $i <= 9; $i++)
                                                            <option value="0{{$i}}">0{{$i}}</option>
                                                        @endfor
                                                        @for($i = 10; $i <= 24; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    :
                                                </div>
											    <div class="col-md-2">
                                                    <select name="menit2" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                        <option value="{{substr($data->jam_selesai,3,2)}}">{{substr($data->jam_selesai,3,2)}}</option>
                                                        <option value="00">00</option>
                                                        @for($i = 1; $i <= 9; $i++)
                                                            <option value="0{{$i}}">0{{$i}}</option>
                                                        @endfor
                                                        @for($i = 10; $i <= 59; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    :
                                                </div>
											    <div class="col-md-2">
                                                    <select name="detik2" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                        <option value="{{substr($data->jam_selesai,6,2)}}">{{substr($data->jam_selesai,6,2)}}</option>
                                                        <option value="00">00</option>
                                                        @for($i = 1; $i <= 9; $i++)
                                                            <option value="0{{$i}}">0{{$i}}</option>
                                                        @endfor
                                                        @for($i = 10; $i <= 59; $i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                </div>

											@error('no_surat')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    
                                    <p>
									
									<div class="form-row">
                                        <div class="col-lg-12 col-sm-12 mb-4 mb-lg-0">
                                        <label for="file" class="form-label">File Pendukung</label>
                                            <input type="file" class="dropify" data-bs-height="180" id="absen" name="absen" />
                                        </div>
                                        <span><b style="color: yellow;">*Hanya diisi jika ingin mengedit File Pendukung yang lama, Kosongkan jika tidak ada perubahan di File Pendukung</b></span>
                                        @error('absen')
                                            <span style="color: red;"> {{ $message }} </span>
                                        @enderror	   
                                    </div>
								
                                    <p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Kirim</button>
										
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


         <!-- FILE UPLOADES JS -->
    <script src="{{ asset('vendor/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{ asset('vendor/plugins/fileuploads/js/file-upload.js')}}"></script>

    </x-HomeLayout>
	
<script type="text/javascript">
    var date = $('#tgl_lembur').datepicker({ dateFormat: 'dd/mm/yy' }).val();
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					absen: {
						
						extension: "docx|rtf|doc|pdf"
					}
				},
				messages: {
					absen: {
						
						extension: "Hanya menerima file PDF dan Excel"
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