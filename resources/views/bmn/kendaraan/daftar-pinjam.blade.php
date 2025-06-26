<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Daftar Permintaan Peminjaman Kendaraan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Permintaan Peminjaman Kendaraan</li>
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
								<h3 class="card-title">Filter Data</h3>
                                <div class="card-options ">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>
                                    <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x text-white"></i></a>
                                </div>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/bmn/admin/peminjaman-kendaraan/filter" >
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Permintaan Peminjaman Kendaraan</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Index</th>
                                                <th class="border-bottom-0">Nama Pegawai</th>
                                                <th class="border-bottom-0">Kendaraan</th>
                                                <th class="border-bottom-0">Driver</th>
                                                <th class="border-bottom-0">Tujuan</th>
                                                <th class="border-bottom-0">Tanggal Peminjaman</th>
                                                <th class="border-bottom-0">Jam Peminjaman</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">User Input</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($data as $index => $data)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{ $data -> user->name }}</td>
                                                <td>@if(isset($data ->car->nopol)){{ $data ->car->nopol }}-{{$data->car->merek }}-{{$data->car->type}}@else-@endif</td>
                                                <td>@if(isset($data -> driver->nama)){{ $data -> driver->nama}}@else -@endif</td>
                                                <td>{{ $data -> tujuan}}</td>
                                                <td>{{ \Carbon\Carbon::parse($data -> wkt_pinjam)->format('d-m-Y')}}</td>
                                                <td>{{ \Carbon\Carbon::parse($data -> wkt_pinjam)->format('H:i')}}</td>
                                                <td>
                                                    <span class="badge rounded-pill 
                                                                                    @if($data->status == 0) 
                                                                                        bg-warning 
                                                                                    @elseif($data->status == 1) 
                                                                                        bg-success 
                                                                                    @else 
                                                                                        bg-danger 
                                                                                    @endif"> 
                                                                                    @if($data->status == 0) 
                                                                                        Waiting Approval 
                                                                                    @elseif($data->status == 1) 
                                                                                        Approved 
                                                                                    @else 
                                                                                        Rejected 
                                                                                    @endif</span>
                                                </td>
                                                <td>{{ $data -> input->name}}</td>          
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        @if($data->status == 0)
                                                        <!-- Dropdown -->
                                                        <form method="post" action="/bmn/peminjaman-kendaraan-approve/{{$data->id}}" class="inline">
                                                        @csrf
                                                        @method('post')
                                                            <select name="status" 
                                                                    class="form-control form-select form-select-sm select2" 
                                                                    style="width: auto;" 
                                                                    id="status-{{ $data->id }}" 
                                                                    onchange="toggleUpdateButton({{ $data->id }}, this)">
                                                                <option value="aa" selected disabled>Pilih Tindakan ...</option>
                                                                <option value="1">Approve</option>
                                                                <option value="2">Reject</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-primary" id="update-btn-{{ $data->id }}" disabled>Update Status</button>
                                                        </form>
                                                        @endif
                                                        <!-- Tombol Delete -->
                                                        <form method="POST" action="/bmn/peminjaman-kendaraan-delete/{{ $data->id }}" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger show_confirm">
                                                                <i class="fa fa-trash me-2"></i>Delete
                                                            </button>
                                                        </form>
                                                    </div>
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
        function toggleUpdateButton(rowId, selectElement) {
        const updateButton = document.getElementById(`update-btn-${rowId}`);
        // Jika opsi selain default dipilih, aktifkan tombol
        if (selectElement.value !== "aa") {
            updateButton.disabled = false;
        } else {
            updateButton.disabled = true;
        }
    }

    </script>  
</x-HomeLayout>
