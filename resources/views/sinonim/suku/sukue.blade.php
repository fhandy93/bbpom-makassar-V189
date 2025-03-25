<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Edit Suku Cadang</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Sinonim</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Suku Cadang Edit</li>
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
					@if (session() -> has('unsuccess'))
						<div class="card-body text-center" id="unsuccess"> 
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Gagal</h4>
							<p class="card-text">{{ session() -> get('unsuccess')}}</p>
						</div>
					@endif    	
					<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-6 col-md-6">
						<a href="/sukuv"><button type="button" class="btn btn-primary"><i class="fe fe-eye me-2"></i>View Suku Cadang</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Edit Suku Cadang</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/suku/{{$suku->id}}" >
									@csrf
									@method('put')
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="no_apl" class="form-label">No. APL</label>
											<input type="text" value="{{ $suku->no_apl }}"  class="form-control  @error('no_apl') is-invalid @enderror"  id="no_apl" name="no_apl" >
											@error('no_apl')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>	
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="nama" class="form-label">Nama Suku Cadang</label>
											<input type="text"   class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $suku->nama}}">
											@error('nama')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="kataloq" class="form-label">Kataloq</label>
											<input type="text" value="{{ $suku->kataloq }}"  class="form-control  @error('kataloq') is-invalid @enderror" id="kataloq" name="kataloq" >
											@error('kataloq')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Netto </label>
											<select name="netto" class="form-control form-select select2" data-bs-placeholder="Select Country">
													@if($suku->netto == 'Buah')
														<option value="Pcs">Pcs</option>
														<option value="Buah" selected>Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen">Jerigen</option>
													@elseif ($suku->netto == 'Bungkus')
														<option value="Pcs">Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus" selected>Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen">Jerigen</option>
													@elseif ($suku->netto == 'Lembar')
														<option value="Pcs">Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar" selected>Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen">Jerigen</option>
													@elseif ($suku->netto == 'Dos')
														<option value="Pcs">Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos" selected>Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen">Jerigen</option>
													@elseif ($suku->netto == 'Pack')
														<option value="Pcs">Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack" selected>Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen">Jerigen</option>
													@elseif ($suku->netto == 'Biji')
														<option value="Pcs">Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji" selected>Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen">Jerigen</option>
													@elseif ($suku->netto == 'Botol')
														<option value="Pcs">Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol" selected>Botol</option>
														<option value="Jerigen">Jerigen</option>
													@elseif ($suku->netto == 'Jerigen')
														<option value="Pcs">Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen" selected>Jerigen</option>
													@elseif ($suku->netto == 'Pcs')
														<option value="Pcs" selected>Pcs</option>
														<option value="Buah">Buah</option>
														<option value="Bungkus">Bungkus</option>
														<option value="Lembar">Lembar</option>
														<option value="Dos">Dos</option>
														<option value="Pack">Pack</option>
														<option value="Biji">Biji</option>
														<option value="Botol">Botol</option>
														<option value="Jerigen">Jerigen</option>
													@endif
												</select>
										</div>
									</div>
                                    <div class="form-row">
										<div class="col-xl-4 mb-12 ">
											<label for="stok" class="form-label">Stok</label>
											<input type="text" value="{{ $suku->stok}}"  class="form-control  @error('stok') is-invalid @enderror" id="stok" name="stok" readonly>
											@error('stok')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Update Suku Cad.</button>
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
	}, 5000); // <-- time in milliseconds
	setTimeout(function() {
		document.getElementById('unsuccess').style.display = 'none';
	}, 5000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					nama: {
						required: true,
						minlength: 2
					},
					no_apl: {
						required: true
					},
					kataloq: {
						required: true
					},
                    stok: {
						required: true,
                        number:true
					}
				},
				messages: {
					nama: {
						required: "Nama Suku Cadang harus diisi",
						minlength: "Harus berisi minimal 2 karakter"
					},
                    no_apl: {
						required: "Kolom No. APL harus diisi"
					},
					kataloq: {
						required: "Kolom Kataloq harus diisi"
					},
                    stok: {
						required: "Kolom Stok harus diisi",
                        number:"Harus berisi nomor 0-9"
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