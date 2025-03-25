<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Online SPPD BBPOM Di Makassar</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Online SPPD</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail SPPD</li>
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
                                    @if($data->status==1)
                                    bg-primary
                                    @elseif($data->status==2)
                                    bg-secondary
                                    @elseif($data->status==3)
                                    bg-success    
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Detail Formulir SPPD</h3>
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
                                                <td>: {{$data->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Nomor SPPD</td>
                                                <td>: {{$data->no_sppd}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Status Rujukan</td>
                                                @if($data->status==1)
                                                <td>: <span class="badge rounded-pill bg-primary">Data Tersimpan</span></td>
                                                @elseif($data->status==2)
                                                <td>: <span class="badge rounded-pill bg-secondary">Data Terkirim</span></td>
                                                @elseif($data->status==3 )
                                                <td>: <span class="badge rounded-pill bg-success">Data Terkonfirmasi</span></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>User Input</td>
                                                <td>: {{$data->user->name}}</td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-status card-status-left 
                                @if($data->status==1)
                                    bg-primary
                                    @elseif($data->status==2)
                                    bg-secondary
                                    @elseif($data->status==3)
                                    bg-success    
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Detail Perjalanan Dinas</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nama Pegawai</td>
                                                <td>: {{$data->userdata->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Nip</td>
                                                <td>: @if(isset($prof->nip)) {{$prof->nip}} @endif</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Pangkat</td>
                                                <td>: @if(isset($prof->pangkat)) {{$prof->pangkat}} @endif</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Jabatan</td>
                                                <td>: @if(isset($prof->jabatan)) {{$prof->jabatan}} @endif</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Maksud Perjalanan Dinas</td>
                                                <td>: {{$data->maksud}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Tingkat Biaya Perjalanan</td>
                                                <td>
                                                    @if($data->level_biaya == 1)
                                                    : A</td>
                                                    @elseif($data->level_biaya == 2)
                                                    : B</td>
                                                    @elseif($data->level_biaya == 3)
                                                    : C</td>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Moda Transportasi</td>
                                                <td>: {{$data->transport}}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Tempat Berangkat</td>
                                                <td>: {{$data->asal}}</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Tempat Tujuan</td>
                                                <td>: {{$data->tujuan}}</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Tanggal Berangkat</td>
                                                <td>: {{$data->tgl_berangkat}}</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Tanggal Kembali</td>
                                                <td>: {{$data->tgl_kembali}}</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Jumlah Hari Dinas </td>
                                                <td>: {{$data->hari}}  Hari</td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Akun</td>
                                                <td>: {{$data->akun}}</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>Instansi</td>
                                                <td>: {{$data->instansi}}</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>Keterangan Lain-lain</td>
                                                <td>: {{$data->keterangan}}</td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>Tanggal </td>
                                                <td>: {{$data->tgl}}</td>
                                            </tr>
                                           <tr>
                                                <td>17</td>
                                                <td>File Surat Tugas</td>
                                                <td>: <a href="/sppd-download{{$data->file}}"> {{$data->file}}</a></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 
                             @if(isset($data->asal2))
                            <div class="card">
                                <div class="card-status card-status-left 
                                @if($data->status==1)
                                    bg-primary
                                    @elseif($data->status==2)
                                    bg-secondary
                                    @elseif($data->status==3)
                                    bg-success    
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                
                                <div class="card-header">
                                    <h3 class="card-title">Detail Tempat dan Tanggal Berangkat/Kembali Tambahan </h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">  
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">    
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tempat Berangkat</td>
                                                <td>: {{$data->asal2}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tempat Tujuan</td>
                                                <td>: {{$data->tujuan2}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tanggal Berangkat</td>
                                                <td>: {{$data->tgl_berangkat2}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tanggal Kembali</td>
                                                <td>: {{$data->tgl_kembali2}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    @if(isset($data->asal3))
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">    
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tempat Berangkat</td>
                                                <td>: {{$data->asal3}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tempat Tujuan</td>
                                                <td>: {{$data->tujuan3}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tanggal Berangkat</td>
                                                <td>: {{$data->tgl_berangkat3}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tanggal Kembali</td>
                                                <td>: {{$data->tgl_kembali3}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    @endif
                                    @if(isset($data->asal4))
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">    
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tempat Berangkat</td>
                                                <td>: {{$data->asal4}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tempat Tujuan</td>
                                                <td>: {{$data->tujuan4}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tanggal Berangkat</td>
                                                <td>: {{$data->tgl_berangkat4}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tanggal Kembali</td>
                                                <td>: {{$data->tgl_kembali4}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    @endif
                                </div>

                                <p>
                            </div>
                            @endif
                            @if(isset($ikut->nama1))
                            <div class="card">
                                <div class="card-status card-status-left 
                                @if($data->status==1)
                                    bg-primary
                                    @elseif($data->status==2)
                                    bg-secondary
                                    @elseif($data->status==3)
                                    bg-success    
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                
                                <div class="card-header">
                                    <h3 class="card-title">Detail Pengikut (Nama-Tanggal Lahir-Ket)</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">  
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">    
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{$ikut->nama1}}</td>
                                                <td>{{$ikut->tgl1}}</td>
                                                <td>{{$ikut->ket1}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>{{$ikut->nama2}}</td>
                                                <td>{{$ikut->tgl2}}</td>
                                                <td>{{$ikut->ket2}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>{{$ikut->nama3}}</td>
                                                <td>{{$ikut->tgl3}}</td>
                                                <td>{{$ikut->ket3}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>{{$ikut->nama4}}</td>
                                                <td>{{$ikut->tgl4}}</td>
                                                <td>{{$ikut->ket4}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>{{$ikut->nama5}}</td>
                                                <td>{{$ikut->tgl5}}</td>
                                                <td>{{$ikut->ket5}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <p>
                            </div>
                            @endif
                        </div> 
                       
                        <p>
                        <table>
                            <tr>
                                <td>
                                
                                <!-- menu -->
                                
                                    @if($data->status==1)
                                    <a href="/sppd-edit/{{$data ->id}}" class="btn btn-primary "><i class="fa fa-edit me-2"></i>Edit Data</a>
                                    
                                    <form method="POST" action="/sppd-kirim/{{$data ->id}}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary confirm_send"><i class="fa fa-send me-2"></i>Kirim Data</button>
                                    </form>
                                    @endif
                                    @if(checkPermission(['superadmin','admin']))
                                        @if($data->status==2)
                                        <a href="/sppd-approved/{{$data ->id}}" class="btn btn-success "><i class="fa fa-check me-2"></i>Konfirmasi</a>
                                        <a href="/sppd-edit/{{$data ->id}}" class="btn btn-primary "><i class="fa fa-edit me-2"></i>Edit Data</a>    
                                        @endif 
                                        @if($data->status==3)
                                        <a href="/sppd-cetak/{{$data ->id}}" class="btn btn-info"><i class="fa fa-print me-2"></i>Cetak SPPD</a>
                                            @if($data->no_sppd==null)
                                            <a href="/sppd-nomor-add/{{$data ->id}}" class="btn btn-primary"><i class="fa fa-edit me-2"></i>Input Nomor SPPD</a>
                                            @endif
                                            @if($data->no_sppd!=null)
                                            <a href="/sppd-nomor-edit/{{$data ->id}}" class="btn btn-primary"><i class="fa fa-edit me-2"></i>Edit Nomor SPPD</a>
                                            @endif
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
	
