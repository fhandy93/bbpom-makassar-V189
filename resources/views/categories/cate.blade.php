<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Edit Category</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category Edit</li>
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
					<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-6 col-md-6">
						<a href="/categories"><button type="button" class="btn btn-primary"><i class="fe fe-eye me-2"></i>View Categories</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Edit Category</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/category/{{ $categories -> id}}" >
									@csrf
									@method('put')
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="name" class="form-label">Nama</label>
											<input type="text" value="{{ $categories -> name}}"  class="form-control  @error('name') is-invalid @enderror" id="name" name="name" >
											@error('name')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="keywords" class="form-label">Keywords</label>
											<input type="text" value="{{ $categories -> keywords}}"  class="form-control  @error('keywords') is-invalid @enderror" id="keywords" name="keywords" >
											@error('keywords')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-12 mb-12 ">
											<label for="email" class="form-label">Meta Description</label>
											<input type="text" value="{{ $categories -> meta_desc}}"  class="form-control  @error('meta_desc') is-invalid @enderror" id="meta_desc" name="meta_desc" >
											@error('meta_desc')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<p>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" style="width:150px;">Update Kategory</button>
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


	
<script type="text/javascript">
    
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					name: {
						required: true,
						minlength: 2
					},
					keywords: {
						required: true,
                        minlength: 2
					},
                    meta_desc: {
						required: true,
						minlength: 2
					}

				},
				messages: {
					name: {
						required: "Kolom Nama harus diisi",
						minlength: "Kolom Nama harus berisi minimal 2 karakter"
					},
					keywords: {
						required: "Kolom Keyword harus diisi",
                        minlength: "Kolom Keyword harus berisi minimal 2 karakter"
					},
                    meta_desc: {
						required: "Kolom Meta Description harus diisi",
						minlength: "Kolom Meta Description harus berisi minimal 2 Karakter"
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
	    </x-HomeLayout>