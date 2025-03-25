<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail BAST</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail BAST</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
					<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-12 col-md-6">
                        <div class="table-responsive">
                            <div class="card">
                                <div class="card-status card-status-left 
                                    @if($bmn->status==0)
                                    bg-secondary
                                    @elseif($bmn->status==1)
                                    bg-success
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Detail BAST  {{ $bmn->jns_bst == '1' ? 'Pengembalian' : 'Peminjaman' }} </h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">             
                                        <tbody>
                                          
                                            <tr>
                                                <td>1</td>
                                                <td>Tanggal Input</td>
                                                <td>: {{$bmn->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Nomor Surat</td>
                                                <td>: {{$bmn->no_surat}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Status Rujukan</td>
                                                @if($bmn->status==0)
                                                <td>: <span class="badge rounded-pill bg-secondary">Data Terkirim</span></td>
                                                @elseif($bmn->status==1)
                                                <td>: <span class="badge rounded-pill bg-success">Data Terkonfirmasi</span></td>
                                             
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Nama Pegawai</td>
                                                <td>: {{$bmn->user->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Nip</td>
                                                <td>: {{$prof->nip}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Pangkat</td>
                                                <td>: {{$prof->pangkat}}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Jabatan</td>
                                                <td>: {{$prof->jabatan}}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Petugas BMN</td>
                                                <td>: {{$user_bmn->name}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-status card-status-left 
                                    @if($bmn->status==0)
                                    bg-secondary
                                    @elseif($bmn->status==1)
                                    bg-success
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Detail Barang</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    
                                    @foreach($data as $index => $data)
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>Detail Barang {{$index+1}}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Nama Barang </td>
                                                <td>: {{$data->barang->nm_barang}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Merek/Type Barang </td>
                                                <td>: {{$data->barang->merek}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kode/NUP Barang </td>
                                                <td>: {{$data->barang->kode}}{{$data->barang->nup}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tahun Barang</td>
                                                <td>: {{$data->barang->tgl_perolehan}}</td>
                                            </tr>
                                            @if(isset($data->lokasi))
                                            <tr>
                                                <td>-</td>
                                                <td>Lokasi Tujuan Barang</td>
                                                <td>: {{$data->ruang->nm_ruangan}}</td>
                                            </tr>
                                            @endif
                                            @if(isset($data->kondisi))
                                            <tr>
                                                <td>-</td>
                                                <td>Kondisi Terbaru Barang</td>
                                                <td>: {{ $data->kondisi == 1 ? 'Baik' : ($data->kondisi == 2 ? 'Rusak Ringan' : 'Rusak Berat') }}

                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table><p>
                                    @endforeach 
                                </div>
                            </div> 
                        </div> 
                        <p>
                        <table>
                            <tr>
                                <td>
                                
                                <!-- menu -->
                                
                                    @if($bmn->status==0)
                                    <a href="{{ $bmn->jns_bst == 1 ? '/bmn/bast-pengembalian-edit/'.$bmn ->id : '/bmn/bast-peminjaman-edit/'.$bmn->id }}" class="btn btn-primary"><i class="fa fa-edit me-2"></i>Edit</a>
                                    @endif
                                    @if(checkPermission(['superadmin','perlengkapan']))
                                        @if($bmn->status==0)
                                            @if($bmn->jns_bst==1)
                                            <a href="/bmn/bast-pengembalian-approved/{{$bmn ->id}}" class="btn btn-success"><i class="fa fa-check me-2"></i>Konfirmasi</a>
                                            @else
                                            <a href="/bmn/bast-peminjaman-approved/{{$bmn ->id}}" class="btn btn-success"><i class="fa fa-check me-2"></i>Konfirmasi</a>
                                            @endif    
                                        @endif 
                                        @if($bmn->status==1)
                                        <!-- <a href="{{ $bmn->jns_bst == 1 ? '/bmn/bast-pengembalian-edit/'.$bmn ->id : '/bmn/bast-peminjaman-edit/'.$bmn->id }}" class="btn btn-primary"><i class="fa fa-edit me-2"></i>Edit</a> -->
                                        @if($bmn->jns_bst==2)
                                            @if($bmn->no_surat==null)
                                            <a href="/bmn/bast-pengembalian-nomor-add/{{$bmn ->id}}" class="btn btn-primary"><i class="fa fa-edit me-2"></i>Input Nomor Surat</a>
                                            @endif
                                            @if($bmn->no_surat!=null)
                                            <a href="/bmn/bast-pengembalian-nomor-edit/{{$bmn ->id}}" class="btn btn-primary"><i class="fa fa-edit me-2"></i>Edit Nomor Surat</a>
                                            @endif
                                        @endif
                                            <a href="{{ $bmn->jns_bst == 1 ? '/bmn/bast-pengembalian-cetak/'.$bmn ->id : '/bmn/bast-peminjaman-cetak/'.$bmn->id }}" class="btn btn-info"><i class="fa fa-print me-2"></i>Cetak BAST</a>
                                        @endif   
                                    @endif
                                </td>
                            </tr>
                        </table>
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
            title: `Konfirmasi Laporan ini ?`,
            text: "User pelapor akan menerima notifikasi bahwa laporan ini telah terkonfirmasi.",
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
	
