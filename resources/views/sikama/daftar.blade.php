<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Daftar Izin</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIKAMA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Izin</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
                    @if (session() -> has('success'))
                        <div class="card-body text-center" id="success"> 
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                            <h4 class="h4 mb-0 mt-3">Success</h4>
                            <p class="card-text">{{ session() -> get('success')}}</p>
                        </div>
                    @endif 
                    @if (session() -> has('warning'))
                        <div class="card-body text-center" id="success"> 
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#fad383" d="M15.728,22H8.272a1.00014,1.00014,0,0,1-.707-.293l-5.272-5.272A1.00014,1.00014,0,0,1,2,15.728V8.272a1.00014,1.00014,0,0,1,.293-.707l5.272-5.272A1.00014,1.00014,0,0,1,8.272,2H15.728a1.00014,1.00014,0,0,1,.707.293l5.272,5.272A1.00014,1.00014,0,0,1,22,8.272V15.728a1.00014,1.00014,0,0,1-.293.707l-5.272,5.272A1.00014,1.00014,0,0,1,15.728,22Z"/><circle cx="12" cy="16" r="1" fill="#f7b731"/><path fill="#f7b731" d="M12,13a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v4A1,1,0,0,1,12,13Z"/></svg></span>
                            <h4 class="h4 mb-0 mt-3">Warning</h4>
                            <p class="card-text">{{ session() -> get('warning')}}</p>
                        </div>
                    @endif 
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Izin Pegawai</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Index</th>
                                                <th class="border-bottom-0">Nama Pegawai</th>
                                                <th class="border-bottom-0">Tanggal Izin</th>
                                                <th class="border-bottom-0">Jam Izin</th>
                                                <th class="border-bottom-0">Status Izin</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($izin as $index => $izin)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{ $izin -> user->name }}</td>
                                                <td>{{$izin -> tgl_izin}}</td>
                                                <td>{{$izin -> jam}}</td>
                                                <td>
                                                    @if($izin -> status == 1)
                                                    <span class="badge rounded-pill bg-secondary">Izin Terkirim</span></td>
                                                    @elseif($izin -> status == 2)
                                                    <span class="badge rounded-pill bg-info">Izin Diterima</span></td>
                                                    @elseif($izin -> status == 3)
                                                    <span class="badge rounded-pill bg-danger">Izin Ditolak</span></td>
                                                    @elseif($izin -> status == 4)
                                                    <span class="badge rounded-pill bg-warning">Izin Expired</span></td>
                                                    @elseif($izin -> status == 5)
                                                    <span class="badge rounded-pill bg-success">Izin Selesai</span></td>
                                                    @endif
                                                </td>
                                                <td>
                                                    
                                                    <a href="/detail-izin-sikama/{{$izin ->id}}" class="btn btn-success btn-sm"><i class="fa fa-eye me-2"></i>Detail Izin</a>
                                                    @if($izin -> status == 2 || $izin -> status == 5 && $izin ->user_id == Auth::user()->name)
                                                    <!--<a href="/detail-izin-sikama/{{$izin ->id}}" class="btn btn-primary btn-sm"><i class="fa fa-check me-2"></i>Selesaikan Izin</a>-->
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/formizin"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Buat laporan izin</button></a>
            </div>
        </div>
    </div>
    @if(isset($confirm->id))
     <!-- MODAL EFFECTS -->
     <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" style="color: yellow;">Izin tidak terkonfirmasi</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Waktu konfirmasi izin terakhir anda dengan tujuan <u>{{$confirm -> keperluan}}</u> telah lewat dari 5 Menit, Ingin mengubah izin anda menjadi izin khusus yang ditujukan kepada <u>Kepala Bagian Tata Usaha pada Balai Besar POM di Makassar ?</u></p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="/editizin/{{$confirm -> id}}" >
                    @csrf
					@method('put')
                    <input type="text" value="{{ Auth::user()->name }}" name="nama" hidden>
                    <input type="text" value="{{ $izin->jam }}" name="jam" hidden>
                    <input type="text" value="{{ $izin->keperluan }}" name="perlu" hidden>
                    <input type="text" value="{{ $izin->tgl_izin }}" name="tgl" hidden>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                    <button class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
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

    
    @if(isset($confirm->id))
    @if((strtotime(\Carbon\Carbon::now())-strtotime($confirm -> updated_at))>300)
    <script type="text/javascript">
      $(window).on('load', function() {
        $('#modaldemo8').modal('show');
    });
    </script>    
    @endif
    @endif

    <script type="text/javascript">
    
    setTimeout(function() {
                document.getElementById('success').style.display = 'none';
            }, 4000); // <-- time in milliseconds
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
    
        </script>  
</x-HomeLayout>
