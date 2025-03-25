<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="mb-4">Kuisioner</h5>
                    <form class="needs-validation tooltip-label-right" method="post" action="?module=proses_kuisioner" novalidate>
                        <div class="form-group row error-l-50">
                            <label for="" class="col-sm-4 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Kolom Nama harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row error-l-50">
                            <label for="" class="col-sm-4 col-form-label">Usia</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="usia" name="usia" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Kolom Usia harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row error-l-50">
                            <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jk" name="jk" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Kolom Jenis Kelamin harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="" class="col-sm-4 col-form-label"> No. Telpon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="telpon" name="telpon" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Kolom No. Telpon harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-4 pt-0">Pendidikan Terakhir ?</label>
                                <div class="col-sm-8">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p1"
                                            id="p1" value="SMA atau sederaja" required>
                                        <label class="form-check-label" for="gridRadios1">
                                            SMA atau sederaja
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p1"
                                            id="p1" value="D1/D2/D3" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            D1/D2/D3
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p1"
                                            id="p1" value="D4/S1" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            D4/S1
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p1"
                                            id="p1" value="S2/Profesi/S3" required>
                                        <label class="form-check-label" for="gridRadios2">
                                             S2/Profesi/S3
                                        </label>
                                    </div>
                                    
                                </div>
                                <div class="invalid-tooltip">
                                    Pendidikan terakhir harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-4 pt-0">Pekerjaan Utama ?</label>
                                <div class="col-sm-8">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p2"
                                            id="p1" value="Pelajar Mahasiswa" required>
                                        <label class="form-check-label" for="gridRadios1">
                                            Pelajar Mahasiswa
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p2"
                                            id="p1" value="Peneliti/Dosen" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            Peneliti/Dosen
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p2"
                                            id="p1" value="PNS/TNI/POLRI" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            PNS/TNI/POLRI
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p2"
                                            id="p1" value="Pegawai BUMN/D" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            Pegawai BUMN/D
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p2"
                                            id="p1" value="Pegawai Swasta" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            Pegawai Swasta
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p2"
                                            id="p1" value="Wiraswasta" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            Wiraswasta
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p2"
                                            id="p1" value="Yang Lain" required>
                                        <label class="form-check-label" for="gridRadios2">
                                            Yang Lain
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pekerjaan Utama harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"> Nama Instansi/Perusahaan tempat bekerja/beraktivitas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="instansi" name="instansi" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Kolom Nama Instansi harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai kemudahan pemenuhan persyaratan pelayanan ? </label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p3"
                                            id="p1" value="Sangat Tidak Mudah" required>
                                        <label class="form-check-label" for="gridRadios1">
                                            Sangat Tidak Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p3"
                                            id="p1" value="Tidak Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p3"
                                            id="p1" value="Kurang Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p3"
                                            id="p1" value="Cukup Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p3"
                                            id="p1" value="Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p3"
                                            id="p1" value="Sangat Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Mudah
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai kemudahan prosedur/alur pelayanan ?</label>
                                <div class="col-sm-6">
                                <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p4"
                                            id="p1" value="Sangat Tidak Mudah" required>
                                        <label class="form-check-label" for="gridRadios1">
                                            Sangat Tidak Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p4"
                                            id="p1" value="Tidak Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p4"
                                            id="p1" value="Kurang Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p4"
                                            id="p1" value="Cukup Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p4"
                                            id="p1" value="Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Mudah
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p4"
                                            id="p1" value="Sangat Mudah" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Mudah
                                        </label>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Apakah menurut penilaian Saudara, waktu pelayanan (jam kerja) dilaksanakan sesuai dengan ketentuan  ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p5"
                                            id="p1" value="Sangat Tidak Sesuai" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p5"
                                            id="p1" value="Tidak Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p5"
                                            id="p1" value="Kurang Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p5"
                                            id="p1" value="Cukup Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p5"
                                            id="p1" value="Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p5"
                                            id="p1" value="Sangat Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Sesuai
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Apakah menurut penilaian Saudara jangka waktu penyelesaian pelayanan dilaksanakan sesuai dengan ketentuan ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p6"
                                            id="p1" value="Sangat Tidak Sesuai" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p6"
                                            id="p1" value="Tidak Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p6"
                                            id="p1" value="Kurang Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p6"
                                            id="p1" value="Cukup Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p6"
                                            id="p1" value="Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p6"
                                            id="p1" value="Sangat Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Sesuai
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai respon/kecepatan petugas atau aplikasi sistem dalam pelayanan ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p7"
                                            id="p1" value="Sangat Lambat" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Lambat
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p7"
                                            id="p1" value="Lambat" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Lambat
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p7"
                                            id="p1" value="Kurang Cepat" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Cepat
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p7"
                                            id="p1" value="Cukup Cepat" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Cepat
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p7"
                                            id="p1" value="Cepat" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cepat
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p7"
                                            id="p1" value="Sangat Cepat" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Cepat
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai kejelasan informasi tentang biaya pelayanan ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p8"
                                            id="p1" value="Sangat Tidak Jelas" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Jelas
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p8"
                                            id="p1" value="Tidak Jelas" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Jelas
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p8"
                                            id="p1" value="Kurang Jelas" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Jelas
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p8"
                                            id="p1" value="Cukup Jelas" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Jelas
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p8"
                                            id="p1" value="Jelas" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Jelas
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p8"
                                            id="p1" value="Sangat Jelas" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Jelas
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai kesesuaian produk/jasa layanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan ? </label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p9"
                                            id="p1" value="Sangat Tidak Sesuai" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p9"
                                            id="p1" value="Tidak Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p9"
                                            id="p1" value="Kurang Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p9"
                                            id="p1" value="Cukup Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p9"
                                            id="p1" value="Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sesuai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p9"
                                            id="p1" value="Sangat Sesuai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Sesuai
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai kompetensi petugas dalam pelayanan ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p10"
                                            id="p1" value="Sangat Tidak Memadai" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Memadai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p10"
                                            id="p1" value="Tidak Memadai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Memadai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p10"
                                            id="p1" value="Kurang Memadai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Memadai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p10"
                                            id="p1" value="Cukup Memadai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Memadai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p10"
                                            id="p1" value="Memadai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Memadai
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p10"
                                            id="p1" value="Sangat Memadai" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Memadai
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Apakah menurut penilaian Saudara, petugas sopan dan mampu berkomunikasi dengan baik (tulisan atau verbal) ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p11"
                                            id="p1" value="Sangat Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p11"
                                            id="p1" value="Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p11"
                                            id="p1" value="Kurang Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p11"
                                            id="p1" value="Cukup Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p11"
                                            id="p1" value="Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p11"
                                            id="p1" value="Sangat Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Setuju
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai penanganan pengaduan pada unit layanan ini ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p12"
                                            id="p1" value="Sangat Tidak Baik" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Baik
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p12"
                                            id="p1" value="Tidak Baik" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Baik
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p12"
                                            id="p1" value="Kurang Baik" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Baik
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p12"
                                            id="p1" value="Cukup Baik" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Baik
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p12"
                                            id="p1" value="Baik" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Baik
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p12"
                                            id="p1" value="Sangat Baik" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Baik
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Bagaimana penilaian Saudara mengenai ketersediaan sarana prasarana pendukung pemberian pelayanan publik pada unit layanan ini ?</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p13"
                                            id="p1" value="Sangat Tidak Lengkap" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Lengkap
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p13"
                                            id="p1" value="Tidak Lengkap" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Lengkap
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p13"
                                            id="p1" value="Kurang Lengkap" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Lengkap
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p13"
                                            id="p1" value="Cukup Lengkap" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Lengkap
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p13"
                                            id="p1" value="Lengkap" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Lengkap
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p13"
                                            id="p1" value="Sangat Lengkap" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Lengkap
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Petugas pada unit pelayanan ini berintegritas dalam pelaksanaan tugasnya :</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p14"
                                            id="p1" value="Sangat Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p14"
                                            id="p1" value="Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p14"
                                            id="p1" value="Kurang Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p14"
                                            id="p1" value="Cukup Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p14"
                                            id="p1" value="Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p14"
                                            id="p1" value="Sangat Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Setuju
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Petugas memberikan layanan tanpa diskriminasi :</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p15"
                                            id="p1" value="Sangat Tidak Setuju"required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p15"
                                            id="p1" value="Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p15"
                                            id="p1" value="Kurang Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p15"
                                            id="p1" value="Cukup Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p15"
                                            id="p1" value="Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p15"
                                            id="p1" value="Sangat Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Setuju
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Petugas memberikan pelayanan sesuai prosedur dan tanpa indikasi kecurangan : </label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p16"
                                            id="p1" value="Sangat Tidak Setuju" require>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p16"
                                            id="p1" value="Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p16"
                                            id="p1" value="Kurang Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p16"
                                            id="p1" value="Cukup Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p16"
                                            id="p1" value="Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p16"
                                            id="p1" value="Sangat Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Setuju
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Pelayanan yang diberikan tanpa praktik pemberian imbalan uang/barang :</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p17"
                                            id="p1" value="Sangat Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p17"
                                            id="p1" value="Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p17"
                                            id="p1" value="Kurang Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p17"
                                            id="p1" value="Cukup Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p17"
                                            id="p1" value="Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p17"
                                            id="p1" value="Sangat Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Setuju
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Pelayanan pada unit ini tanpa praktik pungutan liar (pungli) :</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p18"
                                            id="p1" value="Sangat Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p18"
                                            id="p1" value="Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p18"
                                            id="p1" value="Kurang Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p18"
                                            id="p1" value="Cukup Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p18"
                                            id="p1" value="Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p18"
                                            id="p1" value="Sangat Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Setuju
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="row">
                                <label class="col-form-label col-sm-6 pt-0">Pelayanan pada unit ini tanpa praktik percaloan /perantara /biro :</label>
                                <div class="col-sm-6">
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p19"
                                            id="p1" value="Sangat Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Sangat Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p19"
                                            id="p1" value="Tidak Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Tidak Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p19"
                                            id="p1" value="Kurang Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p19"
                                            id="p1" value="Cukup Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Cukup Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p19"
                                            id="p1" value="Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Setuju
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="form-check-input" type="radio" name="p19"
                                            id="p1" value="Sangat Setuju" required>
                                        <label class="form-check-label" for="gridRadios2">
                                        Sangat Setuju
                                        </label>
                                    </div>
                                </div>
                                <div class="invalid-tooltip">
                                    Pertanyaan ini harus diisi!
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mb-0">Kirim Jawaban</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($_GET['status'])){
    if($_GET['status']=='isi'){
?>
    <div id="exampleModalPopovers" class="modal fade show" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalPopoversLabel">Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               
                <h5>Anda telah mengisi data Kuisioner</h5>
                <p>
                    Data KUISIONER anda tidak dapat disimpan kedalam sistem dikarenakan akun anda telah terdeteksi mengisi data KUISIONER sebelumnya
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
}else{
?>
 <div id="exampleModalPopovers" class="modal fade show" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalPopoversLabel">Kuisioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               
                <h5>Isi data Kuisioner SUKSES</h5>
                <p>
                    Terimakasih anda telah mengisi data KUISIONER dari BBPOM Makassar !
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
}}
?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModalPopovers').modal('show');
    });
</script>
