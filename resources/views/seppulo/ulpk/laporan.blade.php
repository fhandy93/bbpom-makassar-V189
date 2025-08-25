<x-HomeLayout>  
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Data Laporan Konsumen ULPK {{$v}}</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Data Konsumen View</li>
                        </ol>
                    </div>
                </div>
                <div class="row row-sm">
               <x-notify />
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
								<form id="signupForm" method="post" class="form-horizontal" action="/ulpk/{{$v}}/filter" >
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
                                                            <option value="{{ Carbon\Carbon::now()->format('Y')-3}}">{{ Carbon\Carbon::now()->format('Y')-3}}</option>
                                                            
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
                                <h3 class="card-title">Laporan Data Konsumen ULPK {{$v}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal Lapor</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Umur</th>
                                                <th scope="col">Kelamin</th>
                                                <th scope="col">Jenis Layanan</th>
                                                @if(checkPermission(['superadmin','infokom','picinfokom','sertifikasi','picsertifikasi']))
                                                <th scope="col">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($konsumen as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $item->tgl_lapor }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->umur }}</td>
                                                    <td>{{  $item->kelamin }}</td>
                                                    <td>{{ $item->jenis }}</td>
                                                    @if(checkPermission(['superadmin','infokom','picinfokom','sertifikasi','picsertifikasi']))
                                                    <td>
                                                        @if(checkPermission(['superadmin','infokom','picinfokom','sertifikasi','picsertifikasi'])) 
                                                        <a href="/ulpk/{{$v}}/{{ $item->id }}/detail" class="btn btn-success btn-sm">Detail Info</a>
                                                        <form method="POST" action="/ulpk/{{ $item->id }}/delete" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm show_confirm">
                                                        </form>
                                                       @endif
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
                <a href="/ulpk/formulir-ulpk" class="btn btn-primary my-3">Tambah Data</a>
            </div>
        </div>
    </div>
   <!-- JQUERY JS -->
   <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('vendor/js/jquery.sparkline.min.js')}}"></script>

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
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
    
</x-HomeLayout>