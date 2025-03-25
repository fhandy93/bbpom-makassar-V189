<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Data Berakhlak</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">{{getMenuBerakhlak($data->menu)}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">	
					<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-10 col-md-10">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Detail Data </h3>
							</div>
							<div class="card-body">
                                <div class="form-row">
                                    <div class="col-xl-12 mb-12 ">
                                        <div class="table-responsive">
                                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Menu</td>
                                                        <td>{{getMenuBerakhlak($data->menu)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Judul</td>
                                                        <td>{{$data->judul}}</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>Deskripsi</td>
                                                        <td>
                                                            @if($data->desk)
                                                                {{$data->desk}}
                                                            @else
                                                                -
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>File</td>
                                                        @if($data->type==1)
                                                            <td><img src="{{$data->file}}" style=" max-height: 200px;"></td>
                                                        @elseif($data->type==2)
                                                            <td><iframe width="560" height="315" src="{{$data->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td>
                                                        @elseif($data->type==3)
                                                            <td><a href="{{$data->file}}">{{ substr($data->file, 23,  )  }}</a></td>        
                                                        @elseif($data->type==4)
                                                            <td><a href="{{$data->file}}" target="_new">{{ $data->file }}</a></td>        
                                                        else
                                                    
                                                           
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Input</td>
                                                        <td>{{$data->created_at}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>User</td>
                                                        <td>{{$data->user->username}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><p>
                                <div class="text-center">
                                    <!-- <a href="/{{$url}}/edit-image/{{$data->id}}" class="btn btn-primary">Edit Data</a> -->
                                </div>
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

    <!-- Swet Alert -->
    <script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>
     
     <script type="text/javascript">
     setTimeout(function() {
                 document.getElementById('success').style.display = 'none';
             }, 4000); // <-- time in milliseconds
         $('.show_confirm').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Approve Pengajuan Lembur ?`,
                 text: "Proses Pengajuan lembur akan lanjutkan.",
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
         $('.show_confirm_selesai').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Verifikasi absen telah selesai ?`,
                 text: "Laporan lembur akan dikirim ke PPABP.",
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
         $('.show_confirm_approved').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Verifikasi absen telah selesai ?`,
                 text: "Notifikasi akan dikirimkan kepihak yang mengajukan lembur.",
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
    </x-HomeLayout>
	
    