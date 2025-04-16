<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail DBR</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail DBR</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
			
					<div class="col-lg-12 col-md-6">
                        <div class="table-responsive">
                            
                            <div class="card">
                                <div class="card-status card-status-left 
                                    @if($ruang->status == 0) 
                                        bg-warning 
                                    @else 
                                        bg-success 
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Data Ruangan</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nama Ruangan</td>
                                                <td>: {{$ruang->nm_ruangan}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Status</td>
                                                <td>: 
                                                    <span class="badge rounded-pill 
                                                                                    @if($ruang->status == 0) 
                                                                                        bg-warning 
                                                                                    @else 
                                                                                        bg-success  
                                                                                    @endif"> 
                                                                                    @if($ruang->status == 0) 
                                                                                        Belum Terkonfimasi  
                                                                                    @else
                                                                                        Terkonfirmasi
                                                                                    @endif
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Penanggung Jawab</td>
                                                <td>: @if(isset($ruang->user->name))
                                                        {{$ruang->user->name}}
                                                      @else
                                                        -
                                                      @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 
                            <div class="card">
                                <div class="card-status card-status-left 
                                    @if($ruang->status == 0) 
                                        bg-warning 
                                    @else 
                                        bg-success 
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Barang Dalam Ruangan</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Index</th>
                                                <th class="border-bottom-0">Status DBR</th>
                                                <th class="border-bottom-0">Kode Barang</th>
                                                <th class="border-bottom-0">NUP</th>
                                                <th class="border-bottom-0">Nama Barang</th>
                                                <th class="border-bottom-0">Merek</th>
                                                <th class="border-bottom-0">Kondisi</th>
                                                <th class="border-bottom-0">Tanggal Perolehan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data as $index => $data)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>
                                                    <span class="badge rounded-pill 
                                                                                    @if($data->status == 0) 
                                                                                        bg-warning 
                                                                                    @else 
                                                                                        bg-success 
                                                                                    @endif"> 
                                                                                    @if($data->status == 0) 
                                                                                        Belum Terkonfirmasi
                                                                                    @else 
                                                                                        Terkonfirmasi
                                                                                    @endif</span>
                                                </td>
                                                
                                                <td>{{ $data -> kode }}</td>
                                                <td>{{ $data -> nup }}</td>
                                                <td>{{ $data -> nm_barang }}</td>
                                                <td>{{ $data -> merek }}</td>
                                                <td>
                                                    @if($data -> kondisi == 1)
                                                    Baik
                                                    @elseif($data -> kondisi == 2)
                                                    Rusak Ringan
                                                    @else
                                                    Rusak Berat
                                                    @endif
                                                </td>
                                                <td>{{ $data -> tgl_perolehan }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                    
                        </div> 
                        <p>
                        <!-- checkPermission(['admin','superadmin']) -->
                        @if(Auth::user()->id == $ruang->pj &&  $ruang->status == 0)
                        <form action="/bmn/konfirmasi-dbr/{{$ruang->id}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success show_confirm">
                                <i class="fa fa-check me-2"></i>Konfirmasi
                            </button>
                        </form>
                        @endif
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

     <!-- Swet Alert -->
     <script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>


<script type="text/javascript">
$('.show_confirm').click(function(event) {
    event.preventDefault();
    var form = $(this).closest("form");
    swal({
        title: `Konfirmasi DBR ini ?`,
        text: "Status DBR dan barang akan terkonfirmasi",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willSubmit) => {
        if (willSubmit) {
            form.submit();
        }
    });
});

   
</script>  

    </x-HomeLayout>
	
