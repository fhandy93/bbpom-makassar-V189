<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Data Kuisioner</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Kuisioner</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kuisioner View</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
                    @if (session() -> has('succes'))
                        <div class="card-body text-center" id="success"> 
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                            <h4 class="h4 mb-0 mt-3">Success</h4>
                            <p class="card-text">{{ session() -> get('succes')}}</p>
                        </div>
                    @endif 
                    
                    <div class="col-lg-12">
                    <table border="0" cellpadding="10" cellspacing="0">
        <tr>
            <th style="width: 50px;">No</th>
            <th style="width: 100px;">Pertanyaan</th>
            <th>Deskripsi</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Q1</td>
            <td>Bagaimana penilaian Saudara mengenai kemudahan pemenuhan persyaratan pelayanan ? </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Q2</td>
            <td>Bagaimana penilaian Saudara mengenai kemudahan prosedur/alur pelayanan ? </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Q3</td>
            <td>Apakah menurut penilaian Saudara, waktu pelayanan (jam kerja) dilaksanakan sesuai dengan ketentuan  ?</td>
        </tr>
         <tr>
            <td>4</td>
            <td>Q4</td>
            <td>Apakah menurut penilaian Saudara jangka waktu penyelesaian pelayanan dilaksanakan sesuai dengan ketentuan ?</td>
        </tr>
         <tr>
            <td>5</td>
            <td>Q5</td>
            <td>Bagaimana penilaian Saudara mengenai respon/kecepatan petugas atau aplikasi sistem dalam pelayanan ?</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Q6</td>
            <td>Bagaimana penilaian Saudara mengenai kejelasan informasi tentang biaya pelayanan ?</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Q7</td>
            <td>Bagaimana penilaian Saudara mengenai kesesuaian produk/jasa layanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan ? </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Q8</td>
            <td>Bagaimana penilaian Saudara mengenai kompetensi petugas dalam pelayanan ? </td>
        </tr>
        <tr>
            <td>9</td>
            <td>Q9</td>
            <td>Apakah menurut penilaian Saudara, petugas sopan dan mampu berkomunikasi dengan baik (tulisan atau verbal) ? </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Q10</td>
            <td>Bagaimana penilaian Saudara mengenai penanganan pengaduan pada unit layanan ini ?</td>
        </tr>
        <tr>
            <td>11</td>
            <td>Q11</td>
            <td>Bagaimana penilaian Saudara mengenai ketersediaan sarana prasarana pendukung pemberian pelayanan publik pada unit layanan ini ?</td>
        </tr>
        <tr>
            <td>12</td>
            <td>Q12</td>
            <td>Petugas pada unit pelayanan ini berintegritas dalam pelaksanaan tugasnya :</td>
        </tr>
        <tr>
            <td>13</td>
            <td>Q13</td>
            <td>Petugas memberikan layanan tanpa diskriminasi :</td>
        </tr>
        <tr>
            <td>14</td>
            <td>Q14</td>
            <td>Petugas memberikan pelayanan sesuai prosedur dan tanpa indikasi kecurangan :</td>
        </tr>
        <tr>
            <td>15</td>
            <td>Q15</td>
            <td>Pelayanan yang diberikan tanpa praktik pemberian imbalan uang/barang : </td>
        </tr>
        <tr>
            <td>16</td>
            <td>Q16</td>
            <td>Pelayanan pada unit ini tanpa praktik pungutan liar (pungli) :</td>
        </tr>
        <tr>
            <td>17</td>
            <td>Q17</td>
            <td>Pelayanan pada unit ini tanpa praktik percaloan /perantara /biro : </td>
        </tr>
        </table><p>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kuisioner</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Index</th>
                                                <th class="border-bottom-0">Nama Pengguna</th>
                                                <th class="border-bottom-0">Usia</th>
                                                <th class="border-bottom-0">HP</th>
                                                <th class="border-bottom-0">Instansi</th>
                                                <th class="border-bottom-0">Jenis Kelamin</th>              
                                                <th class="border-bottom-0">Pendidikan Terakhir</th>
                                                <th class="border-bottom-0">Pekerjaan Utama</th>
                                                <th class="border-bottom-0">Q1</th>
                                                <th class="border-bottom-0">Q2</th>
                                                <th class="border-bottom-0">Q3</th>
                                                <th class="border-bottom-0">Q4</th>
                                                <th class="border-bottom-0">Q5</th>
                                                <th class="border-bottom-0">Q6</th>
                                                <th class="border-bottom-0">Q7</th>
                                                <th class="border-bottom-0">Q8</th>
                                                <th class="border-bottom-0">Q9</th>
                                                <th class="border-bottom-0">Q10</th>
                                                <th class="border-bottom-0">Q11</th>
                                                <th class="border-bottom-0">Q12</th>
                                                <th class="border-bottom-0">Q13</th>
                                                <th class="border-bottom-0">Q14</th>
                                                <th class="border-bottom-0">Q15</th>
                                                <th class="border-bottom-0">Q16</th>
                                                <th class="border-bottom-0">Q17</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach($kuisioner as $index => $item)
                                            <tr>
                                                <td>{{$index + 1}}</td>
                                                <td>{{$item -> nama}}</td>
                                                <td>{{$item -> usia}}</td>
                                                <td>{{$item -> hp}}</td>
                                                <td>{{$item -> instansi}}</td>
                                                <td>{{$item -> jk}}</td>
                                                <td>{{$item -> p1}}</td>
                                                <td>{{$item -> p2}}</td>
                                                <td>{{$item -> p3}}</td>
                                                <td>{{$item -> p4}}</td>
                                                <td>{{$item -> p5}}</td>
                                                <td>{{$item -> p6}}</td>
                                                <td>{{$item -> p7}}</td>
                                                <td>{{$item -> p8}}</td>
                                                <td>{{$item -> p9}}</td>
                                                <td>{{$item -> p10}}</td>
                                                <td>{{$item -> p11}}</td>
                                                <td>{{$item -> p12}}</td>
                                                <td>{{$item -> p13}}</td>
                                                <td>{{$item -> p14}}</td>
                                                <td>{{$item -> p15}}</td>
                                                <td>{{$item -> p16}}</td>
                                                <td>{{$item -> p17}}</td>
                                                <td>{{$item -> p18}}</td>
                                                <td>{{$item -> p19}}</td>
                                                <td>
                                                    <div class="btn-list">
                                                        <form method="POST" action="/kuisioner/delete/{{$item->id }}" style="display: inline;" >
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><span class="fe fe-trash-2"></span></button>
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
                <a href="/kuis_download"><button type="button" class="btn btn-primary"><i class="fe fe-download me-2"></i>Download Pertanyaan Kuisioner</button></a>
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