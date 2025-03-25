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
                    <p>
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
								<form id="signupForm" method="post" class="form-horizontal" action="/sppd-filter-admin" >
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
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')-1}}">{{ Carbon\Carbon::now()->format('Y')-2}}</option>
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
                                                <th class="border-bottom-0">Tingkat Biaya Perjalanan</th>
                                                <th class="border-bottom-0">Moda Transportasi</th>
                                                <th class="border-bottom-0">Tempat Berangkat</th>
                                                <th class="border-bottom-0">Tempat Tujuan</th>
                                                <th class="border-bottom-0">Tanggal Berangkat</th>
                                                <th class="border-bottom-0">Tanggal Kembali</th>
                                                <th class="border-bottom-0">Akun</th>
                                                <th class="border-bottom-0">Keterangan Lain</th>
                                                <th class="border-bottom-0">Status SPPD</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{ $item -> userdata->name }}</td>
                                                <td>
                                                    @if($item->level_biaya == 1)
                                                    A</td>
                                                    @elseif($item->level_biaya == 2)
                                                    B</td>
                                                    @elseif($item->level_biaya == 3)
                                                    C</td>
                                                    @endif
                                                </td>
                                                <td>{{$item -> transport}}</td>
                                                <td>{{$item -> asal}}</td>
                                                <td>{{$item -> tujuan}}</td>
                                                <td>{{$item -> tgl_berangkat}}</td>
                                                <td>{{$item -> tgl_kembali}}</td>
                                                <td>{{$item -> akun}}</td>
                                                <td>{{$item -> keterangan}}</td>
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
                                                    <a href="/sppd-edit/{{$item ->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit me-2"></i>Edit</a>
                                                    <!-- <a href="/sppd-kirim/{{$item ->id}}" class="btn btn-secondary btn-sm confirm_send"><i class="fa fa-send me-2"></i>Kirim Data</a> -->
                                                    <form method="POST" action="/sppd-delete/{{ $item->id }}/admin" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-trash me-2"></i>Delete</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <th class="border-bottom-0">Tingkat Biaya Perjalanan</th>
                                                <th class="border-bottom-0">Moda Transportasi</th>
                                                <th class="border-bottom-0">Tempat Berangkat</th>
                                                <th class="border-bottom-0">Tempat Tujuan</th>
                                                <th class="border-bottom-0">Tanggal Berangkat</th>
                                                <th class="border-bottom-0">Tanggal Kembali</th>
                                                <th class="border-bottom-0">Akun</th>
                                                <th class="border-bottom-0">Keterangan Lain</th>
                                                <th class="border-bottom-0">Status SPPD</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data2 as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{ $item -> user_data }}</td>
                                                <td>
                                                    @if($item->level_biaya == 1)
                                                    A</td>
                                                    @elseif($item->level_biaya == 2)
                                                    B</td>
                                                    @elseif($item->level_biaya == 3)
                                                    C</td>
                                                    @endif
                                                </td>
                                                <td>{{$item -> transport}}</td>
                                                <td>{{$item -> asal}}</td>
                                                <td>{{$item -> tujuan}}</td>
                                                <td>{{$item -> tgl_berangkat}}</td>
                                                <td>{{$item -> tgl_kembali}}</td>
                                                <td>{{$item -> akun}}</td>
                                                <td>{{$item -> keterangan}}</td>
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
                                                    <a href="/sppd-edit-external/{{$item ->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit me-2"></i>Edit</a>
                                                    <!-- <a href="/sppd-kirim/{{$item ->id}}" class="btn btn-secondary btn-sm confirm_send"><i class="fa fa-send me-2"></i>Kirim Data</a> -->
                                                    <form method="POST" action="/sppd-delete-external/{{ $item->id }}/admin" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm show_confirm"><i class="fa fa-trash me-2"></i>Delete</button>
                                                    </form>
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
