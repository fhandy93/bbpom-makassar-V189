<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Barang</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Barang</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
					<div class="col-lg-3 col-md-3">
                    <a href="/bmn/admin/daftar-barang"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-left me-2"></i>Back</button></a><p>
                    </div>
					<div class="col-lg-12 col-md-6">
                        <div class="table-responsive">
                            
                            <div class="card">
                                <div class="card-status card-status-left 
                                    bg-primary
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Spesifikasi Barang/Perlengkapan</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kode Satker</td>
                                                <td>: {{$data->kd_satker}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Kode Barcode</td>
                                                <td>: {{$data->barcode}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kode Barang</td>
                                                <td>: {{$data->kode}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>No. Inven.(NUP)</td>
                                                <td>: {{$data->nup}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Nama Barang</td>
                                                <td>: {{$data->nm_barang}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Kondisi</td>
                                                <td>:@if($data -> kondisi == 1)
                                                    Baik
                                                    @elseif($data -> kondisi == 2)
                                                    Rusak Ringan
                                                    @else
                                                    Rusak Berat
                                                    @endif</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Merek</td>
                                                <td>: {{$data->merek}}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Tanggal Perolehan</td>
                                                <td>: {{$data->tgl_perolehan}}</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Nilai</td>
                                                <td>: {{$data->nilai}}</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Lokasi</td>
                                                <td>: {{$data->ruang?->nm_ruangan ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 

                            <div class="card">
                                <div class="card-status card-status-left 
                                    bg-primary
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Tracking Lokasi Barang</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>No</td>
                                                <td>Lokasi</td>
                                                <td>User Update</td>
                                                <td>Kondisi</td>
                                                <td>Tanggal Terakhir Lokasi</td>
                                            </tr>
                                            @foreach($track as $index=> $item)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$item->ruang?->nm_ruangan ?? '-' }}</td>
                                                <td>{{$item->user->username}}</td>
                                                <td>@if($item -> kondisi == 1)
                                                    Baik
                                                    @elseif($item -> kondisi == 2)
                                                    Rusak Ringan
                                                    @else
                                                    Rusak Berat
                                                    @endif
                                                </td>
                                                <td>{{$item->created_at}}</td>
                                            </tr>
                                            @endforeach                                            
                                         
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 
                         
                        </div> 
                        <p>
                        <a href="/bmn/admin/edit-data-barang/{{$data->id}}" class="btn btn-info"><i class="fa fa-edit me-2"></i>Edit</a>
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
	
