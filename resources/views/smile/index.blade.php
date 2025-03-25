
<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- ROW OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                    <div class="col-md-12 text-center" >
                        <img src="{{ asset('vendor/images/media/Smile.png') }}" style="width:700px;">
                    </div>
                </div>
				<div class="row">
	    			
							
                            <!-- COL END -->
                            <div class="col-md-12 col-xl-12">
                            <div class="card">
                            <div class="card-status card-status-left bg-azure br-bs-7 br-ts-7"></div>
                                <div class="card-body">
                                        <div class="text-wrap">
                                            
                                            <div class="example">
                                            <div class="row ">
                                                <div class="col-md-4">
                                                <div class="col-md-12" >
                                                    <div class="card">
                                                        <div class="card-header bg-azure br-te-3 br-ts-3">
                                                        <a href="/smile-input" ><h3 class="card-title text-white">Form <i class="fa fa-send fa-1x"></i></h3></a>                    
                                                        </div>
                                                        <div class="card-body">
                                                            <a href="/smile-input" style="color: white;">
                                                                <div class="row">
                                                                    <div class="col-md-2" ><i class="fa fa-edit fa-2x" aria-hidden="true"> </i></div>
                                                                    <div class="col-md-10" >Form Pengajuan Lembur<p></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- COL END -->
                                                <div class="col-md-12" >
                                                    <div class="card">
                                                        <div class="card-header bg-azure br-te-3 br-ts-3">
                                                        <a href="/smile-history"><h3 class="card-title text-white">History <i class="fa fa-send fa-1x"></i></h3></a>                    
                                                        </div>
                                                        <div class="card-body">
                                                            <a href="/smile-history" style="color: white;">
                                                                <div class="row">
                                                                    <div class="col-md-2" ><i class="fa fa-history fa-2x" aria-hidden="true"></i></div>
                                                                    <div class="col-md-10" >History Lembur </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- COL END -->
                                                <div class="col-md-12" >
                                                    <div class="card">
                                                        <div class="card-header bg-azure br-te-3 br-ts-3">
                                                        <a href="/about-smile"><h3 class="card-title text-white">About <i class="fa fa-send fa-1x"></i></h3></a>                    
                                                        </div>
                                                        <div class="card-body">
                                                            <a href="/about-smile" style="color: white;">
                                                                <div class="row">
                                                                    <div class="col-md-2" ><i class="fa fa-info fa-2x" aria-hidden="true"></i></div>
                                                                    <div class="col-md-10" >About</div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- COL END -->
                                            </div>
                                            <div class="col-md-8">
                                            @if (session() -> has('success'))
                                                <div class="card-body text-center" id="success"> 
                                                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                                                    <h4 class="h4 mb-0 mt-3">Success</h4>
                                                    <p class="card-text">{{ session() -> get('success')}}</p>
                                                </div>
                                            @endif
                                            @if (session() -> has('unsuccess'))
                                                <div class="card-body text-center" id="success"> 
                                                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                                                    <h4 class="h4 mb-0 mt-3">Success</h4>
                                                    <p class="card-text">{{ session() -> get('unsuccess')}}</p>
                                                </div>
                                            @endif
                                    <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar pengajuan lembur anda bulan ini</h3>
                                    </div>
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0">Index</th>
                                                        <th class="border-bottom-0">Nama</th>
                                                        <th class="border-bottom-0">Status</th>
                                                        <th class="border-bottom-0">Tugas</th>
                                                        <th class="border-bottom-0">Tanggal Lembur</th>
                                                        <th class="border-bottom-0">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($lembur as $index => $item)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>{{$item -> user->username}}</td>
                                                            @if($item->status==0)
                                                            <td><span class="badge rounded-pill bg-warning">1-Pengajuan Lembur Terkirim</span></td>
                                                            @elseif($item->status==1)
                                                            <td> <span class="badge rounded-pill bg-secondary">2-Pengajuan Lembur Diterima</span></td>
                                                            @elseif($item->status==2)
                                                            <td><span class="badge rounded-pill bg-danger">Pengajuan Lembur Ditolak</span></td>
                                                            @elseif($item->status==3)
                                                            <td><span class="badge rounded-pill bg-success">3-Terbit SPML</span></td>
                                                            @elseif($item->status==4)
                                                            <td><span class="badge rounded-pill bg-orange">4-Verifikasi Absen</span></td>
                                                            @elseif($item->status==5)
                                                            <td><span class="badge rounded-pill bg-gray">5-Verfikasi Lembur</span></td>
                                                            @elseif($item->status==6)
                                                            <td><span class="badge rounded-pill bg-default">6-Review Atasan(KTU)</span></td>
                                                            @elseif($item->status==7)
                                                            <td><span class="badge rounded-pill bg-success">7-Terkonfirmasi Atasan(KTU)</span></td>
                                                            @elseif($item->status==9)d
                                                            <td><span class="badge rounded-pill bg-primary">8-Selesai</span></td>
                                                            @elseif($item->status==8 ||$item->status==10)
                                                            <td><span class="badge rounded-pill bg-danger">Dikembalikan</span></td>
                                                            @endif
                                                            
                                                        <td>{!!$item -> tugas !!}</td>
                                                        <td>{{$item -> tgl_lembur }}</td>   
                                                        <td>
                                                            @if($item->status==0 )
                                                                <form method="POST" action="/smile/delete/{{$item->id }}" style="display: inline;" >
                                                                    @csrf
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                                                </form>
                                                            @endif 
                                                            @if($item->status==2 || $item->status==3 || $item->status==4 || $item->status==5 || $item->status==6 || $item->status==7 || $item->status==8  )
                                                                <a href="/smile-detail/{{$item->id}}" class="btn btn-success">Detail</a>
                                                            @endif
                                                            @if($item->status==5 )
                                                                <a href="/smile-verify/{{$item->id}}" class="btn btn-gray">Input Data Verifikasi Lembur</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                @if(checkPermission(['superadmin','ktu']))
                                    <a href="/data-lembur-masuk" class="btn btn-primary">Pengajuan Lembur Masuk</a>
                                    <a href="/data-lembur-tolak" class="btn btn-danger">Lembur Ditolak</a>
                                    <a href="/data-lembur-menunggu-konfirmasi" class="btn btn-success">Menunggu Konfirmasi</a>
                                @endif
                                @if(checkPermission(['superadmin','kepegawaian','ktu']))
                                    <a href="/data-lembur-terima" class="btn btn-secondary">Daftar Lembur Diterima</a>
                                    <a href="/lembur-terbit-spml" class="btn btn-success">Terbit SPML</a>
                                    <a href="/data-lembur-dikembalikan" class="btn btn-danger">Daftar Lembur Dikembalikan</a>    
                                @endif
                                @if(checkPermission(['superadmin','evaluasi','ktu']))  
                                    <a href="/lembur-konfirmed" class="btn btn-success">Lembur Terkonfirmasi</a>
                                @endif
                                @if(checkPermission(['superadmin','evaluasi','ktu']))
                                    <a href="/lembur-selesai" class="btn btn-default">Lembur Selesai</a>
                                @endif
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- COL END -->
                          
                           
			</div>
			<!-- ROW CLOSED -->
			<div class="row">	
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                <div class="card overflow-hidden" >
                    <div class="card-body pb-0 bg-recentorder">
                        <h5 class="card-title text-white" style="text-align: center;"><i class="breadcrumb-item" aria-current="page">SMILE Version: <b>1.0</b></i></h5>
                        <div class="chartjs-wrapper-demo">
                            <canvas id="recentorders" class="chart-dropshadow" style="display: none;"></canvas>
                        </div>
                    </div>
                    <div id="flotback-chart" class="flot-background"></div>    
                </div>
            </div>
            </div>
		
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

    <!-- DATA TABLE JS-->
    <script src="{{ asset('vendor/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('vendor/js/table-data.js')}}"></script>

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
                title: `Anda yakin ingin menghapus pengajuan lembur ini ?`,
                text: "Pengajuan lembur belum terverifikasi oleh atasan.",
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
    
    </script>  
    </x-HomeLayout>
 