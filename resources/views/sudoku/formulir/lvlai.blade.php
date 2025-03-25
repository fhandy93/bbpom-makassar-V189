<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Input Formulir Dokumen Pendukung</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SUDOKU</a></li>
							<li class="breadcrumb-item active" aria-current="page">Input Formulir Dokumen Pendukung</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">  	
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
						<a href="/dokumen-pendukung"><button type="button" class="btn btn-primary"><i class="fe fe-eye me-2"></i>View Formulir Dokumen Pendukung</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Tambah Formulir Dokumen Pendukung</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" enctype="multipart/form-data" class="form-horizontal" action="/dokumen-pendukung-store" >
									@csrf
									@method('post')
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="induk_kode" class="form-label">Kode Induk (PTL/SOP Mikro/Mutu Laboratorium/Instruksi Kerja)</label>
											<select  name="induk_kode" class="form-control form-select select2" data-bs-placeholder="Select Country">
												@foreach ($ptl as $ptl)
												<option value="{{$ptl -> ptl_kode}}">{{$ptl -> ptl_kode}} (Pedoman Teknis Lab.)</option>
												@endforeach
												@foreach ($mikro as $data)
												<option value="{{$data -> kode_mikro}}">{{$data -> kode_mikro}} (SOP Mikro)</option>
												@endforeach
												@foreach ($mutu as $data)
												<option value="{{$data -> mutu_kode}}">{{$data -> mutu_kode}} (Mutu Lab.)</option>
												@endforeach
												@foreach ($inst as $inst)
												<option value="{{$inst -> instrumen_kode}}">{{$inst -> instrumen_kode}} (Instruksi Kerja)</option>
												@endforeach
											</select>
										</div>
									</div>
									
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Tambah</button>
										
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

	<!-- DATEPICKER JS -->
	<script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>
       
     <!-- FORMELEMENTS JS -->
     <script src="{{ asset('vendor/js/formelementadvnced.js')}}"></script>
     <script src="{{ asset('vendor/js/form-elements.js')}}"></script>
 
     <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
 
	<!-- INTERNAL Bootstrap-Datepicker js-->
	<script src="{{ asset('vendor/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
     
     <!-- TIMEPICKER JS -->
     <script src="{{ asset('vendor/plugins/time-picker/jquery.timepicker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/time-picker/toggles.min.js')}}"></script>

    </x-HomeLayout>
	
<script type="text/javascript">
    var date = $('#tgl_terbit').datepicker({ dateFormat: 'dd/mm/yy' }).val();
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					kode: {
						required: true
					},
					nama: {
						required: true
					}

				},
				messages: {
					kode: {
						required: "Kode Peta Proses harus diisi"
					},
					nama: {
						required: "Nama Peta Proses harus diisi"
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