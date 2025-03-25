<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Tindak Lanjut Perlengkapan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIYAPP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Perlengkapan</li>
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
                    <div class="table-responsive">
                        <h3 class="text-center">Spesifikasi Barang/Perlengkapan</h3>
                                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Nama Barang</td>
                                                        <td>{{$siyapp->nama_barang}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Merek</td>
                                                        <td>{{$siyapp->merek}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Type</td>
                                                        <td>{{$siyapp->type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>No. Inven. (NUP)</td>
                                                        <td>{{$siyapp->nup}}</td>
                                                    </tr>
													<tr>
                                                        <td>5</td>
                                                        <td>Jenis Kerusakan</td>
                                                        <td>{{$siyapp->jenis}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>	
                                        <p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Tahap Pemeliharaan</h3>
							</div>
							<div class="card-body">
                                
								<form id="signupForm" method="post" class="form-horizontal" action="/laporan/{{$siyapp->id}}" >
									@csrf
									@method('put')
									
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="tindak_awal" class="form-label">Tindakan Awal</label>
											<input type="text" value="{{$siyapp->tindak_awal}}"  class="form-control  @error('tindak_awal') is-invalid @enderror" id="tindak_awal" name="tindak_awal" >
											@error('tindak_awal')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="tindak_lanjut" class="form-label">Tindak Lanjutan</label>
											<input type="text" value="{{$siyapp->tindak_lanjut}}"  class="form-control  @error('tindak_lanjut') is-invalid @enderror" id="tindak_lanjut" name="tindak_lanjut" >
											@error('tindak_lanjut')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="uji" class="form-label">Uji Fungsi</label>
											<input type="type" value="{{$siyapp->uji}}"  class="form-control  @error('uji') is-invalid @enderror" id="uji" name="uji" >
											@error('uji')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="nup" class="form-label">Tanggal Selesai</label>
											<div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                                @if ($siyapp->tgl_selesai != null)
                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{$siyapp->tgl_selesai}}" type="text" name="tgl_selesai" id="tgl_selesai">
                                                @else
                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="00/00/0000" type="text" name="tgl_selesai" id="tgl_selesai">
                                                @endif
                                            </div>
											@error('tgl_selesai')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="ket" class="form-label">Keterangan</label>
											<input type="text" value="{{$siyapp->ket}}"  class="form-control  @error('ket') is-invalid @enderror" id="ket" name="ket" >
											@error('ket')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
                                   <p>
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
					tindak_awal: {
						required: true
					},
					tindak_lanjut: {
						required: true
					},
                    uji : {
						required: true
					},
                    tgl_selesai: {
						required: true
					},
					ket: {
						required: true
					}
				},
				messages: {
                    tindak_awal: {
						required: "Kolom Tindakan Awal tidak boleh dikosongkan"
					},
					tindak_lanjut: {
						required: "Kolom Tindak Lanjut tidak boleh dikosongkan"
					},
                    uji : {
						required: "Kolom Uji Fungsi tidak boleh dikosongkan"
					},
                    tgl_selesai: {
						required: "Kolom Tanggal Selesai tidak boleh dikosongkan"
					},
					ket: {
						required: "Kolom Keterangan tidak boleh dikosongkan"
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