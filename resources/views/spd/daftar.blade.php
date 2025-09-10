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
                            <li class="breadcrumb-item active" aria-current="page">View SPPD</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
                    <x-notify />
                    <div class="col-lg-12">
                          <!-- ROW OPEN -->
        				<div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                            <div class="col-md-12">
                                <center>
                                <img style="align-items: center;" src="{{ asset('vendor/images/media/sppd.png') }}">
                                </center>
                            </div>
                        </div>
						<div class="card">
							<div class="card-header bg-info">
								<h3 class="card-title">Filter Data</h3>
                                <div class="card-options ">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x text-white"></i></a>
                                </div>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/sppd-filter" >
									@csrf
									@method('post')		
									
                                    <div class="form-group m-0">
                                            <div class="row ">
                                                <div class="col-5">
                                                        <select name="bulan" class="form-control form-select select2" data-bs-placeholder="Select Month">
                                                            <option label="Select Month">Pilih Bulan</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">Nopember</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                </div>
                                                <div class="col-5">
                                                        <select name="tahun" class="form-control form-select select2" data-bs-placeholder="Select Year">
                                                            <option label="Select Month">Pilih Tahun</option>
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')}}">{{ Carbon\Carbon::now()->format('Y')}}</option>
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')-1}}">{{ Carbon\Carbon::now()->format('Y')-1}}</option>
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')-2}}">{{ Carbon\Carbon::now()->format('Y')-2}}</option>
                                                        </select>
                                                </div>
                                                <div class="col-2">
                                                <button type="submit" class="btn btn-info" style="width:160px;">Filter Data</button>
                                                </div>
                                            </div>
                                        </div>
									<p>
									
								</form><!-- End Multi Columns Form -->
							</div>
						</div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h3 class="card-title">View Online SPPD Internal Pegawai BBPOM Makassar</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Index</th>
                                                <th class="border-bottom-0">Nama Pegawai</th>
                                                <th class="border-bottom-0">Tempat Berangkat</th>
                                                <th class="border-bottom-0">Tempat Tujuan</th>
                                                <th class="border-bottom-0">Tanggal Berangkat</th>
                                                <th class="border-bottom-0">Tanggal Kembali</th>
                                                <th class="border-bottom-0">Status SPPD</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{ $item -> userdata->name }}</td>
                                                <td>{{$item -> asal}}</td>
                                                <td>{{$item -> tujuan}}</td>
                                               
                                                <td>{{$item -> tgl_berangkat}}</td>
                                                <td>{{$item -> tgl_kembali}}</td>
                                                <td>
                                                    @if($item -> status == 1)
                                                    <span class="badge rounded-pill bg-primary">Data Tersimpan</span></td>
                                                    @elseif($item -> status == 2)
                                                    <span class="badge rounded-pill bg-secondary">Data Terkirim</span></td>
                                                    @elseif($item -> status == 3)
                                                    <span class="badge rounded-pill bg-success">Data Terkonfirmasi</span></td>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/sppd-detail/{{$item ->id}}" class="btn btn-success btn-sm"><i class="fa fa-eye me-2"></i>Detail</a>
                                                    @if($item -> status == 1)
                                                    <a href="/sppd-edit/{{$item ->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit me-2"></i>Edit</a>
                                                    <!-- <a href="/sppd-kirim/{{$item ->id}}" class="btn btn-secondary btn-sm confirm_send"><i class="fa fa-send me-2"></i>Kirim Data</a> -->
                                                    <form method="POST" action="/sppd-kirim/{{$item ->id}}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-secondary btn-sm confirm_send"><i class="fa fa-send me-2"></i>Kirim</button>
                                                    </form>
                                                    <form method="POST" action="/sppd-delete/{{ $item->id }}" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-trash me-2"></i>Delete</button>
                                                    </form>
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
                    <a href="/sppd-formulir"><button type="button" class="btn btn-secondary"><i class="fe fe-plus me-2"></i>Tambah Data Pegawai Internal</button></a>
                    <p>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="card-title">View Online SPPD External</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Index</th>
                                                <th class="border-bottom-0">Nama Pegawai</th>
                                                <th class="border-bottom-0">Tempat Berangkat</th>
                                                <th class="border-bottom-0">Tempat Tujuan</th>
                                                <th class="border-bottom-0">Tanggal Berangkat</th>
                                                <th class="border-bottom-0">Tanggal Kembali</th>
                                                <th class="border-bottom-0">Status SPPD</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data2 as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{ $item -> user_data }}</td>
                                                <td>{{$item -> asal}}</td>
                                                <td>{{$item -> tujuan}}</td>
                                               
                                                <td>{{$item -> tgl_berangkat}}</td>
                                                <td>{{$item -> tgl_kembali}}</td>
                                                <td>
                                                    @if($item -> status == 1)
                                                    <span class="badge rounded-pill bg-primary">Data Tersimpan</span></td>
                                                    @elseif($item -> status == 2)
                                                    <span class="badge rounded-pill bg-secondary">Data Terkirim</span></td>
                                                    @elseif($item -> status == 3)
                                                    <span class="badge rounded-pill bg-success">Data Terkonfirmasi</span></td>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/sppd-detail-external/{{$item ->id}}" class="btn btn-success btn-sm"><i class="fa fa-eye me-2"></i>Detail</a>
                                                    @if($item -> status == 1)
                                                    <a href="/sppd-edit-external/{{$item ->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit me-2"></i>Edit</a>
                                                    <!-- <a href="/sppd-kirim/{{$item ->id}}" class="btn btn-secondary btn-sm confirm_send"><i class="fa fa-send me-2"></i>Kirim Data</a> -->
                                                    <form method="POST" action="/sppd-kirim-external/{{$item ->id}}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-secondary btn-sm confirm_send"><i class="fa fa-send me-2"></i>Kirim</button>
                                                    </form>
                                                    <form method="POST" action="/sppd-delete-external/{{ $item->id }}" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-trash me-2"></i>Delete</button>
                                                    </form>
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
               
                <a href="/sppd-formulir-external"><button type="button" class="btn btn-success"><i class="fe fe-plus me-2"></i>Tambah Data External</button></a>
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
    
    setTimeout(function() {
                document.getElementById('success').style.display = 'none';
            }, 4000); // <-- time in milliseconds
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Anda yakin ingin menghapus data ini ?`,
                text: "Data akan hilang dari database !",
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

        $('.confirm_send').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Anda yakin ingin mengirim data ini ?`,
            text: "Setelah data terkirim, data tidak dapat diedit kembali.",
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
