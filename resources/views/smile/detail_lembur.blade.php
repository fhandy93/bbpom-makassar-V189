<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Data Lembur</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SMILE</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Data Lembur</li>
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
								<h3 class="card-title">Detail Data Lembur</h3>
							</div>
							<div class="card-body">
								
                                    <div class="form-row">
										<div class="col-xl-12 mb-12 ">
                                        <div class="table-responsive">
                                            
                                            <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                
                                                <tbody>
                                                    <tr>
                                                        
                                                        <td>Nama Pegawai</td>
                                                        <td>{{$lembur->user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>Nip</td>
                                                        <td>{{$profil->nip}}</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>Pangkat/Gol.</td>
                                                        <td>{{$profil->pangkat}}</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>Jabatan</td>
                                                        <td>{{$profil->jabatan}}</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td>Tanggal Pengajuan Lembur</td>
                                                        <td>{{$lembur->tgl_lembur}}</td>
                                                    </tr>
                                                    @if($lembur->status==3 || $lembur->status==4 || $lembur->status==5 || $lembur->status==6 || $lembur->status==7 || $lembur->status==8 || $lembur->status==10)
                                                    <tr>
                                                        <td>Aksi</td>
                                                        <td>
                                                            @if($lembur->status==3 || $lembur->status==4 || $lembur->status==8 || $lembur->status==10 )
                                                                @if(checkPermission(['superadmin','kepegawaian']))
                                                                <a href="/input-absen/{{$lembur->id}}/{{$lembur->user_id}}" class="btn btn-success btn-sm" style="width:170px;">Input Verifikasi Absen</a>
                                                                @endif
                                                            @endif
                                                            <a href="/detail-absen/{{$lembur->id}}/{{$lembur->user_id}}" class="btn btn-success btn-sm" style="width:170px;"><span class="fe fe-eye"> Detail Absen</span></a>
                                                        </td>
                                                    </tr>
                                                    @endif






                                                    @if($user)
                                                       
                                                            <tr>
                                                                <td>Pegawai Tambahan </td>
                                                                <td>:
                                                                    <table style="width: 100%;">
                                                                    @foreach($user as $index => $item)
                                                                        <tr>
                                                                            <td>Nama Pegawai {{$index+1}}</td>
                                                                            <td>: {{$item->user->name}}</td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nip</td>
                                                                            <td>: {{$item->nip}}</td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pangkat/Gol.</td>
                                                                            <td>: {{$item->pangkat}}</td>
                                                                            
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jabatan</td>
                                                                            <td>: {{$item->jabatan}}</td>
                                                                            
                                                                        </tr>
                                                                        @if($lembur->status==3 || $lembur->status==4 || $lembur->status==5 || $lembur->status==6 || $lembur->status==7 || $lembur->status==8 || $lembur->status==10)
                                                                        <tr>
                                                                            <td>Aksi</td>
                                                                            <td>
                                                                                @if($lembur->status==3 || $lembur->status==4 || $lembur->status==8 || $lembur->status==10)
                                                                                    @if(checkPermission(['superadmin','kepegawaian']))
                                                                                    <a href="/input-absen/{{$lembur->id}}/{{$item->user_id}}" class="btn btn-success btn-sm" style="width:170px;">Input Verifikasi Absen</a>
                                                                                    @endif    
                                                                                @endif
                                                                                <a href="/detail-absen/{{$lembur->id}}/{{$item->user_id}}" class="btn btn-success btn-sm" style="width:170px;"><span class="fe fe-eye"> Detail Absen</span></a>
                                                                            </td>
                                                                            
                                                                        </tr>
                                                                        @endif
                                                                        @endforeach
                                                                        
                                                                    </table>
                                                                    
                                                                </td>
                                                                
                                                            </tr>
                                                        
                                                    @endif






													<tr>
                                                        
                                                        <td>Uraian Tugas Lembur</td>
                                                        <td>{{$lembur->tugas}}</td>
                                                    </tr>
                                                    @if($lembur->no_surat)
                                                    <tr>
                                                        
                                                        <td>No. Surat</td>
                                                        <td>{{$lembur->no_surat}}</td>
                                                    </tr>
                                                    @endif
                                                    @if($lembur->alasan_tolak)
                                                    <tr style="color: red;" >
                                                        
                                                        <td>Lembur Ditolak</td>
                                                        <td>{{$lembur->alasan_tolak}}</td>
                                                    </tr>
                                                    @endif
                                                    @if($lembur->file)
                                                    <tr >
                                                        
                                                        <td>SPML</td>
                                                        <td>
                                                            <form method="POST" action="/spml-priview/{{$lembur -> id}}"  >
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" title='Delete'><span class="fe fe-eye"> Priview File</span></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if($lembur->file2)
                                                    <tr >
                                                        
                                                        <td>File Pendukung</td>
                                                        <td>
                                                            <a href="{{$lembur->file2}}" target="_new" class="btn btn-success btn-sm"><span class="fe fe-download"> Download</span></a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if($lembur->ket)
                                                    <tr >
                                                        
                                                        <td>Keterangan</td>
                                                        <td>
                                                            {{$lembur->ket}}
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @if($lembur->alasan_kembali)
                                                    <tr>
                                                        
                                                        <td style="color: red;">Alasan Pengembalian</td>
                                                        <td style="color: red;">
                                                            {{$lembur->alasan_kembali}}
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    <!-- @if($trans)
                                                        @foreach($trans as $index => $item)
                                                            <tr>
                                                                <td>Lembur Hari {{$index+1}}</td>
                                                                <td>
                                                                    <table style="width: 100%;">
                                                                        <tr>
                                                                            <td>Tanggal Lembur</td>
                                                                            <td>: {{$item->tgl_lembur}}</td>
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
                                                                                    <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" title='Delete'><span class="fe fe-eye"> Priview File</span></button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        @if($item->ket)
                                                                        <tr>
                                                                            <td>Keterangan </td>
                                                                            <td>: {{$item->ket}}</td>
                                                                        </tr>
                                                                        @endif
                                                                        
                                                                    </table>
                                                                </td>
                                                                
                                                            </tr>
                                                        @endforeach
                                                    @endif -->
                                                </tbody>
                                            </table>
                                        </div>
										</div>
									</div><p>
									<div class="text-center">
                                    @if(checkPermission(['superadmin','ktu']))
                                        @if($lembur->status==0)
                                            <form action="/smile-approve/{{$lembur->id}}" style="display: inline;" >
                                                <button type="submit" class="btn btn-primary show_confirm" style="width:150px;">Approve</button>
                                            </form>
                                            <a href="/smile-tolak/{{$lembur->id}}" class="btn btn-danger show_confirm_tolak" style="width:150px;">Tolak</a>
                                        @endif
                                        @if($lembur->status==6)
                                            
                                            <a href="/smile-ttd/{{$lembur->id}}" class="btn btn-primary" style="width:150px;">Konfirmasi/TTD</a>
                                        @endif    
                                    @endif
                                    @if(checkPermission(['superadmin','kepegawaian']))
                                        @if(!$lembur->no_surat && $lembur->status==1)
                                            <a href="/input-nomor-surat/{{$lembur->id}}" class="btn btn-primary" style="width:150px;">Input Nomor Surat</a>
                                        @endif
                                        @if(!$lembur->file && $lembur->no_surat)
                                            <a href="/download-spml/{{$lembur->id}}" class="btn btn-secondary" style="width:150px;">Download SPML</a>
                                            <a href="/input-spml/{{$lembur->id}}" class="btn btn-secondary" style="width:150px;">Upload SPML</a>
                                        @endif
                                        
                                        @if($lembur->status==4 )
                                            <form action="/smile-konfirmed/{{$lembur->id}}" method="post" style="display: inline;" >
                                            @csrf
									        @method('post')
                                            <button  class="btn btn-default show_confirm_selesai" style="width:170px;"><i class="fe fe-check me-2"></i>Selesa</button>
                                            </form> 
                                             
                                        @endif

                                        @if($lembur->status==8 )
                                            <form action="/smile-konfirmed-revisi/{{$lembur->id}}" method="post" style="display: inline;" >
                                            @csrf
									        @method('post')
                                            <button  class="btn btn-default show_confirm_selesai" style="width:170px;"><i class="fe fe-check me-2"></i>Selesai</button>
                                            </form> 
                                        @endif

                                        @if($lembur->status==10)
                                            <form action="/smile-konfirmed-revisi-ktu/{{$lembur->id}}" method="post" style="display: inline;" >
                                            @csrf
									        @method('post')
                                            <button  class="btn btn-default show_confirm_selesai" style="width:170px;"><i class="fe fe-check me-2"></i>Selesai</button>
                                            </form> 
                                             
                                        @endif

                                    @endif
                                    @if(checkPermission(['superadmin','evaluasi']))
                                        @if($lembur->status==7)
                                            <form action="/smile-approved/{{$lembur->id}}" method="post" style="display: inline;" >
                                            @csrf
									        @method('put')
                                            <button  class="btn btn-default show_confirm_approved" style="width:170px;"><i class="fa fa-cog me-2"></i>Proses</button>
                                            </form>
                                        @endif
                                    @endif
                                    @if(checkPermission(['superadmin','evaluasi','ktu']))
                                        @if($lembur->status==7 || $lembur->status==6)
                                            <a href="/smile-revisi/{{$lembur->id}}" class="btn btn-danger show_confirm_tolak" style="width:150px;"><i class="fa fa-times me-2"></i>Kembalikan</a>     
                                        @endif
                                    @endif
                                        @if($lembur->status==7 || $lembur->status==9)
                                            @if(checkPermission(['superadmin','evaluasi']))
                                            <a href="/smile-download/{{$lembur->id}}"><button type="button" class="btn btn-primary"><i class="fa fa-download me-2"></i>Download Laporan</button></a>
                                            @endif
                                        @endif
                                    
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
	
    