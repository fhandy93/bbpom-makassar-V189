<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Absen Lembur</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SMILE</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Absen Lembur</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">	
                
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
                    <a href="/smile-detail/{{$lembur_id}}" class="btn btn-primary" ><i class="fa fa-arrow-left me-2"></i>Kembali</a><p>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Detail Absen Lembur</h3>
							</div>
                            
							<div class="card-body">
								
                                    <div class="form-row">
										<div class="col-xl-12 mb-12 ">
                                        <div class="table-responsive">
                                            
                                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                
                                                <tbody>

                                                    @if($trans)
                                                        @foreach($trans as $index => $item)
                                                            <tr>
                                                                <td>Lembur Hari {{$index+1}}</td>
                                                                <td>
                                                                    <table style="width: 100%;">
                                                                        <tr>
                                                                            <td>Tanggal Lembur</td>
                                                                            <td>: {{ Carbon\Carbon::parse($item->tgl_lembur)->format('d/m/Y')}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jam Mulai </td>
                                                                            <td>: {{$item->jam_mulai}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jam Selesai </td>
                                                                            <td>: {{$item->jam_selesai}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Lama Lembur </td>
                                                                            <td style="color: yellow;">: {{timeLembur(substr($item->jam_selesai,0,2),
                                                                                               substr($item->jam_selesai,3,2),
                                                                                               substr($item->jam_mulai,0,2),
                                                                                               substr($item->jam_mulai,3,2))}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Data Dukung Absen</td>
                                                                            <td>
                                                                                <form method="POST" action="/absen-priview/{{$item -> id}}"  >
                                                                                    @csrf
                                                                                    <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" title='Priview'><span class="fe fe-eye"> Priview File</span></button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        @if(checkPermission(['superadmin','kepegawaian']))
                                                                            @if($status->status == 3 || $status->status == 4 || $status->status == 8 || $status->status == 10)
                                                                            <tr>
                                                                                <td>Aksi</td>
                                                                                <td>
                                                                                    <form method="POST" action="/absen-edit/{{$item -> id}}"  >
                                                                                        @csrf
                                                                                        <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title='Edit'><span class="fe fe-edit"> Edit Data Absen</span></button>
                                                                                    </form><p>

                                                                                    <form method="POST" action="/absen/delete/{{$item->id }}/{{$item->lembur_id }}/{{$item->user_id }}" style="display: inline;" >
                                                                                        @csrf
                                                                                        <input name="_method" type="hidden" value="DELETE">
                                                                                        <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                                                                    </form>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            @endif
                                                                        @endif
                                                                       
                                                                        
                                                                    </table>
                                                                </td>
                                                                
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
										</div>
									</div><p>
									
								
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
                title: `Anda yakin ingin menghapus data absen lembur ini ?`,
                text: "Data absen akan dihapus dari data pegawai.",
                icon: "warning",
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
        
     </script> 
    </x-HomeLayout>
	
