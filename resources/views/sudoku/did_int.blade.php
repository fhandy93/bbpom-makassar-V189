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
                    <h1 class="page-title">Daftar Induk Dokumen (DID) Internal BPOM</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SUDOKU</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DID Internal BPOM</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
               
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" >
                                <h3 class="card-title">Daftar Induk Dokumen (DID) Internal BPOM</h3>
                            </div>
                            <div class="card-body"  style="overflow-x:auto;">
                                <table class="table-bordered" >
                                    <thead>
                                        <tr>
                                            <th style="width: 70px; padding: 5px;" class="text-danger">Kode Peta Proses Bisnis</th>
                                            <th style="width: 100px; padding: 5px;" class="text-danger">Proses Bisnis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lvla as $index => $item)
                                        <tr>
                                            <td style="padding: 5px;">{{$item -> kode_proses}}</td>
                                            <td style="padding: 5px;">{{$item -> nm_proses}}</td>
                                            <td>
                                                <table class="">
                                                    <tr>
                                                        <th style=" padding: 5px;" class="text-warning">Kode Peta Sub Proses Bisnis</th>
                                                        <th style=" padding: 5px;" class="text-warning">Nama Peta Sub Proses Bisnis</th>
                                                    </tr>
                                                    @foreach($lvlb as $index => $item2)
                                                    <tr >
                                                        @if($item2->proses_id == $item->id)
                                                        <td style="width: 70px; padding: 5px;">{{$item2->kode_sub_pro}}</td>
                                                        <td style="width: 150px; padding: 5px;">{{$item2->nm_sub_pro}}</td>
                                                        <td>
                                                            <table class="">
                                                                <tr>
                                                                    <th style="width: 100px; padding: 5px;" class="text-success">Kode Peta Lintas Fungsi</th>
                                                                    <th style="width: 170px; padding: 5px;" class="text-success">Nama Peta Peta Lintas Fungsi</th>
                                                                </tr>
                                                                @foreach($lvlc as $index => $item3)
                                                                <tr >
                                                                    @if($item3->sub_proses_id == $item2->id)
                                                                    <td style="width: 100px; padding: 5px;">{{$item3->kode_peta}}</td>
                                                                    <td style="width: 170px; padding: 5px;">{{$item3->nm_peta}}</td>
                                                                    <td>
                                                                        <table class="">
                                                                            <tr>
                                                                                <th style=" padding: 5px; color:#23285F;">Kode SOP Makro</th>
                                                                                <th style=" padding: 5px; color:#23285F;" >Nama SOP Makro</th>
                                                                                <th style=" width: 170px;padding: 5px; color:#23285F;" >Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                                                <!-- <th style=" padding: 5px;" class="text-info">Revisi</th> -->
                                                                            </tr>
                                                                            @foreach($lvld as $index => $item4)
                                                                            <tr >
                                                                                @if($item4->peta_id == $item3->id)
                                                                                <td style="width: 100px; padding: 5px;">{{$item4->kode_sop}}</td>
                                                                                <td style="width: 170px; padding: 5px;">{{$item4->judul_sop}}</td>
                                                                                <td>
                                                                                    <table class="">
                                                                                        <tr>
                                                                                            <!-- <th style=" padding: 5px;" class="text-info">Kode SOP Makro</th> -->
                                                                                            <!-- <th style=" padding: 5px;" class="text-info">Nama SOP Makro</th> -->
                                                                                            
                                                                                        </tr>
                                                                                        @foreach($lvle as $index => $item5)
                                                                                        <tr style="width: 170px; padding: 5px;">
                                                                                            @if($item5->sop_id == $item4->id)
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
                                                                                <td>
                                                                                    <table class="">
                                                                                        <tr>
                                                                                            <th style=" padding: 5px; color:#9C3C79;" >Kode SOP Mikro</th>
                                                                                            <th style=" padding: 5px;color:#9C3C79;" >Nama SOP Mikro</th>
                                                                                            <th style=" padding: 5px; color:#9C3C79;" >Revisi(Tgl Terbit - No Revisi - Waktu)</th>
                                                                                        </tr>
                                                                                        @foreach($lvlam as $index => $item6)
                                                                                        <tr >
                                                                                            @if($item6->kode_makro == $item4->kode_sop)
                                                                                            <td style="width: 70px; padding: 5px;">{{$item6->kode_mikro}}</td>
                                                                                            <td style="width: 200px; padding: 5px;">{{$item6->judul_sop}}</td>
                                                                                            <td>
                                                                                                <table class="">
                                                                                                    <tr>
                                                                                                        <!-- <th style=" padding: 5px;" class="text-info">Kode SOP Makro</th> -->
                                                                                                        <!-- <th style=" padding: 5px;" class="text-info">Nama SOP Makro</th> -->
                                                                                                        
                                                                                                    </tr>
                                                                                                    @foreach($lvlcm as $index => $item7)
                                                                                                    <tr >
                                                                                                        @if($item7->kode_mikro == $item6->id)
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
                                                                                            @endif
                                                                                            
                                                                                        </tr>
                                                                                        @endforeach    
                                                                                    </table>
                                                                                </td>
                                                                                @endif
                                                                            </tr>
                                                                            @endforeach    
                                                                        </table>
                                                                    </td>
                                                                    @endif
                                                                </tr>
                                                                @endforeach    
                                                            </table>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                
                                                </table>
                                            </td>
                                        </tr>
                                        @endforeach
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
