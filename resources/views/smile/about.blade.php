
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
                            <img src="{{ asset('vendor/images/media/Smile.png') }}" width="500px" >
                        </center>
                    </div>
                </div>
				<div class="row">
               
                <div class="card">
                                    <div class="card-body">
                                        <h4><b>Petunjuk Penggunaan Aplikasi SMILE</b></h4>
                                        <p>SMILE(Sistem Managemen Informasi Lembur) adalah sebuah aplikasi di BBPOM di Makassar yang berfungsi untuk memanagemen lembur pegawai, Mulai dari pengajuan lembur pegawai hinggah tahap verifikasi absen.</p>
                                        <p><b class="text-secondary">Dasar Hukum:</b></p>
                                        <ul>
                                            <li><i class="fa fa-angle-double-right"></i> KEPUTUSAN KEPALA BADAN PENGAWAS OBAT DAN MAKANAN REPUBLIK INDONESIA NOMOR HK.02.02.1.2.03.22.122 TAHUN 2022 TENTANG PETUNJUK PELAKSANAAN ANGGARAN DI LINGKUNGAN BADAN PENGAWAS OBAT DAN MAKANAN TAHUN ANGGARAN 2022</li>
                                            <li><i class="fa fa-angle-double-right"></i> PMK Nomor 60/PMK.02/2021 tentang Standar Biaya Masukan (SBM) TA. 2022</li>
                                        </ul><p>
                                        <p><b class="text-secondary">Petunjuk:</b></p>
                                        <ul>
                                            <li><i class="fa fa-angle-double-right"></i> Masuk dalam Aplikasi <b class="text-secondary">BALLA POKJA</b> BBPOM di Makassar </li>
                                            <li><i class="fa fa-angle-double-right"></i> Sebelum membuka menu SMILE harap memastikan bahwa semua data profile pegawai(NIP, Jabatan, Pangkat dan No. HP untuk Notifikasi) telah terisi dimenu -> <b style="color: blue;"><a style="color: blue;" href="/user/{{Auth::user()-> username}}/editprof">PROFILE</a></b> </li>
                                            <li><i class="fa fa-angle-double-right"></i> Aplikasi SMILE terdiri dari beberapa MENU yang terdiri dari <b class="text-secondary">Form, History, </b> dan <b class="text-secondary">About</b></li>
                                            <li><img src="{{ asset('vendor/images/media/index.png') }}" width="700px"></li>
                                            <li><i class="fa fa-angle-double-right"></i> Menu <b class="text-secondary">FORM</b> Berfungsi untuk pegajuan lembur pegawai, adapun bentuk dari menu ini adalah sebagai berikut</li>
                                            <li><img src="{{ asset('vendor/images/media/form_smile.png') }}" width="700px"></li>
                                            <li><i class="fa fa-angle-double-right"></i> Nama, NIP, Pangkat dan Jabatan akan terisi otomatis apabila menu profil telah diisi lengkap</li>
                                            <li><i class="fa fa-angle-double-right"></i> Kolom <b class="text-secondary">Tambahan Peserta Lembur</b> diisi apabila jumlah peserta lembur lebih dari 1 orang</li>
                                            <li><i class="fa fa-angle-double-right"></i> Pada kolom <b class="text-secondary">Tambahan Peserta Lembur</b>, jika Pengajuan dilakukan oleh ASN maka tambahan peserta lembur hanya dapat diisi dengan anggota ASN juga</li>
                                            <li><i class="fa fa-angle-double-right"></i> Sebaliknya, Pada kolom <b class="text-secondary">Tambahan Peserta Lembur</b>, jika Pengajuan dilakukan oleh PPNPN maka tambahan peserta lembur hanya dapat diisi dengan anggota PPNPN juga</li>
                                            <li><i class="fa fa-angle-double-right"></i> Mengisi kolom <b class="text-secondary">Tugas Lembur</b> dengan deskripsi pekerjaan yang akan dilakukan saat lembur</li>
                                            <li><i class="fa fa-angle-double-right"></i> Apabila lembur hanya dilakukan dalam 1 hari maka pegawai hanya mengisi <b class="text-secondary">Tanggal Mulai Lembur</b> </li>
                                            <li><i class="fa fa-angle-double-right"></i> Sebaliknya apabila lembur dilakukan lebih 2 hari maka wajib mengisi kolom <b class="text-secondary">Tanggal Selesai Lembur</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Setelah data terisi semua, tekan tombol <b class="text-secondary">Kirim Pengajuan</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Pengajuan lembur yang terkirim selanjutnya akan ditampilkan dihalaman <b class="text-secondary">Dashboard Aplikasi SMILE </b> tabel daftar pengajuan lembur</li>
                                            <li><i class="fa fa-angle-double-right"></i> Pengajuan lembur selanjutnya akan diriview oleh atasan dalam hal ini <b class="text-secondary">KTU(Kepala Bagian Tata Usaha)</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Notifikasi akan masuk di aplikasi WhatsApp pegawai Apabila pengajuan lembur Diterima/Ditolak oleh atasan dengan syarat data profile No.Telpon telah diisi dengan lengkap dan benar</li>
                                            <li><i class="fa fa-angle-double-right"></i> Pengajuan lembur yang telah Diterima selanjutnya akan diproses dibagian <b class="text-secondary">Kepegawaian</b></li>
                                            <li><i class="fa fa-angle-double-right"></i> Adapun bentuk pengajuan lembur akan mengalami perubahan <b class="text-secondary">Status</b> sesuai dengan tahap yang telah dilalui, adapun keterangan statusnya antara lain:
                                            
                                            
                                            </li>
                                        </ul>
                                        <ul class="list-style-1">
                                            <li><span class="badge rounded-pill bg-warning">1-Pengajuan Lembur Terkirim</span>
                                                <br>Pengajuan lembur terkirim menandakan pengajuan lembur yang diajukan telah terkirim dan akan direview oleh atasan/KTU
                                            </li>
                                            <li><span class="badge rounded-pill bg-secondary">2-Pengajuan Lembur Diterima</span>
                                                <br>Pengajuan lembur diterima menandakan bahwa lembur yang diajukan telah disetujui oleh atasan dan pegawai telah bisa melakukan lembur
                                            </li>
                                            <li><span class="badge rounded-pill bg-danger">Pengajuan Lembur Ditolak</span>
                                                <br>Pengajuan lembur ditolak menandakan bahwa pengajuan lembur yang diajukan ditolak oleh atasan/KTU dengan alasan yang telah diberikan
                                            </li>
                                            <li><span class="badge rounded-pill bg-success">3-Terbit SPML</span>
                                                <br>Terbit SPML menandakan bahwa pengajuan lembur anda telah diproses oleh Kepegawaian dan telah terbit SPML
                                            </li>
                                            <li><span class="badge rounded-pill bg-orange">4-Verifikasi Absen</span>
                                                <br>Status Verifikasi Absen Menandakan bahwa pengajuan lembur telah di verifikasi absen oleh pihak kepegawaian
                                            </li>
                                            <li><span class="badge rounded-pill bg-gray">5-Verfikasi Lembur</span>
                                                <br>Setelah tahap verifikasi absen telah selesai selanjutnya pada tahap ini Pegawai diwajibkan untuk menginput data dukung dari kegiatan lembur yang telah dilakukan, dengan cara mengklik tombol <a class="btn btn-gray btn-sm">Input Data Verifikasi Lembur</a> pada tabel pangajuan lembur
                                            </li>
                                            <li><span class="badge rounded-pill bg-default">6-Priview Atasan(KTU)</span>
                                                <br>Tahap ini mendakan bahwa data lembur anda sedang direview oleh atasan untuk ditanda tangani
                                            </li>
                                            <li><span class="badge rounded-pill bg-success">7-Lembur Torkonfirmasi Atasan(KTU)</span>
                                                <br>Tahap ini mendakan bahwa data lembur anda telah lengkap dan telah disampaikan ke pihak Keuangan
                                            </li>
                                            <li><span class="badge rounded-pill bg-primary">8-Selesai</span>
                                                <br>Merupakan tahap akhir dari pengajuan lembur, dimana data lembur telah diperoses oleh keuangan.
                                            </li>
                                            <li><span class="badge rounded-pill bg-danger">Dikembalikan</span>
                                                <br>Laporan lembur Dikembalikan pihak Keuangan kepada pihak Kepegawaian untuk Direvisi dikarenakan adanya data yang tidak sesuai.
                                            </li>
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
	