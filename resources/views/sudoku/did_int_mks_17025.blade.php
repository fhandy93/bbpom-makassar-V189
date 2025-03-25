<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;

}

</style>
<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Daftar Induk Dokumen (DID) Internal BBPOM Makassar 17025</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SUDOKU</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DID Internal 17025</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" >
                                <h3 class="card-title">Level D (PJML) -> Level E (Instruksi Kerja) -> Dok. Pendukung</h3>
                            </div>
                            <div class="card-body"  style="overflow-x:auto;">
                                <table class="table-bordered" >
                                    <thead>
                                        <tr>
                                            <th style="width: 70px; padding: 5px;" class="text-danger">Kode PJML</th>
                                            <th style="width: 350px; padding: 5px;" class="text-danger">Judul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lvlapjml as $index => $item1)
                                        <tr>
                                            <td style="padding: 5px;">{{$item1 -> mutu_kode}}</td>
                                            <td style="padding: 5px;">{{$item1 -> judul}}</td>
                                            <td>
                                                <table class="table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 70px; padding: 5px;" class="text-warning">Kode Instruksi</th>
                                                            <th style="width: 350px; padding: 5px;" class="text-warning">Judul</th>
                                                            <th style=" padding: 5px;" class="text-warning">Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($lvlbint as $index => $item2)
                                                        <tr>
                                                            @if($item2->mutu_kode == $item1->mutu_kode)
                                                            <td style="padding: 5px;">{{$item2 -> instrumen_kode}}</td>
                                                            <td style="padding: 5px;">{{$item2 -> judul_sop}}</td>
                                                            <td>
                                                                <table class="">
                                                                    @foreach($lvlcint as $index => $item3)
                                                                    <tr style="width: 170px; padding: 5px;">
                                                                        @if($item3->instrumen_kode == $item2->id)
                                                                        <td style="width: 100px; padding: 5px;">{{$item3->tgl_terbit}}</td>
                                                                        <td style="width: 100px; padding: 5px;">{{$item3->revisi}}</td>
                                                                        <td style="width: 100px; padding: 5px;">
                                                                            @if($item3 -> waktu==1)
                                                                            Aktif Berlaku
                                                                            @elseif($item3 -> waktu==2)
                                                                            Aktif Tidak Berlaku
                                                                            @else
                                                                            Inaktif
                                                                            @endif
                                                                        </td>
                                                                        
                                                                        @endif
                                                                    </tr>
                                                                    @endforeach    
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table class="">
                                                                    <tr>
                                                                        <th style=" padding: 5px;" class="text-success">Kode Formulir</th>
                                                                        <th style=" padding: 5px;" class="text-success">Judul</th>
                                                                        <th style=" padding: 5px;" class="text-success">Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                                    </tr>
                                                                    @foreach($lvldf as $index => $item4)
                                                                        @if($item4->induk_kode == $item2 -> instrumen_kode)
                                                                        <tr >
                                                                            <td style="width: 70px; padding: 5px;">{{$item4->formulir_kode}}</td>
                                                                            <td style="width: 200px; padding: 5px;">{{$item4->judul_sop}}</td>
                                                                            <td>
                                                                                <table class="">
                                                                                    @foreach($lvlef as $index => $item5)
                                                                                    <tr style="width: 170px; padding: 5px;">
                                                                                        @if($item5->formulir_kode == $item4->id)
                                                                                        <td style="width: 100px; padding: 5px;">{{$item5->tgl_terbit}}</td>
                                                                                        <td style="width: 100px; padding: 5px;">{{$item5->revisi}}</td>
                                                                                        <td style="width: 100px; padding: 5px;">
                                                                                            @if($item5 -> waktu==1)
                                                                                            Aktif Berlaku
                                                                                            @elseif($item5 -> waktu==2)
                                                                                            Aktif Tidak Berlaku
                                                                                            @else
                                                                                            Inaktif
                                                                                            @endif
                                                                                        </td>
                                                                                        
                                                                                        @endif
                                                                                    </tr>
                                                                                    @endforeach    
                                                                                </table>
                                                                            </td>                                                                                            
                                                                        </tr>
                                                                        @endif
                                                                    @endforeach    
                                                                </table>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table class="">
                                                @foreach($lvldf as $index => $item4)
                                                        @if($item4->induk_kode == $item1 -> mutu_kode)
                                                    <tr>
                                                        <th style=" padding: 5px;" class="text-success">Kode Formulir</th>
                                                        <th style=" padding: 5px;" class="text-success">Judul</th>
                                                        <th style=" padding: 5px;" class="text-success">Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                    </tr>
                                                    
                                                        <tr >
                                                            <td style="width: 70px; padding: 5px;">{{$item4->formulir_kode}}</td>
                                                            <td style="width: 200px; padding: 5px;">{{$item4->judul_sop}}</td>
                                                            <td>
                                                                <table class="">
                                                                    <tr>
                                                                    
                                                                        
                                                                    </tr>
                                                                    @foreach($lvlef as $index => $item5)
                                                                    <tr style="width: 170px; padding: 5px;">
                                                                        @if($item5->formulir_kode == $item4->id)
                                                                        <td style="width: 100px; padding: 5px;">{{$item5->tgl_terbit}}</td>
                                                                        <td style="width: 100px; padding: 5px;">{{$item5->revisi}}</td>
                                                                        <td style="width: 100px; padding: 5px;">
                                                                            @if($item5 -> waktu==1)
                                                                            Aktif Berlaku
                                                                            @elseif($item5 -> waktu==2)
                                                                            Aktif Tidak Berlaku
                                                                            @else
                                                                            Inaktif
                                                                            @endif
                                                                        </td>
                                                                        
                                                                        @endif
                                                                    </tr>
                                                                    @endforeach    
                                                                </table>
                                                            </td>                                                                                              
                                                        </tr>
                                                        @endif
                                                    @endforeach    
                                                </table>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- @foreach($lvlaptl as $index => $item2)
                                        <tr>
                                            <td style="padding: 5px;">{{$item2 -> ptl_kode}}</td>
                                            <td style="padding: 5px;">{{$item2 -> judul}}</td>
                                          
                                        </tr>
                                        @endforeach -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" >
                                <h3 class="card-title">Level A (PTL) -> Level E (Instruksi Kerja) -> Dok. Pendukung</h3>
                            </div>
                            <div class="card-body"  style="overflow-x:auto;">
                                <table class="table-bordered" >
                                    <thead>
                                        <tr>
                                            <th style="width: 70px; padding: 5px;" class="text-danger">Kode PTL</th>
                                            <th style="width: 350px; padding: 5px;" class="text-danger">Judul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lvlaptl as $index => $item1)
                                        <tr>
                                            <td style="padding: 5px;">{{$item1 -> ptl_kode}}</td>
                                            <td style="padding: 5px;">{{$item1 -> judul}}</td>
                                            <td>
                                                <table class="table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 70px; padding: 5px;" class="text-warning">Kode Instruksi</th>
                                                            <th style="width: 350px; padding: 5px;" class="text-warning">Judul</th>
                                                            <th style=" padding: 5px;" class="text-warning">Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($lvlbint as $index => $item2)
                                                        <tr>
                                                            @if($item2->mutu_kode == $item1->ptl_kode)
                                                            <td style="padding: 5px;">{{$item2 -> instrumen_kode}}</td>
                                                            <td style="padding: 5px;">{{$item2 -> judul_sop}}</td>
                                                            <td>
                                                                <table class="">
                                                                    @foreach($lvlcint as $index => $item3)
                                                                    <tr style="width: 170px; padding: 5px;">
                                                                        @if($item3->instrumen_kode == $item2->id)
                                                                        <td style="width: 100px; padding: 5px;">{{$item3->tgl_terbit}}</td>
                                                                        <td style="width: 100px; padding: 5px;">{{$item3->revisi}}</td>
                                                                        <td style="width: 100px; padding: 5px;">
                                                                            @if($item3 -> waktu==1)
                                                                            Aktif Berlaku
                                                                            @elseif($item3 -> waktu==2)
                                                                            Aktif Tidak Berlaku
                                                                            @else
                                                                            Inaktif
                                                                            @endif
                                                                        </td>
                                                                        
                                                                        @endif
                                                                    </tr>
                                                                    @endforeach    
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <table class="">
                                                                    <tr>
                                                                        <th style=" padding: 5px;" class="text-success">Kode Formulir</th>
                                                                        <th style=" padding: 5px;" class="text-success">Judul</th>
                                                                        <th style=" padding: 5px;" class="text-success">Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                                    </tr>
                                                                    @foreach($lvldf as $index => $item4)
                                                                        @if($item4->induk_kode == $item2 -> instrumen_kode)
                                                                        <tr >
                                                                            <td style="width: 70px; padding: 5px;">{{$item4->formulir_kode}}</td>
                                                                            <td style="width: 200px; padding: 5px;">{{$item4->judul_sop}}</td>
                                                                            <td>
                                                                                <table class="">
                                                                                    @foreach($lvlef as $index => $item5)
                                                                                    <tr style="width: 170px; padding: 5px;">
                                                                                        @if($item5->formulir_kode == $item4->id)
                                                                                        <td style="width: 100px; padding: 5px;">{{$item5->tgl_terbit}}</td>
                                                                                        <td style="width: 100px; padding: 5px;">{{$item5->revisi}}</td>
                                                                                        <td style="width: 100px; padding: 5px;">
                                                                                            @if($item5 -> waktu==1)
                                                                                            Aktif Berlaku
                                                                                            @elseif($item5 -> waktu==2)
                                                                                            Aktif Tidak Berlaku
                                                                                            @else
                                                                                            Inaktif
                                                                                            @endif
                                                                                        </td>
                                                                                        
                                                                                        @endif
                                                                                    </tr>
                                                                                    @endforeach    
                                                                                </table>
                                                                            </td>                                                                                            
                                                                        </tr>
                                                                        @endif
                                                                    @endforeach    
                                                                </table>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table class="">
                                                @foreach($lvldf as $index => $item4)
                                                        @if($item4->induk_kode == $item1 -> ptl_kode)
                                                    <tr>
                                                        <th style=" padding: 5px;" class="text-success">Kode Formulir</th>
                                                        <th style=" padding: 5px;" class="text-success">Judul</th>
                                                        <th style=" padding: 5px;" class="text-success">Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                    </tr>
                                                    
                                                        <tr >
                                                            <td style="width: 70px; padding: 5px;">{{$item4->formulir_kode}}</td>
                                                            <td style="width: 200px; padding: 5px;">{{$item4->judul_sop}}</td>
                                                            <td>
                                                                <table class="">
                                                                    <tr>
                                                                    
                                                                        
                                                                    </tr>
                                                                    @foreach($lvlef as $index => $item5)
                                                                    <tr style="width: 170px; padding: 5px;">
                                                                        @if($item5->formulir_kode == $item4->id)
                                                                        <td style="width: 100px; padding: 5px;">{{$item5->tgl_terbit}}</td>
                                                                        <td style="width: 100px; padding: 5px;">{{$item5->revisi}}</td>
                                                                        <td style="width: 100px; padding: 5px;">
                                                                            @if($item5 -> waktu==1)
                                                                            Aktif Berlaku
                                                                            @elseif($item5 -> waktu==2)
                                                                            Aktif Tidak Berlaku
                                                                            @else
                                                                            Inaktif
                                                                            @endif
                                                                        </td>
                                                                        
                                                                        @endif
                                                                    </tr>
                                                                    @endforeach    
                                                                </table>
                                                            </td>                                                                                              
                                                        </tr>
                                                        @endif
                                                    @endforeach    
                                                </table>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- @foreach($lvlaptl as $index => $item2)
                                        <tr>
                                            <td style="padding: 5px;">{{$item2 -> ptl_kode}}</td>
                                            <td style="padding: 5px;">{{$item2 -> judul}}</td>
                                          
                                        </tr>
                                        @endforeach -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
