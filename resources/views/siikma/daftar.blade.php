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
                    <x-notify />
                    <div class="col-lg-12">
                       <div class="card">
							<div class="card-header ">
								<h3 class="card-title">Filter Data</h3>
                                <div class="card-options ">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x text-white"></i></a>
                                </div>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/siikma/daftar-izin/filter" >
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
                                                <button type="submit" class="btn btn-primary" style="width:160px;">Filter Data</button>
                                                </div>
                                            </div>
                                        </div>
									<p>
									
								</form><!-- End Multi Columns Form -->
							</div>
						</div>
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
                                                <td>{{$izin -> jam1}} - {{$izin -> jam2}}</td>
                                                <td>
                                                    @if($izin -> status == 1)
                                                    <span class="badge rounded-pill bg-info">Izin Diterima</span></td>
                                                    @elseif($izin -> status == 2)
                                                    <span class="badge rounded-pill bg-success">Izin Selesai</span></td>
                                                    @endif
                                                </td>
                                                <td>
                                                    
                                                    <a href="/siikma/detail-izin/{{$izin ->id}}" class="btn btn-success btn-sm"><i class="fa fa-eye me-2"></i>Detail Izin</a>
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
                <a href="/siikma/formulir"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Buat laporan izin</button></a>
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
