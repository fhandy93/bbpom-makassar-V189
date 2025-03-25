<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Form Peminjaman AULA</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
							<li class="breadcrumb-item active" aria-current="page">Peminjaman AULA</li>
                            <li class="breadcrumb-item active" aria-current="page">Form Peminjaman AULA</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
                    @if (session() -> has('success'))
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Success</h4>
							<p class="card-text">{{ session() -> get('success')}}</p>
						</div>
					@endif    	  	
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
						<a href="/bmn/pinjam-aula"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left me-2"></i>Back</button></a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Form Peminjaman AULA</h3>
							</div>
							<div class="card-body">
                            <form id="signupForm" method="post" class="form-horizontal" action="/bmn/peminjaman-aula-store/{{$aula->id}}" >
									@csrf
									@method('post')
                                   
                                        <div class="card-body text-center">
                                            <h4 class="h4 mb-0 mt-3">{{$aula->nm_aula}}</h4><br>
                                           <span class="avatar avatar-xxl cover-image" data-bs-image-src="{{ $aula->foto }}" style="background: url() center center;"></span>
                                            <h4 class="h4 mb-0 mt-3">{{$aula->ukuran}}</h4>
                                            <h5 class="h5 mb-0 mt-3">{{$aula->kapasitas}}</h5><br> 
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class="col-xl-8 mb-12 ">
                                                <label for="user_id" class="form-label">Nama Pegawai</label>
                                                <select name="user_id" class="form-control form-select select2">
                                                    <option value="aa" selected disabled>Pilih Nama Pegawai ...</option>
                                                    @foreach($user as $item)
                                                    <option value="{{$item->id}}" @if(Auth::user()->id == $item->id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>	
                                                @error('user_id')
                                                    <span style="color:#e23e3d;"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 mb-12">
                                                <label for="bentuk" class="form-label">Bentuk Ruangan</label>
                                                <select name="bentuk" class="form-control form-select select2">
                                                <option value="aa" selected disabled>Pilih Bentuk Ruangan...&nbsp;</option>
                                                    <option value="1" >U-Shape</option>
                                                    <option value="2" >Class</option>
                                                    <option value="3" >Auditorium</option>
                                                    <option value="4" >Boardroom</option>
                                                    <option value="5" >Hollow Square</option>
                                                    <option value="6" disabled>Banquet/Round Table</option>
                                                </select>
                                                @error('bentuk')
                                                    <span style="color:#e23e3d;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-4 mb-12">
                                                <label for="jumlah" class="form-label">Jumlah Peserta (Orang)</label>
                                                <input type="number" class="form-control" name="jumlah" id="jumlah">
                                                @error('jumlah')
                                                    <span style="color:#e23e3d;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-8 mb-12 ">
                                                <label for="tgl" class="form-label">Tanggal Peminjaman</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                    <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" type="text" name="tgl" id="tgl">
                                                </div>
                                                @error('tgl')
                                                <span style="color:#e23e3d;"> {{ $message }} </span>
                                                @enderror	
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-4 mb-12 ">
                                                <label for="perlu" class="form-label">Jam Peminjaman</label>
                                                <input type="time" id="jam" name="jam" class="form-control  @error('jam') is-invalid @enderror">
                                                @error('jam')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                                @enderror	
                                            </div>
                                        </div>
                                
                                     
                                        <div class="form-row">
                                            <div class="col-xl-12 mb-12 ">
                                                <label for="note" class="form-label">Catatan Peminjaman</label>
                                                <textarea  class="form-control  @error('note') is-invalid @enderror" id="note" name="note"  rows="5">{{old('note')}}</textarea>
                                                @error('note')
                                                <span style="color:#e23e3d;"> {{ $message }} </span>
                                                @enderror	
                                            </div>
                                        </div>
                                        <p>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" style="width:150px;">Kirim Permintaan</button>
                                            
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
					jumlah: {
						required: true
					}

				},
				messages: {
					jumlah: {
						required: "Jumlah Peserta harus diisi"
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
        $(document).ready(function() {
    $('#driver').select2({
        templateResult: function(option) {
            // Jika opsi adalah placeholder, tampilkan seperti apa adanya
            if (!option.id) {
                return option.text; // Placeholder tetap
            }

            // Ambil data status dari atribut data-status
            const status = $(option.element).data('status');
            const badgeClass = status == 1 ? 'bg-success' : 'bg-danger';
            const statusText = status == 1 ? 'Ready Today' : 'Not Available Today';

            // Template untuk opsi lainnya
            return $(
                `<span>${option.text} <span class="badge rounded-pill ${badgeClass}">${statusText}</span></span>`
            );
        },
        templateSelection: function(option) {
            // Tampilkan teks untuk opsi yang dipilih
            return option.text; 
        }
    });
});


	</script>
    