<x-HomeLayout>  
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Data Rujukan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Rujukan View</li>
                        </ol>
                    </div>
                </div>
                <div class="row row-sm">
                @if (session() -> has('succes'))
                        <div class="card-body text-center" id="success"> 
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                            <h4 class="h4 mb-0 mt-3">Success</h4>
                            <p class="card-text">{{ session() -> get('succes')}}</p>
                        </div>
                @endif 
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Rujukan</h3>
                            </div>
                            @if (Auth::user()->is_permission==1 or Auth::user()->is_permission==5) 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal Terima</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Petugas Input</th>
                                                <th scope="col">Status</th>
                                                @if(checkPermission(['superadmin','infokom']))
                                                <th scope="col">Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rujuk as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                     <td>{{$item->tgl_terima}}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{  $item->email }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    @if($item->status==0)
                                                    <td> <span class="badge rounded-pill bg-secondary">Data Belum Terkirim</span></td>
                                                    @elseif($item->status==1)
                                                    <td><span class="badge rounded-pill bg-warning">Data Terkirim</span></td>
                                                    @elseif($item->status==2)
                                                    <td><span class="badge rounded-pill bg-primary">Data Terkonfirmasi</span></td>
                                                    @elseif($item->status==3)
                                                    <td><span class="badge rounded-pill bg-success">Data Selesai diolah</span></td>
                                                    @elseif($item->status==4)
                                                    <td><span class="badge rounded-pill bg-danger">Data Dikembalikan</span></td>
                                                    @endif
                                                    @if(checkPermission(['superadmin','infokom']))
                                                    <td>
                                                        @if(checkPermission(['superadmin','infokom']))                             
                                                        <a href="/rujukan/{{ $item->id }}/detail" class="btn btn-success btn-sm">Detail Info</a>                                            
                                                            @if(checkPermission(['superadmin']))
                                                            <form method="POST" action="/rujukan/{{ $item->id }}/delete" class="d-inline">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm show_confirm">
                                                            </form>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach   
                                        </tbody>
                                    </table>                       
                                </div>
                            </div>
                            @endif
                            @if (Auth::user()->is_permission==7 or Auth::user()->is_permission==8 or Auth::user()->is_permission==9 or Auth::user()->is_permission==10) 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal Pengiriman</th>
                                                <th scope="col">Action</th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rujuk as $key => $item)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ date('d M Y',strtotime($item->created_at))}}</td>
                                                    <td>
                                                        <a href="/rujukan/{{ $item->rujukan_id }}/detail" class="btn btn-success btn-sm">Detail Info</a>                                            
                                                    </td>
                                                </tr>
                                            @endforeach   
                                        </tbody>
                                    </table>                       
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div> 
                @if (Auth::user()->is_permission==1 or Auth::user()->is_permission==5) 
                <a href="/formrujukan" class="btn btn-primary my-3">Tambah Data</a>
                @endif
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