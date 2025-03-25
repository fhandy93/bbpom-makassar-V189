
<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- ROW OPEN -->
				<div class="row" style="margin-top: 30px;margin-bottom: 20px;">
                    <div class="col-md-12">
                        <center>
                            <img src="{{ asset('vendor/images/media/rujukan.jpg') }}" width="500px" >
                        </center>
                    </div>
                </div>
				<div class="row">
               
                <div class="card">
                                    <div class="card-body">
                                        <h4><b>Petunjuk Penggunaan Aplikasi SEPPULO (Rujukan)</b></h4>
                                        <p>Aplikasi SEPPULO(Rujukan) merupakan aplikasi <b class="text-secondary">Sistem Pengaduan Pelayanan Publik Online</b> yang dibangun untuk memudahkan pihak Infokom, Pemeriksaan, Penindakan dan Pengujian untuk memanajemen laporan rujukan agar lebih terstruktur</p>

                                        <h4><b>Bagian Infokom</b></h4>
                                        <p>Petunjuk:</p>
                                        <ul>
                                            <li><i class="fa fa-angle-double-right"></i> Masuk dalam Aplikasi <b class="text-secondary">BALLA POKJA</b> BBPOM di Makassar </li>
                                            <li><i class="fa fa-angle-double-right"></i> Pilih menu Pelayanan Publik ->  <b class="text-secondary">Rujukan V.2</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Dalam menu <b class="text-secondary">RUJUKA V.2</b> akan tampil 3 menu utama aplikasi <b class="text-secondary">RUJUKAN</b> yang terdiri dari <b class="text-secondary">Forumilir Rujukan</b>, <b class="text-secondary">Laporan Rujukan</b> dan <b class="text-secondary">Info</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Untuk melakukan input laporan RUJUKAN silakan klik menu <b class="text-secondary">Formulir Rujukan</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Dalam menu Formulir Rujukan akan tampil formulir dengan 3 Tab, Yakni <b class="text-secondary">Identitas Pelapor</b>, <b class="text-secondary">Identitas Kasus/Masalah</b> dan <b class="text-secondary">Uraian Masalah</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Silkan mengisi data kedalam 3 Tabs ini, jangan lupa mengisi tanda <b class="text-danger">"-"</b> apabila data kosong</li>
                                            <li><i class="fa fa-angle-double-right"></i> Apabila data yang diinput telah selesai maka silakan klik 2 kali tombol <b class="text-secondary">Submit</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Apabila data<b class="text-secondary">Valid</b> maka form akan otomatis tersubmit, namun apabila ada data yang salah, maka <b class="text-danger">Form Tidak akan Tersubmit</b>, untuk itu silakan periksa tiap Tab nya dan perhatikan <b class="text-danger">Tulisan Merah</b> apabila data yang dimasukkan Tidak Valid</li>
                                            <li><i class="fa fa-angle-double-right"></i> Data yang telah diinput akan ditampilkan pada menu <b class="text-secondary">Laporan Rujukan</b>, Silakan klik menu Detail Info untuk melihat data secara keseluruhan</li>
                                            <li><i class="fa fa-angle-double-right"></i> Periksa data inputan secara seksama, apabila data suda cocok silakan klik menu  <b class="text-secondary">Kirim Laporan</b>,Catatan: <b style="color: red;">Laporan yang telah dikirim tidak bisa diedit kembali</b></li>
                                        </ul><p>
                                        <h4><b>Bagian Pemeriksaan, Penindakan dan Pengujian</b></h4>
                                        <p>Petunjuk:</p>
                                        <ul>
                                            <li><i class="fa fa-angle-double-right"></i> Masuk dalam Aplikasi <b class="text-secondary">BALLA POKJA</b> BBPOM di Makassar </li>
                                            <li><i class="fa fa-angle-double-right"></i> Pilih menu Pelayanan Publik ->  <b class="text-secondary">Rujukan V.2</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Dalam menu RUJUKA akan tampil 3 menu utama aplikasi <b class="text-secondary">RUJUKAN</b> yang terdiri dari <b class="text-secondary">Formulir Rujukan</b>, <b class="text-secondary">Laporan Rujukan</b> dan <b class="text-secondary">Info</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Setiap ada Laporan Rujukan yang masuk, Bapak/Ibu akan menerima <b class="text-secondary">WhatsApp Gateway</b> yang berisi info laporan yang masuk</li>
                                            <li><i class="fa fa-angle-double-right"></i> Laporan yang masuk dapat dilihat pada menu <b class="text-secondary">Laporan Rujukan</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Untuk melihat laporan secara detail, Silakan pilih menu Detail Info</li>
                                            
                                        </ul>
                                    </div>
                                </div>
   
							
                           
				</div>
				<!-- ROW CLOSED -->
			
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--app-content closed-->
    
    <!-- JQUERY JS -->
    <script src="{{ asset('vendor/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('vendor/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('vendor/js/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('vendor/js/circle-progress.min.js')}}"></script>


    <!-- SIDE-MENU JS -->
    <script src="{{ asset('vendor/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>


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

	<!-- Perfect SCROLLBAR JS-->
	<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

	<!-- FORMVALIDATION JS -->
	<script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendor/js/select2.js')}}"></script>

    </x-HomeLayout>
	