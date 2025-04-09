<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Peminjaman</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Peminjaman</li>
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
                                    <h3 class="card-title">Detail  {{ $bmn->jns_bst == '1' ? 'Pengembalian' : 'Peminjaman' }} </h3>
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
                                                <td>Status Rujukan</td>
                                                @if($bmn->status==0)
                                                <td>: <span class="badge rounded-pill bg-secondary">Data Terkirim</span></td>
                                                @elseif($bmn->status==1)
                                                <td>: <span class="badge rounded-pill bg-success">Data Terkonfirmasi</span></td>
                                             
                                                @endif
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Nama Pegawai</td>
                                                <td>: {{$bmn->user->name}}</td>
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
                                <form id="signupForm" method="post" action="/bmn/pinjam-non-bast-approved/{{$bmn ->id}}" > 
                                @csrf
                                @method('put')
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
                                            @if($bmn->status!=0)
                                            <tr>
                                                <td>5</td>
                                                <td>Action</td>
                                                <td>: 
                                                    @if($data->status==2)
                                                     <span class="badge rounded-pill bg-danger">Rejected</span>
                                                    @elseif($data->status==1)
                                                     <span class="badge rounded-pill bg-success">Approved</span>
                                                @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @if(checkPermission(['superadmin','perlengkapan']))
                                                @if($bmn->status==0)
                                                <tr>
                                                    <td>5</td>
                                                    <td>Action</td>
                                                    <td>: 
                                                        <input type="text" name="id_barang[{{$index}}]" value="{{$data->barang->id}}" hidden>
                                                        <input type="text" name="nm_barang[{{$index}}]" value="{{$data->barang->nm_barang}}" hidden>
                                                        <select name="sts[{{$index}}]" id="sts"  class="form-control form-select select2" style="width: 150px;">		
                                                            <option value="1" >Approve</option>
                                                            <option value="2">Reject</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                @endif
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
                                
                                    @if(checkPermission(['superadmin','perlengkapan']))
                                        @if($bmn->status==0)
                                            <button type="submit" class="btn btn-success" style="width:150px;"><i class="fa fa-check me-2"></i>Konfirmasi</button>
                                            <!-- <a href="" class="btn btn-success show_confirm"><i class="fa fa-check me-2"></i>Konfirmasi</a> -->
                                            <!--<a href="/bmn/pinjam-non-bast-reject/{{$bmn ->id}}" class="btn btn-danger show_confirm_tolak"><i class="fa fa-close me-2"></i>Tolak</a>-->
                                        @endif 
                                       
                                    @endif
                                </td>
                            </tr>
                        </table>
                        </form>
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
    $('.show_confirm_tolak').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Tolak Laporan permintaan peminjaman barang Non BAST ?`,
                 text: "User akan menerima notifikasi bahwa laporan ini telah ditolak.",
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
	
