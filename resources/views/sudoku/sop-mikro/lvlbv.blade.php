<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Data File SOP Mikro</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SUDOKU</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Level C</li>
                            <li class="breadcrumb-item active" aria-current="page">SOP Mikro</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">SOP Mikro (Induk: {{$lvla}})</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Kode SOP Mikro</th>
                                                <th class="border-bottom-0">Judul SOP Mikro</th>
                                                <th class="border-bottom-0">File Priview</th>
                                                <th class="border-bottom-0">Tanggal Terbit</th>
                                                <th class="border-bottom-0">Revisi</th>
                                                <th class="border-bottom-0">Waktu</th>
                                                <th class="border-bottom-0">User Input</th>
                                                <th class="border-bottom-0">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($lvlb as $index => $item)
                                            <tr>
                                                <td>{{$item -> kode_mikro}}</td>
                                                <td>{{$item -> judul_sop }}</td>
                                                <td>
                                                    <form method="POST" action="/sop-mikro-view/{{$item -> id}}"  >
                                                        @csrf
                                                         <button type="submit" class="btn btn-sm btn-success" data-toggle="tooltip" title='Preview'><span class="fe fe-eye"> Priview File</span></button>
                                                    </form>
                                                </td>
                                                <td>{{ $item->mikroDet->map(fn($d) => \Carbon\Carbon::createFromFormat('d/m/Y', $d->tgl_terbit))->max()->format('d/m/Y') }}</td>
                                                <td>{{$item -> mikroDet -> max('revisi') }}</td>
                                                <td>Aktif Berlaku
                                                </td>
                                                <td>{{$item -> user->username }}</td> 
                                                <td>
                                                    <div class="btn-list">
                                                        <a href="/detail-revisi/{{$item -> id}}"><button type="button" style="margin-right: 5px;" class="btn btn-sm btn-secondary" data-toggle="tooltip" title='Detail'><span  class="fe fe-align-justify"> Detail Revisi</span></button></a>&nbsp;
                                                        <a href="/edit-sop-mikro/{{$item -> id}}"><button type="button" style="margin-right: 5px;" class="btn btn-sm btn-info" data-toggle="tooltip" title='Edit'><span  class="fe fe-edit"> Edit Data</span></button></a>&nbsp;
                                                        @if(checkPermission(['superadmin','laboratorium']))
                                                        <form method="POST" action="/mikro/{{ $item -> id }}/delete" style="display: inline;" >
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><span class="fe fe-trash-2"> Delete</span></button>
                                                        </form>
                                                        @endif
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
                @if(checkPermission(['superadmin','laboratorium']))
                <a href="/detail-mikro-input/{{$lvla}}"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i>Tambah SOP Mikro</button></a>
                @endif
                <p>
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
        
    
    </script>  
</x-HomeLayout>
