<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Data Operasional Pengujian</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Sinonim</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Operasional Pengujian View</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
                    @if (session() -> has('succes'))
                        <div class="card-body text-center" id="success"> 
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                            <h4 class="h4 mb-0 mt-3">Success</h4>
                            <p class="card-text">{{ session() -> get('succes')}}</p>
                        </div>
                    @endif 
                    @if (session() -> has('unsuccess'))
						<div class="card-body text-center" id="unsuccess"> 
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Gagal</h4>
							<p class="card-text">{{ session() -> get('unsuccess')}}</p>
						</div>
					@endif 
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Operasional Pengujian</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Index</th>
                                                <th class="border-bottom-0">Nama Operasional Pengujian</th>
                                                <th class="border-bottom-0">Netto</th>
                                                <th class="border-bottom-0" style="color: blue;">Stok</th>
                                                @if(checkPermission(['superadmin','perlengkapan']))
                                                <th class="border-bottom-0">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($opera as $index => $opera)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{$opera -> nama}}</td>
                                                <td>{{$opera -> netto}}</td>   
                                                <td @if($opera -> stok <= 0) style="color: red;"@endif><b>{{$opera -> stok}}</b></td>
                                                @if(checkPermission(['superadmin','perlengkapan']))
                                                <td>
                                                    <div class="btn-list">
                                                    <a href="/operasional/{{$opera -> id}}/detail"><button type="button" style="margin-right: 5px;" class="btn btn-sm btn-secondary"><span  class="fe fe-eye">Detail</span></button></a>&nbsp;
                                                    <a href="/operasional/{{$opera -> id}}/edit"><button type="button" style="margin-right: 5px;" class="btn btn-sm btn-primary"><span  class="fe fe-edit">Edit</span></button></a>
                                                        <form method="POST" action="operasionald/{{ $opera -> id }}" style="display: inline;" >
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><span class="fe fe-trash-2">Delete</span></button>
                                                        </form>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(checkPermission(['superadmin','perlengkapan']))
                <a href="/operasional"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Tambah Operasional</button></a>
                <a href="/opera_formc"><button type="button" class="btn btn-success">Cetak Laporan Akhir Bulanan</button></a>
                @endif
                @if(checkPermission(['superadmin']))
                <a href="/rekap_opera"><button type="button" class="btn btn-warning show_confirm2">Input Stok Akhir Bulanan</button></a>
                @endif
                <p>
            </div>
        </div>
    </div>
     <!-- MODAL EFFECTS -->
     <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Petunjuk Stok Operasional Pengujian</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Tuliskan Nama Operasional Pengujian didalam kolom pencarian (Search box) untuk mempermudah menemukan Stok Operasional Pengujian yang dicari</p>
                </div>
                <div class="modal-footer">
                   <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('vendor/js/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('vendor/js/circle-progress.min.js')}}"></script>

    <!-- C3 CHART JS -->
    <script src="{{ asset('vendor/plugins/charts-c3/d3.v5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/charts-c3/c3-chart.js')}}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('vendor/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>

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

    <script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>


    <script type="text/javascript">
      $(window).on('load', function() {
        $('#modaldemo8').modal('show');
    });
    setTimeout(function() {
        document.getElementById('success').style.display = 'none';
    }, 5000); // <-- time in milliseconds
    setTimeout(function() {
        document.getElementById('unsuccess').style.display = 'none';
    }, 5000); // <-- time in milliseconds
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Anda yakin ingin menghapus data ini ?`,
                text: "Jika anda hapus, Data akan hilang selamanya.",
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
        $('.show_confirm2').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Anda yakin ingin menginput STOK AKHIR BULAN Media Mikrobiologi ?`,
                text: "Data akan tersimpan sebagai STOK akhir bulan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/rekap_opera";
                }
            });
        });
    
    </script>  
</x-HomeLayout>
