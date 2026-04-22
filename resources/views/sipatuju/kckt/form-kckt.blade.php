<x-HomeLayout>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> -->

    <!-- <style>
        /* Memastikan datepicker muncul di atas semua elemen lain */
        .datepicker {
            z-index: 999999 !important; /* Layer tertinggi */
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        /* Ubah kursor saat hover ikon kalender */
        .input-group-text {
            cursor: pointer;
        }
    </style> -->

    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="page-header">
                    <h1 class="page-title">Formulir KCKT - Tahap 1</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">FORM</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Identitas Sampel</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form KCKT</h3>
                            </div>
                            <div class="card-body">
                                <form id="formStep1" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                                    @csrf
                                    <h5 class="mb-3 text-primary fw-bold">I. Identitas Sampel</h5>
                                    <div class="form-row">
                                        <div class="col-xl-12 mb-3">
                                            <label for="nama_contoh" class="form-label">Nama Contoh</label>
                                            <input type="text" class="form-control" id="nama_contoh" name="nama_contoh" required>
                                        </div>      
                                    </div>
                                    <div class="form-row">
                                         <div class="col-xl-6 mb-3">
                                            <label for="zat_uji" class="form-label">Zat yang diuji</label>
                                            <select name="zat_uji" id="zat_uji" class="form-control form-select" required>
                                                <option value="" disabled selected>Pilih Zat Uji...</option>
                                                @foreach($uji as $itemuji)
                                                    <option value="{{$itemuji->id}}" {{ old('nm_zat') == $itemuji->id ? 'selected' : '' }}>
														{{$itemuji->nm_zat}}
													</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="pustaka" class="form-label">Pustaka</label>
                                             <select name="pustaka" id="pustaka" class="form-control form-select" required>
                                                <option value="" disabled selected>Pilih Pustaka...</option>
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3">
                                            <label for="no_kode" class="form-label">No Kode Contoh</label>
                                            <input type="text" class="form-control" id="no_kode" name="no_kode" required>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="no_batch" class="form-label">No Batch</label>
                                            <input type="text" class="form-control" id="no_batch" name="no_batch">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3">
                                            <label for="tgl_diuji" class="form-label">Tanggal Mulai Uji</label>
                                            <div class="input-group">
                                                <div class="input-group-text pointer-cursor"><i class="fa fa-calendar tx-16 lh-0 op-6"></i></div>
                                                <!-- <input class="form-control" placeholder="DD/MM/YYYY" type="text" name="tgl_diuji" id="tgl_diuji" required autocomplete="off"> -->
                                                <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" type="text" name="tgl_mulai" id="tgl_mulai">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="tgl_diuji" class="form-label">Tanggal Selesai Uji</label>
                                            <div class="input-group">
                                                <div class="input-group-text pointer-cursor"><i class="fa fa-calendar tx-16 lh-0 op-6"></i></div>
                                                <!-- <input class="form-control" placeholder="DD/MM/YYYY" type="text" name="tgl_diuji" id="tgl_diuji" required autocomplete="off"> -->
                                                <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" type="text" name="tgl_selesai" id="tgl_selesai">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-12 mb-3">
                                            <label for="penguji" class="form-label">Penguji</label>
                                            <select name="penguji" id="penguji" class="form-control form-select" required>
                                                <option value="" disabled selected>Pilih Penguji...</option>
                                                <option value="Budi">Budi</option>
                                                <option value="Siti">Siti</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 class="mb-3 text-primary fw-bold">II. Spesifikasi Alat</h5>
                                    <div class="form-row">
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-label">Merk Alat</label>
                                            <select name="merk_alat" id="merk_alat" class="form-control form-select" required>
                                                <option value="">Pilih...</option>
                                               @foreach($merek as $item)
                                                    <option value="{{ $item->merek }}">{{ $item->merek }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-label">Type/Seri</label>
                                            <select name="tipe_seri" id="tipe_seri" class="form-control form-select" required>
                                                <option value="">Pilih...</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-label">Rekorder</label>
                                            <input type="text" class="form-control" value="Print To PDF" id="rekorder" name="rekorder">
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-4 mb-3"><label class="form-label">Pelarut</label><input type="text" class="form-control bg-light" name="pelarut" id="pelarut"  required readonly></div>
                                        <div class="col-xl-4 mb-3"><label class="form-label">Suhu Kolom</label><div class="input-group"><input type="text" name="suhu_kolom" class="form-control decimal-number"><span class="input-group-text" >&deg;C</span></div></div>
                                        <div class="col-xl-4 mb-3"><label class="form-label">Suhu Autosampler</label><div class="input-group"><input type="text" name="suhu_autosampler" class="form-control decimal-number"><span class="input-group-text">&deg;C</span></div></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-4 mb-3"><label class="form-label">Jenis Kolom</label><input type="text" class="form-control bg-light" name="jenis_kolom" id="jenis_kolom"  required readonly></div>
                                        <div class="col-xl-4 mb-3"><label class="form-label">Ukuran Partikel</label><input type="text" class="form-control bg-light" name="ukuran_partikel" id="ukuran_partikel"  required readonly></div>
                                        <div class="col-xl-4 mb-3"><label class="form-label">Dimensi Kolom</label><input type="text" class="form-control bg-light" name="dimensi_kolom" id="dimensi_kolom"  required readonly></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3"><label class="form-label">Panjang Gelombang</label><input type="text" class="form-control bg-light" name="panjang_gelombang" id="panjang_gelombang" readonly></div>
                                        <div class="col-xl-6 mb-3"><label class="form-label">Detektor</label><input type="text" class="form-control bg-light" name="detektor" id="detektor"  required readonly></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3"><label class="form-label">Tekanan 1</label><div class="input-group"><input type="number" class="form-control" name="tekanan1"><span class="input-group-text">kgf/cm2</span></div></div>
                                        <div class="col-xl-6 mb-3"><label class="form-label">Laju Air</label><input type="text" class="form-control bg-light" name="laju_air" id="laju_air"  required readonly></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3">
                                        <label class="form-label">Tekanan 2</label><div class="input-group"><input type="number" class="form-control" name="tekanan2"><span class="input-group-text">kgf/cm2</span></div>
                                        </div>
                                        <div class="col-xl-6 mb-3"><label class="form-label">Fase Gerak</label><textarea class="form-control bg-light" name="fase_gerak" id="fase_gerak" rows="4" readonly required></textarea></div>
                                    </div>
                                     <div class="form-row">
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label fw-bold">UKS (Uji Kesesuaian Sistem)</label>
                                            <input class="form-control @error('file') is-invalid @enderror" type="file" name="uks" id="uks" required>
                                            <p><span>* File harus berextensi PDF</span>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label fw-bold">LCP UKS</label>
                                            <input class="form-control @error('file') is-invalid @enderror" type="file" name="lcp_uks" id="lcp_uks" required>
                                            <p><span>* File harus berextensi PDF</span>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label fw-bold">Kromatogram Baku</label>
                                            <input class="form-control @error('file') is-invalid @enderror" type="file" name="kromatogram_baku" id="kromatogram_baku" required>
                                            <p><span>* File harus berextensi PDF</span>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label fw-bold">Kromatogram Sampel</label>
                                            <input class="form-control @error('file') is-invalid @enderror" type="file" name="kromatogram_sampel" id="kromatogram_sampel" required>
                                            <p><span>* File harus berextensi PDF</span>
                                        </div>
                                    </div>
                                   
                                    <hr>
                                    <h5 class="mb-3 text-primary fw-bold">III. Data Kontrol & Baku</h5>
                                    
                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-label">No. Kontrol</label>
                                            <select name="no_kontrol" id="no_kontrol" class="form-control form-select" required>
                                                <option value="">Pilih No Kontrol...</option>
                                            
                                            </select>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-label">Baku Pembanding (Auto)</label>
                                            <input type="text" class="form-control bg-light" name="baku_pembanding" id="baku_pembanding" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-4 mb-3"><label class="form-label">Kadar</label><div class="input-group"><input type="text" class="form-control bg-light" name="kadar_kb" id="kadar_kb" readonly><span class="input-group-text">%</span></div></div>
                                        <div class="col-xl-4 mb-3"><label class="form-label">Susut Pengeringan</label><input type="text" class="form-control bg-light" name="susut_pengeringan" id="susut_pengeringan" readonly></div>
                                        <div class="col-xl-4 mb-3"><label class="form-label">Kadar Terkoreksi</label><input type="text" class="form-control bg-light" name="kadar_terkoreksi" id="kadar_terkoreksi" readonly></div>
                                    </div>

                                    <h6 class="mt-2 text-muted fw-bold">Bobot Baku & Pengenceran</h6>
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered table-vcenter">
                                            <thead class="bg-light text-center">
                                                <tr>
                                                    <th>Wadah + Contoh</th>
                                                    <th>Wadah + Sisa</th>
                                                    <th>Contoh</th>
                                                    <th>Pengenceran Baku Induk</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="baku_wadah_contoh" id="baku_wadah_contoh" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="baku_wadah_sisa" id="baku_wadah_sisa" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="baku_contoh" id="baku_contoh" class="form-control decimal-number" readonly ></td>
                                                    <td><div class="input-group"><input type="text" name="baku_induk" class="form-control decimal-number" required><span class="input-group-text">ml</span></div></td>
                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3"><label class="form-label">Baku Antara 1</label><div class="input-group"><input type="text" class="form-control decimal-number" name="antara_1" id="antara_1"><span class="input-group-text" >ml</span></div></div>
                                        <div class="col-xl-6 mb-3"><label class="form-label">Pengenceran Baku Antara 1</label><div class="input-group"><input type="text" class="form-control decimal-number" name="pengencer_antara_1" id="pengencer_antara_1"><span class="input-group-text">ml</span></div></div>
                                    </div>
                                    <h6 class="mt-2 text-muted fw-bold">Tabel Faktor Pengenceran & Respon Puncak (Baku)</h6>
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered table-vcenter" id="tabelBaku">
                                            <thead class="bg-light text-center">
                                                <tr>
                                                    <th style="min-width: 150px;">Faktor Pengenceran</th>
                                                    <th>Vol. Baku Antara</th>
                                                    <th>Vol Akhir</th>
                                                    <th>Vol. Penyuntikan</th>
                                                    <th>RT</th>
                                                    <th>Area</th>
                                                    <th>Rasio</th>
                                                    <th>Lambda Max</th>
                                                    <th style="width: 50px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="baku_faktor[]" class="form-control" required></td>
                                                    <td><input type="text" name="baku_antara[]" class="form-control decimal-number" required></td>
                                                     <td><div class="input-group"><input type="text" name="baku_vol_akhir[]" class="form-control decimal-number" required><span class="input-group-text" >ml</span></div></td>
                                                    <td><div class="input-group"><input type="text" name="baku_vol_suntik[]" class="form-control decimal-number" required><span class="input-group-text">&#181;l</span></div></td>
                                                    <td><input type="text" name="baku_rt[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="baku_area[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="baku_rasio[]" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="baku_lambda[]" class="form-control decimal-number"></td>
                                                    <td class="text-center"><button type="button" class="btn btn-sm btn-danger btn-remove-row" disabled><i class="fa fa-trash"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-sm btn-success" id="btnAddRowBaku"><i class="fa fa-plus"></i> Tambah Baris</button>
                                    </div>

                                    <hr>
                                    <h5 class="mb-3 text-primary fw-bold">IV. Data Baku Internal</h5>
                                    
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered table-vcenter">
                                            <thead class="bg-light text-center">
                                                <tr>
                                                    <th>Wadah + Contoh</th>
                                                    <th>Wadah + Sisa</th>
                                                    <th>Contoh</th>
                                                    <th>Faktor Pengenceran</th>
                                                    <th>Vol. Penyuntikan</th>
                                                     <th>RT</th>
                                                    <th>Area</th>
                                                    <th>Rasio</th>
                                                    <th>Lambda max</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="internal_wadah_contoh" id="internal_wadah_contoh" class="form-control decimal-number" ></td>
                                                    <td><input type="text" name="internal_wadah_sisa" id="internal_wadah_sisa" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="internal_contoh" id="internal_contoh" class="form-control decimal-number" readonly></td>
                                                    <td><input type="text" name="internal_faktor" class="form-control"></td>
                                                    <td><div class="input-group"><input type="text" name="internal_vol_suntik" class="form-control decimal-number"><span class="input-group-text" >&#181;l</span></div></td>
                                                    <td><input type="text" name="internal_rt" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="internal_area" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="internal_rasio" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="internal_lambda" class="form-control decimal-number"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>

                                    <h5 class="mb-3 text-primary fw-bold">V. Data Penimbangan Sampel (Zat Uji)</h5>
                                    
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered table-vcenter">
                                            <thead class="bg-light text-center">
                                                <tr>
                                                    <th>Wadah + Contoh</th>
                                                    <th>Wadah + Sisa</th>
                                                    <th>Contoh</th>
                                                    <th>Faktor Pengenceran(jadikan number)</th>
                                                    <th>Volume Penyuntikan</th>
                                                    <th>RT</th>
                                                    <th>Area</th>
                                                    <th>Rasio</th>
                                                    <th>Lambda Max</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="uji_wadah_contoh[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_wadah_sisa[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_contoh[]" class="form-control decimal-number" readonly></td>
                                                    <td><input type="text" name="uji_faktor[]" class="form-control" required></td>
                                                    <td><div class="input-group"><input type="text" name="uji_vol[]" class="form-control decimal-number" required><span class="input-group-text" >&#181;l</span></div></td>
                                                    <td><input type="text" name="uji_rt[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_area[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_rasio[]" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="uji_lambda[]" class="form-control decimal-number"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="uji_wadah_contoh[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_wadah_sisa[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_contoh[]" class="form-control decimal-number" readonly></td>
                                                    <td><input type="text" name="uji_faktor[]" class="form-control" required></td>
                                                    <td><div class="input-group"><input type="text" name="uji_vol[]" class="form-control decimal-number" required><span class="input-group-text">&#181;l</span></div></td>
                                                    <td><input type="text" name="uji_rt[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_area[]" class="form-control decimal-number" required></td>
                                                    <td><input type="text" name="uji_rasio[]" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="uji_lambda[]" class="form-control decimal-number"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>

                                    <hr>
                                    <h5 class="mb-3 text-primary fw-bold">VI. Data Penimbangan Spike</h5>

                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered table-vcenter">
                                            <thead class="bg-light text-center">
                                                <tr>
                                                    <th>Wadah + Contoh</th>
                                                    <th>Wadah + Sisa</th>
                                                    <th>Contoh</th>
                                                    <th>Faktor Pengenceran(jadikan number)</th>
                                                    <th>Volume Penyuntikan</th>
                                                    <th>RT</th>
                                                    <th>Area</th>
                                                    <th>Rasio</th>
                                                    <th>Lambda Max</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="spike_wadah_contoh" id="spike_wadah_contoh" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="spike_wadah_sisa" id="spike_wadah_sisa" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="spike_contoh" id="spike_contoh" class="form-control decimal-number" readonly></td>
                                                    <td><input type="text" name="spike_faktor" class="form-control"></td>
                                                    <td><div class="input-group"><input type="text" name="spike_vol" class="form-control decimal-number"><span class="input-group-text">&#181;l</span></div></td>
                                                    <td><input type="text" name="spike_rt" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="spike_area" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="spike_rasio" class="form-control decimal-number"></td>
                                                    <td><input type="text" name="spike_lambda" class="form-control decimal-number"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="form-row mb-2">
                                        <div class="col-xl-12"><label class="form-label">Penambahan Baku Spike</label><input type="number" class="form-control" name="spike_penambahan_baku" placeholder="Contoh : 0.0000"></div>
                                    </div>

                                    <hr>
                                    <h5 class="mb-3 text-primary fw-bold">VII. Kesimpulan & Referensi</h5>
                                    
                                    <div class="form-row">
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Metode LOD / LOQ</label>
                                            <select name="metode_lod_loq" id="metode_lod_loq" class="form-control form-select" required>
                                                <option value="">Pilih Metode...</option>
                                              
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-label">Cara Penyajian</label>
                                            <input type="number" class="form-control" name="takaran_sampel">
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-label">Takaran Pelarut</label>
                                            <input type="number" class="form-control" name="takaran_pelarut">
                                        </div>
                                        
                                        <div class="col-xl-12" style="margin-top: -10px; margin-bottom: 15px;">
                                            <small class="text-muted text-danger" style="font-size: 12px;">
                                                <i class="fa fa-info-circle me-1"></i> Catatan: Isi hanya jika terdapat takaran sampel dan takaran pelarut.
                                            </small>
                                        </div>
                                    </div>
                                    

                                    <div class="form-row">
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label fw-bold">Syarat</label>
                                            <select name="syarat" class="form-control form-select" required>
                                                <option value="" disabled selected>Pilih Syarat...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary" style="width:150px;">Proses</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="{{ asset('vendor/js/custom.js')}}"></script>
    <script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

    <!-- INTERNAL Bootstrap-Datepicker js-->
    <script src="{{ asset('vendor/plugins/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
     
     <!-- TIMEPICKER JS -->
     <script src="{{ asset('vendor/plugins/time-picker/jquery.timepicker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/time-picker/toggles.min.js')}}"></script>
 
      <!-- DATEPICKER JS -->
      <script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>
       
     <!-- FORMELEMENTS JS -->
     <script src="{{ asset('vendor/js/formelementadvnced.js')}}"></script>
     <script src="{{ asset('vendor/js/form-elements.js')}}"></script>
 
     <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
    <script type="text/javascript">

        $(document).ready(function() {
            $('#zat_uji').change(function(){

            let zatId = $(this).val();

            /* ===============================
                RESET FIELD TURUNAN
            =============================== */
            $('#pustaka').html('<option value="">Loading...</option>');
            $('#no_kontrol').html('<option value="">Loading...</option>');
            $('#metode_lod_loq').html('<option value="">Loading...</option>');

            $('#baku_pembanding, #kadar_kb, #susut_pengeringan, #kadar_terkoreksi').val('');

            if(!zatId){
                $('#pustaka').html('<option value="">Pilih Pustaka...</option>');
                $('#no_kontrol').html('<option value="">Pilih No Kontrol...</option>');
                $('#metode_lod_loq').html('<option value="">Pilih Metode...</option>');
                return;
            }

            /* ===============================
                AJAX 1 : AMBIL PUSTAKA
            =============================== */
            $.ajax({
                url: '/get-pustaka/' + zatId,
                type: 'GET',
                success: function(response){

                    $('#pustaka').empty()
                        .append('<option value="">Pilih Pustaka...</option>');

                    response.forEach(function(item){
                        $('#pustaka').append(
                            `<option value="${item.id}">${item.pustaka}</option>`
                        );
                    });
                }
            });

            /* ===============================
                AJAX 2 : AMBIL NO KONTROL
            =============================== */
            $.ajax({
                url: '/get-no-kontrol/' + zatId,
                type: 'GET',
                success: function(response){

                    $('#no_kontrol').empty()
                        .append('<option value="">Pilih No Kontrol...</option>');

                    response.forEach(function(item){
                        $('#no_kontrol').append(
                            `<option value="${item.id}">${item.no_kontrol}</option>`
                        );
                    });
                }
            });
            /* ===============================
                AJAX 2 : AMBIL NO KONTROL
            =============================== */
            $.ajax({
                url: '/get-parameter-uji/' + zatId,
                type: 'GET',
                success: function(response){

                    $('#metode_lod_loq').empty()
                        .append('<option value="">Pilih Metode...</option>');

                    response.forEach(function(item){
                        $('#metode_lod_loq').append(
                            `<option value="${item.id}">Kategory: ${item.kategori} | LOD: ${item.lod} | LOQ: ${item.loq} </option>`
                        );
                    });
                }
            });
            });
           

            $('#pustaka').change(function(){

                var pustakaId = $(this).val();
                $('#pelarut, #jenis_kolom, #fase_gerak').val('Loading...');
                $.ajax({
                    url: '/sipatuju/get-detail-pustaka/' + pustakaId,
                    type: 'GET',
                    success: function(data){

                        var faseGerak = $('<div>').html(data.fase_gerak).text();

                        $('#pelarut').val(data.pelarut);
                        $('#jenis_kolom').val(data.jns_kolom);
                        $('#ukuran_partikel').val(data.ukuran);
                        $('#dimensi_kolom').val(data.panjang_diameter);
                        $('#panjang_gelombang').val(data.panjang_gel);
                        $('#detektor').val(data.detector);
                        var cleanText = $('<div>').html(data.fase_gerak).text();
                        $('#fase_gerak').val(faseGerak);
                        $('#laju_air').val(data.laju_air);
                    }
                });

            }); 
            $('#merk_alat').change(function(){

                var merek = $(this).val();

                $('#tipe_seri').html('<option value="">Loading...</option>');

                $.ajax({
                    url: "{{ route('get.tipe.seri', ':merek') }}".replace(':merek', merek),
                    type: 'GET',
                    success: function(response){

                        $('#tipe_seri').empty();
                        $('#tipe_seri').append('<option value="">Pilih Type/Seri...</option>');

                        response.forEach(function(item){
                            $('#tipe_seri').append(
                                `<option value="${item.id}">
                                    ${item.tipe_seri}
                                </option>`
                            );
                        });
                    }
                });

            });
            $('#no_kontrol').change(function () {

                let id = $(this).val();

                $.ajax({
                    url: "{{ route('get.detail.baku', ':id') }}".replace(':id', id),
                    success: function (data) {

                        $('#baku_pembanding').val(data.baku);
                        $('#kadar_kb').val(data.kadar);
                        $('#susut_pengeringan').val(data.susut);
                        $('#kadar_terkoreksi').val(data.koreksi);
                    }
                });
            });


            // Baku Contoh auto fill

             $('#baku_wadah_contoh, #baku_wadah_sisa').on('input', function () {
                let a = parseFloat($('#baku_wadah_contoh').val()) || 0;
                let b = parseFloat($('#baku_wadah_sisa').val()) || 0;

                let hasil = a - b;

                // 3 angka di belakang koma
                $('#baku_contoh').val(hasil.toFixed(3));
            });

              // Internal Contoh auto fill

             $('#internal_wadah_contoh, #internal_wadah_sisa').on('input', function () {
                let a = parseFloat($('#internal_wadah_contoh').val()) || 0;
                let b = parseFloat($('#internal_wadah_sisa').val()) || 0;

                let hasil = a - b;

                // 3 angka di belakang koma
                $('#internal_contoh').val(hasil.toFixed(4));
            });

            // spike Contoh auto fill

             $('#spike_wadah_contoh, #spike_wadah_sisa').on('input', function () {
                let a = parseFloat($('#spike_wadah_contoh').val()) || 0;
                let b = parseFloat($('#spike_wadah_sisa').val()) || 0;

                let hasil = a - b;

                // 3 angka di belakang koma
                $('#spike_contoh').val(hasil.toFixed(4));
            });

            // Uji Contoh auto fill 
            $(document).on('input', 
                'input[name="uji_wadah_contoh[]"], input[name="uji_wadah_sisa[]"]', 
                function () {

                    let row = $(this).closest('tr');

                    let a = parseFloat(row.find('input[name="uji_wadah_contoh[]"]').val()) || 0;
                    let b = parseFloat(row.find('input[name="uji_wadah_sisa[]"]').val()) || 0;

                    let hasil = a - b;

                    // 3 angka di belakang koma
                    row.find('input[name="uji_contoh[]"]').val(hasil.toFixed(3));
            });


            // Dynamic Table Baku
            var maxRows = 10;
            var wrapperBaku = $("#tabelBaku tbody");
            $("#btnAddRowBaku").click(function(e){
                e.preventDefault();
                if(wrapperBaku.children().length < maxRows){
                    wrapperBaku.append(`<tr>
                                            <td><input type="text" name="baku_faktor[]" class="form-control" required></td>
                                            <td><input type="text" name="baku_antara[]" class="form-control decimal-number" required></td>
                                            <td><div class="input-group"><input type="text" name="baku_vol_akhir[]" class="form-control decimal-number" required><span class="input-group-text" >ml</span></div></td>
                                            <td><div class="input-group"><input type="text" name="baku_vol_suntik[]" class="form-control decimal-number" required><span class="input-group-text">&#181;l</span></div></td>
                                            <td><input type="text" name="baku_rt[]" class="form-control decimal-number" required></td>
                                            <td><input type="text" name="baku_area[]" class="form-control decimal-number" required></td><td>
                                            <input type="text" name="baku_rasio[]" class="form-control decimal-number"></td><td>
                                            <input type="text" name="baku_lambda[]" class="form-control decimal-number"></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-danger btn-remove-row"><i class="fa fa-trash"></i></button></td>
                                        </tr>`);
                } else { alert('Maksimal 10 baris!'); }
            });
            $(wrapperBaku).on("click", ".btn-remove-row", function(e){ e.preventDefault(); $(this).closest('tr').remove(); });

            /* ==========================================
            DECIMAL VALIDATION (GLOBAL)
            ========================================== */
           $(document).on('input', 'input.decimal-number', function () {

                let originalValue = $(this).val();
                let value = originalValue;

                // Hapus semua selain angka dan titik
                value = value.replace(/[^0-9.]/g, '');

                // Cegah lebih dari satu titik
                let parts = value.split('.');
                if (parts.length > 2) {
                    value = parts[0] + '.' + parts.slice(1).join('');
                }

                // Tentukan tempat warning akan muncul
                let warningContainer = $(this).closest('.input-group').length 
                    ? $(this).closest('.input-group') 
                    : $(this);

                // Hapus warning lama
                warningContainer.next('.decimal-warning').remove();

                // Jika user mengetik koma
                if (originalValue.includes(',')) {
                    warningContainer.after(
                        '<small class="text-danger decimal-warning d-block mt-1">Gunakan titik (.) untuk desimal</small>'
                    );
                }

                $(this).val(value);
            });

            /* ==========================================
            JQUERY VALIDATE GLOBAL FORM
            ========================================== */
            $(document).ready(function () {

                $("#formStep1").validate({

                    ignore: [],

                    rules: {
                        merk_alat: "required",
                        rekorder: "required",
                        pelarut: "required",
                        no_kontrol: "required",
                        metode_lod_loq: "required"
                    },

                    messages: {
                        merk_alat: "Field ini wajib diisi.",
                        rekorder: "Field ini wajib diisi.",
                        pelarut: "Field ini wajib diisi.",
                        no_kontrol: "Field ini wajib diisi.",
                        metode_lod_loq: "Field ini wajib diisi."
                    },

                    errorElement: "div",

                    highlight: function (element) {
                        $(element).addClass('is-invalid');
                    },

                    unhighlight: function (element) {
                        $(element).removeClass('is-invalid');
                    },

                    errorPlacement: function (error, element) {

                        error.addClass("invalid-feedback d-block");

                        if (element.closest('.input-group').length) {
                            error.insertAfter(element.closest('.input-group'));
                        }
                        else if (element.hasClass("select2-hidden-accessible")) {
                            error.insertAfter(element.next('.select2'));
                        }
                        else {
                            error.insertAfter(element);
                        }
                    }

                });

            });
        });
    
      
    </script>
</x-HomeLayout>