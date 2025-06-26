<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Laporan Siyapp</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Siyapp</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Laporan</li>
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
                                    @if($data->status==0)
                                    bg-danger
                                    @elseif($data->status==1)
                                    bg-warning
                                    @elseif($data->status==2)
                                    bg-success    
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Formulir Rujukan</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">             
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nomor Form</td>
                                                <td>: {{$data->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tanggal Terima Laporan</td>
                                                <td>: {{$data->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Status Rujukan</td>
                                                @if($data->status==0)
                                                <td>: <span class="badge rounded-pill bg-danger">Belum Terkonfirmasi</span></td>
                                                @elseif($data->status==1)
                                                <td>: <span class="badge rounded-pill bg-warning">Terkonfirmasi</span></td>
                                                @elseif($data->status==2 )
                                                <td>: <span class="badge rounded-pill bg-success">Selesai</span></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>User Pelapor</td>
                                                <td>: {{$data->user->name}}</td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-status card-status-left 
                                @if($data->status==0)
                                bg-danger
                                @elseif($data->status==1)
                                bg-warning
                                @elseif($data->status==2)
                                bg-success    
                                @endif
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
                                                <td>Nama Barang</td>
                                                <td>: {{$data->nama_barang}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Merek</td>
                                                <td>: {{$data->merek}}</td>
                                            </tr>
                                       
                                            <tr>
                                                <td>4</td>
                                                <td>No. Inven.(NUP)</td>
                                                <td>: {{$data->nup}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Tahun</td>
                                                <td>: {{$data->tahun}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Bidang</td>
                                                <td>: {{$data->bidang}}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Jenis Pemeliharaan</td>
                                                <td>: {{$data->pemeliharaan}}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Sifat</td>
                                                <td>: {{$data->sifat}}</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Jenis Kerusakan</td>
                                                <td>: {{$data->jenis}}</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 
                            <div class="card m-b-20">
                                <div class="card-status card-status-left 
                                    @if($data->status==0)
                                    bg-danger
                                    @elseif($data->status==1)
                                    bg-warning
                                    @elseif($data->status==2)
                                    bg-success    
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Gambar</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($data -> image != null)
                                    <img alt="image" style="width: 400px;" src="/storage/siyapp/{{$data -> image}}">
                                    @endif
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-status card-status-left 
                                @if($data->status==0)
                                bg-danger
                                @elseif($data->status==1)
                                bg-warning
                                @elseif($data->status==2)
                                bg-success    
                                @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Detail Perbaikan</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">  
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">    
                                        <tbody>
                                            <tr>
                                                <td>10</td>
                                                <td>Tindakan Awal</td>
                                                <td>: {{$data->tindak_awal}}</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Tindak Lanjut</td>
                                                <td>: {{$data->tindak_lanjut}}</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Uji Fungsi</td>
                                                <td>: {{$data->uji}}</td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Tanggal Selesai</td>
                                                <td>: {{$data->tgl_selesai}}</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>Ket</td>
                                                <td>: {{$data->ket}}</td>
                                            </tr>
                                         
                                        </tbody>
                                    </table>
                                </div><p>
                            </div>
                        </div> 
                        <p>
                        <table>
                            <tr>
                                <td>
                                
                                <!-- menu infokom -->
                                @if(Auth::user()->is_permission==2 or Auth::user()->is_permission==1 or Auth::user()->is_permission==15)
                                    @if($data->status==0)
                                    <form  method="post"  action="/konfirmasi-siyapp/{{ $data->id }}" class="d-inline  show_confirm">
                                        @csrf
                                        @method('post')	
                                        <input type="submit" value="Konfirmasi Laporan" class="btn btn-warning my-3 ">
                                    </form>
                                    <!-- <a href="/konfirmasi-siyapp/{{ $data->id }}" class="btn btn-warning my-3 show_confirm">Konfirmasi Laporan</a> -->
                                    @endif
                                    <a href="/laporan/{{ $data->id }}/edit" class="btn btn-info ">Edit Data Perbaikan</a>
                                    <form id="signupForm" method="post"  action="/siyappcetak" class="d-inline" target="new">
                                        @csrf
                                        @method('post')	
                                        <input type="text" value="{{ $data->id }}" name="id" hidden>
                                        <input type="submit" value="Cetak Data" class="btn btn-primary my-3 ">
                                    </form>
                                      
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
	
