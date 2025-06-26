<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Data Pengunjung</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIPINTAR</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Pengunjung/Tamu</li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pengunjung/Tamu</li>
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
                                <div class="card-status card-status-left bg-success br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Data Layanan</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">             
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nomor Antrian</td>
                                                <td>: {{$data->no_antrian}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tanggal Pelayanan</td>
                                                <td>: {{$data->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Jenis Layanan</td>
                                                <td>: {{$data->jns_layanan}}</td>                                              
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Jenis Sertifikasi</td>
                                                <td>: {{$data->jns_sertifikasi}}</td>                                              
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div>
                            <div class="card">
                            <div class="card-status card-status-left bg-success br-bs-7 br-ts-7">
                            </div>
                                <div class="card-header">
                                    <h3 class="card-title">Data Pengunjung/Tamu</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nama Pengunjung</td>
                                                <td>: {{$data->nama}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Umur</td>
                                                <td>: {{$data->umur}}</td>
                                            </tr>
                                        
                                            <tr>
                                                <td>3</td>
                                                <td>Jenis Kelamin</td>
                                                <td>: {{$data->kelamin}}</td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>No. Hp</td>
                                                <td>: {{$data->hp}}</td>
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Email</td>
                                                <td>: {{$data->email}}</td>
                                            </tr>

                                            <tr>
                                                <td>6</td>
                                                <td>pekerjaan</td>
                                                <td>: {{$data->pekerjaan}}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Instansi</td>
                                                <td>: {{$data->instansi}}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Kabupaten</td>
                                                <td>: {{$data->kabupaten}}</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Alamat</td>
                                                <td>: {{$data->alamat}}</td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 
                            <div class="card m-b-20">
                            <div class="card-status card-status-left bg-success br-bs-7 br-ts-7">
                            </div>
                                <div class="card-header">
                                    <h3 class="card-title">Foto</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($data -> foto != null)
                                    <img alt="image" style="width: 400px;" src="/storage/sipintar/{{$data -> foto}}">
                                    @endif
                                </div>
                            </div>
                           
                        </div> 
                        <p>
                        <table>
                            <tr>
                                <td>
                                
                                <!-- menu infokom -->
                                <a href="" class="btn btn-primary ">Open ON ULPK</a>

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
	
