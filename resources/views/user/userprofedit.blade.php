<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Users</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users Profile Edit</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW-1 OPEN -->
                <div class="row">
                @if (session() -> has('succes'))
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Success</h4>
							<p class="card-text">{{ session() -> get('succes')}}</p>
						</div>
					@endif 
                    @if (session() -> has('unsucces'))
						<div class="card-body text-center" id="success"> 
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Gagal</h4>
							<p class="card-text">{{ session() -> get('unsucces')}}</p>
						</div>
					@endif 
                            <div class="col-xl-4">
                                <div class="card">
                                <form id="editForm1" method="post" class="form-horizontal" action="/user/{{ Auth::user()->id }}/editpass" >
                                    <div class="card-header">
                                        <div class="card-title">Edit Password</div>
                                    </div>
                                    <div class="card-body">
                                   
                                    @csrf
									@method('put')
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label class="form-label">Password Sekarang</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control @error('currentpass') is-invalid @enderror" id="currentpass" name="currentpass" type="password" placeholder="Current Password">
                                                @error('currentpass')
											    <span class="invalid-feedback"> {{ $message }} </span>
											    @enderror	
                                            </div>
                                            <!-- <input type="password" class="form-control" value="password"> -->
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label class="form-label">Password Baru</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control @error('newpass') is-invalid @enderror" id="newpass" name="newpass" type="password" placeholder="New Password">
                                                @error('newpass')
											    <span class="invalid-feedback"> {{ $message }} </span>
											    @enderror	
                                            </div>
                                            <!-- <input type="password" class="form-control" value="password"> -->
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label class="form-label">Konfirmasi Password Baru</label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control @error('confirmpass') is-invalid @enderror" id="confirmpass" name="confirmpass" type="password" placeholder="Confirm Password">
                                                @error('confirmpass')
											    <span class="invalid-feedback"> {{ $message }} </span>
											    @enderror	
                                            </div>
                                            <!-- <input type="password" class="form-control" value="password"> -->
                                        </div>
                                        </div>
                                    
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-danger my-1">Reset</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="card ">
                                <form id="editForm4" method="post" class="form-horizontal" action="/user/{{$data['profile']->id }}/editaddr" >
                                    <div class="card-header">
                                        <div class="float-start">
                                            <h3 class="card-title">Alamat</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="card-body">
                                    @csrf
									@method('put')
                                            <li class="list-group-item d-flex ps-3">
                                                <div class="social social-profile-buttons me-2">
                                                    <a class="social-icon text-primary" href=""><i class="fe fe-briefcase"></i></a>
                                                </div>
                                                <span class="my-auto">
                                                <textarea class="form-control mb-4 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat"  required="" rows="5">{{$data['profile']->alamat}}</textarea>
                                                @error('alamat')
											    <span class="invalid-feedback"> {{ $message }} </span>
											    @enderror	
                                                </span>
                                            </li>
                                            <li class="list-group-item d-flex ps-3">
                                                <div class="social social-profile-buttons me-2">
                                                    <a class="social-icon text-primary" href=""><i class="fe fe-map-pin"></i></a>
                                                </div>
                                                <span class="my-auto">
                                                <textarea class="form-control mb-4 @error('domisili') is-invalid @enderror" id="domisili" name="domisili" placeholder="Domisili" required="" rows="5">{{$data['profile']-> domisili}}</textarea>
                                                </span>
                                            </li>
                                            <li class="list-group-item d-flex ps-3">
                                                <div class="social social-profile-buttons me-2">
                                                    <a class="social-icon text-primary" href=""><i class="fe fe-phone"></i></a>
                                                </div>
                                                <span class="my-auto">
                                                <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon" name="telpon" value="{{$data['profile']->telpon}}" placeholder="08**********">
                                                    @error('telpon')
											        <span class="invalid-feedback"> {{ $message }} </span>
											        @enderror	
                                                </span>
                                            </li>
                                           
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-danger my-1">Reset</button>
                                    </div>
                                </form>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Delete Account</div>
                                    </div>
                                    <div class="card-body">
                                        <p>Its Advisable for you to request your data to be sent to your Email.</p>
                                        <label class="custom-control custom-checkbox mb-0">
                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked>
                                            <span class="custom-control-label">Yes, Send my data to my Email.</span>
                                        </label>
                                    </div>
                                    <div class="card-footer text-end">
                                        <a href="javascript:void(0)" class="btn btn-primary my-1">Deactivate</a>
                                        <a href="javascript:void(0)" class="btn btn-danger my-1">Delete Account</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                            <form id="editForm2" method="post" class="form-horizontal" action="/user/{{ Auth::user()->id }}/editprof" enctype="multipart/form-data" >
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Profile</h3>
                                    </div>
                                    @csrf
									@method('put')
                                    <div class="card-body">
                                         <div class="text-center chat-image mb-5">
                                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                                <a class="" href=""><img alt="avatar" src="{{ Auth::user()->image }}" class="brround"></a>
                                            </div>
                                            <div class="main-chat-msg-name">
                                                <a href="profile.html">
                                                    <h5 class="mb-1 text-dark fw-semibold">{{$data['user']->name}}</h5>
                                                </a>
                                                <p class="text-muted mt-0 mb-0 pt-0 fs-13">{{$data['user']->username}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                <div class="col-xl-12 mb-12 ">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$data['user']->name}}" placeholder="Nama">
                                                    @error('nama')
											        <span class="invalid-feedback"> {{ $message }} </span>
											        @enderror	
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                <div class="col-xl-12 mb-12 ">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{$data['user']->username}}" readonly="readonly" placeholder="Username">
                                                    @error('username')
											        <span class="invalid-feedback"> {{ $message }} </span>
											         @enderror	
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$data['user']->email}}" readonly="readonly" placeholder="Email address">
                                            @error('email')
											    <span class="invalid-feedback"> {{ $message }} </span>
											    @enderror	
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label class="form-label mt-0">Ganti Foto</label>
                                            <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto" id="foto">
                                            @error('foto')
											    <span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
                                            <span>* Pilih foto hanya untuk mengganti foto</span><br>
                                            <span>* Ukuran maksimal file 500kb dan berextensi jpg,img,png,gif</span>
                                        </div>
                                        </div>
                                        
                                      
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-danger my-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                                <div class="card">
                                <form id="editForm5" method="post" class="form-horizontal" action="/user/{{$data['profile']->id}}/editpeg" >
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Data Pegawai</h3>
                                    </div>
                                    @csrf
									@method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="nip">NIP.</label>
                                            <input type="text"  class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{$data['profile']->nip}}" placeholder="NIP">
                                            @error('nip')
											        <span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="jabatan">Jabatan</label>
                                            <select name="jabatan" class="form-control form-select select2" data-bs-placeholder="Unit Kerja Terkecil">
                                                    <option value="{{$data['profile']->jabatan}}">{{$data['profile']->jabatan}}</option>
                                                    <option value="-">-</option>
													<option value="Kepala Balai Besar POM di Makassar">Kepala Balai Besar POM di Makassar</option>
													<option value="Kepala Bagian Tata Usaha pada Balai Besar POM di Makassar">Kepala Bagian Tata Usaha pada Balai Besar POM di Makassar</option>
													<option value="Analis Kepegawaian Muda">Analis Kepegawaian Muda</option>
													<option value="Pengawas Farmasi dan Makanan Ahli Madya">Pengawas Farmasi dan Makanan Ahli Madya</option>
													<option value="Pengawas Farmasi dan Makanan Penyelia">Pengawas Farmasi dan Makanan Penyelia</option>
													<option value="Analis Pengelolaan Keuangan APBN">Analis Pengelolaan Keuangan APBN</option>
													<option value="Pengawas Farmasi dan Makanan Keahlian">Pengawas Farmasi dan Makanan Keahlian</option>
													<option value="Fungsional Umum">Fungsional Umum</option>
													<option value="Pranata Keuangan APBN Terampil">Pranata Keuangan APBN Terampil</option>
													<option value="Verifikator Keuangan">Verifikator Keuangan</option>
													<option value="Analis Pengelolaan Keuangan APBN Ahli Muda">Analis Pengelolaan Keuangan APBN Ahli Muda</option>
                                                    <option value="Perencana Muda">Perencana Muda</option>
                                                    <option value="Analis Layanan Umum">Analis Layanan Umum</option>
                                                    <option value="Analis Pengelolaan Keuangan APBN Ahli Pertama">Analis Pengelolaan Keuangan APBN Ahli Pertama</option>
                                                    <option value="Arsiparis Pertama">Arsiparis Pertama</option>
                                                    <option value="Analis kepegawaian Pelaksana">Analis kepegawaian Pelaksana</option>
                                                    <option value="Analis Pengelola BMN">Analis Pengelola BMN</option>
                                                    <option value="Pranata Komputer Muda">Pranata Komputer Muda</option>
                                                    <option value="Pranata Komputer Pertama">Pranata Komputer Pertama</option>
                                                    <option value="Pengelola Barang Persediaan BMN">Pengelola Barang Persediaan BMN</option>
                                                    <option value="Analis Barang dan Jasa">Analis Barang dan Jasa</option>
                                                    <option value="Pengawas Farmasi dan Makanan Ahli Muda">Pengawas Farmasi dan Makanan Ahli Muda</option>
                                                    <option value="Analis Laboratorium">Analis Laboratorium</option>
                                                    <option value="Pengawas Farmasi dan Makanan Ahli Pertama">Pengawas Farmasi dan Makanan Ahli Pertama</option>
                                                    <option value="Pengawas Farmasi dan Makanan Mahir">Pengawas Farmasi dan Makanan Mahir</option>
                                                    <option value="Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan">Analis Pemeriksa Sarana dan Penyidik Obat dan Makanan</option>
                                                    <option value="Pengawas Farmasi dan Makanan Terampil">Pengawas Farmasi dan Makanan Terampil</option>
                                                    <option value="Pengelola Pengadaan Barang/Jasa">Pengelola Pengadaan Barang/Jasa</option>
                                                    <option value="Analis Keuangan">Analis Keuangan</option>
                                                    <option value="Perencana Pertama">Perencana Pertama</option>
												</select>	
                                        </div>
                                        </div>
                                   
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="type">Type Pegawai</label>
                                            <select name="type" class="form-control form-select select2" data-bs-placeholder="Unit Kerja Terkecil">
                                                    <option value="{{$data['profile']->type}}">{{$data['profile']->type}}</option>
                                                    <option value="-">-</option>
													<option value="Struktural">Struktural</option>
													<option value="Fungsional">Fungsional</option>
													<option value="Pelaksana">Pelaksana</option>
												</select>	
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="pangkat">Golongan</label>
                                            <select name="pangkat" class="form-control form-select select2" data-bs-placeholder="Unit Kerja Terkecil">
                                                    <option value="{{$data['profile']->pangkat}}">{{$data['profile']->pangkat}}</option>
                                                    <option value="-">-</option>
													<option value="Pengatur Muda, II/a">Pengatur Muda, II/a</option>
													<option value="Pengatur Muda Tingkat 1, II/b">Pengatur Muda Tingkat 1, II/b</option>
													<option value="Pengatur, II/c">Pengatur, II/c</option>
													<option value="Pengatur Tingkat 1, II/d">Pengatur Tingkat 1, II/d</option>
													<option value="Penata Muda, III/a">Penata Muda, III/a</option>
													<option value="Penata Muda Tingkat 1, III/b">Penata Muda Tingkat 1, III/b</option>
													<option value="Penata, III/c">Penata, III/c</option>
													<option value="Penata Tingkat 1, III/d">Penata Tingkat 1, III/d</option>
													<option value="Pembina, IV/a">Pembina, IV/a</option>
													<option value="Pembina Tingkat 1, IV/b">Pembina Tingkat 1, IV/b</option>
													<option value="Pembina Utama Muda, IV/c">Pembina Utama Muda, IV/c</option>
                                                    <option value="Pembina Utama Madya, IV/d">Pembina Utama Madya, IV/d</option>
												</select>	
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="type_asn">Status Kepegawaian</label>
                                            <select name="type_asn" class="form-control form-select select2" data-bs-placeholder="Unit Kerja Terkecil">
                                                    <option value="{{$data['user']->type}}">
                                                        @if($data['user']->type==0)
                                                        -
                                                        @elseif ($data['user']->type==1)
                                                        ASN/PNS
                                                        @elseif ($data['user']->type==2)
                                                        PPNPN
                                                        @elseif ($data['user']->type==3)
                                                        External
                                                        @endif
                                                    </option>
                                                    <option value="0">-</option>
													<option value="1">ASN/PNS</option>
													<option value="2">PPNPN</option>
													
												</select>	
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="unit">Unit Kerja Terkecil</label>
                                            <select name="unit" class="form-control form-select select2" data-bs-placeholder="Unit Kerja Terkecil">
                                                    <option value="{{$data['profile']->unit}}">{{$data['profile']->unit}}</option>
                                                    <option value="-">-</option>
													<option value="Balai Besar POM di Makassar">Balai Besar POM di Makassar</option>
													<option value="Bagian Tata Usaha">Bagian Tata Usaha</option>
													<option value="Subkelompok substansi Program dan Evaluasi">Subkelompok substansi Program dan Evaluasi</option>
													<option value="Subkelompok substansi Umum">Subkelompok substansi Umum</option>
													<option value="Kelompok substansi Pengujian">Kelompok substansi Pengujian</option>
													<option value="Subkelompok substansi Pengujian Kimia">Subkelompok substansi Pengujian Kimia</option>
													<option value="Subkelompok substansi Pengujian Mikrobiologi">Subkelompok substansi Pengujian Mikrobiologi</option>
													<option value="Kelompok substansi Pemeriksaan">Kelompok substansi Pemeriksaan</option>
													<option value="Subkelompok substansi Inspeksi">Subkelompok substansi Inspeksi</option>
													<option value="Subkelompok substansi Sertifikasi">Subkelompok substansi Sertifikasi</option>
													<option value="Kelompok substansi Penindakan">Kelompok substansi Penindakan</option>
                                                    <option value="Kelompok substansi Informasi dan Komunikasi">Kelompok substansi Informasi dan Komunikasi</option>
												</select>	
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-danger my-1">Reset</button>
                                    </div>
                                </form>
                                </div>
                                <div class="card">
                                <form id="editForm3" method="post" class="form-horizontal" action="/user/{{$data['profile']->id}}/editsosmed" >
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Sosial Media</h3>
                                    </div>
                                    @csrf
									@method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{$data['profile']->facebook}}" placeholder="Facebook">
                                            @error('facebook')
											        <span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
                                        </div>
                                        </div>
                                   
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="twitter">Twitter</label>
                                            <input type="text"  class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{$data['profile']->twitter}}" placeholder="Twitter">
                                            @error('twitter')
											        <span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
                                        </div>
                                        </div>
                                   
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="youtube">Youtube</label>
                                            <input type="text"  class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{$data['profile']->youtube}}" placeholder="Youtube">
                                            @error('youtube')
											        <span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
                                        </div>
                                        </div>
                                   
                                        <div class="form-group">
                                        <div class="col-xl-12 mb-12 ">
                                            <label for="instagram">Instagram</label>
                                            <input type="text"  class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{$data['profile']->instagram}}" placeholder="Instagram">
                                            @error('instagram')
											        <span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-danger my-1">Reset</button>
                                    </div>
                                </form>
                                </div>
                               
                               
                            </div>
                            
                        </div>
                        <!-- ROW-1 CLOSED -->
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

    	<!-- FORMVALIDATION JS -->
	<script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('vendor/js/show-password.min.js')}}"></script>
</x-HomeLayout>
<script type="text/javascript">
    
	setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#editForm1" ).validate( {
				rules: {
                    currentpass: {
						required: true,
						minlength: 8
					},
                    newpass: {
						required: true,
						minlength: 8
					},
					confirmpass: {
						required: true,
						minlength: 8,
						equalTo: "#newpass"
					}

				},
				messages: {
					
                    currentpass : {
						required: "Tolong masukkan Password sekarang",
						minlength: "Password anda harus lebih dari 8 karakter"
					},
                    newpass: {
						required: "Tolong masukkan Password",
						minlength: "Password anda harus lebih dari 8 karakter"
					},
					confirmpass: {
						required: "Tolong konfirmasi password anda",
						minlength: "Password anda harus lebih dari 8 karakter",
						equalTo: "Tolong masukkan password yang sama dengan di atas"
					}			
                },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".mb-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).parents( ".form-control" ).addClass( "is-invalid" ).removeClass( "valid" );
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".mb-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).parents( ".form-control" ).addClass( "valid" ).removeClass( "is-invalid" );
				
				}
			} );
		} );
        $( document ).ready( function () {
			$( "#editForm2" ).validate( {
				rules: {
                    nama: {
						required: true,
						minlength: 3
					}                   
					

				},
				messages: {
					
                   nama : {
						required: "Kolom nama harus diisi",
						minlength: "Kolom nama berisi minimal 3 karakter"
					}
                   
                },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".mb-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).parents( ".form-control" ).addClass( "is-invalid" ).removeClass( "valid" );
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".mb-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).parents( ".form-control" ).addClass( "valid" ).removeClass( "is-invalid" );
				
				}
			} );
		} );
        $( document ).ready( function () {
			$( "#editForm3" ).validate( {
				rules: {
                    facebook: 'required',
                    twitter: 'required',                 
					youtube: 'required',
                    instagram: 'required'
				},
				messages: {
					facebook: 'Kolom Facebook harus diisi',
                    twitter: 'Kolom twitter harus diisi',                 
					youtube: 'Kolom youtube harus diisi',
                    instagram: 'Kolom instagram harus diisi' 
                },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".mb-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).parents( ".form-control" ).addClass( "is-invalid" ).removeClass( "valid" );
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".mb-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).parents( ".form-control" ).addClass( "valid" ).removeClass( "is-invalid" );
				
				}
			} );
		} );
        $( document ).ready( function () {
			$( "#editForm4" ).validate( {
				rules: {
                    alamat: 'required',
                    domisili: 'required',                 
					telpon: {
                                required: true,
                                phoneID:true
                            }
				},
				messages: {
                    alamat: 'Kolom Alamat harus diisi',
                    domisili: 'Kolom Domisili harus diisi',                 
					telpon: {
                                required: 'Kolom No. Telpon harus diisi',
                                phoneID:'Harus format No.Telpon indonesia'
                            }
                },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".my-auto" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).parents( ".form-control" ).addClass( "is-invalid" ).removeClass( "valid" );
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".my-auto" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).parents( ".form-control" ).addClass( "valid" ).removeClass( "is-invalid" );
				
				}
			} );
		} );
        $( document ).ready( function () {
			$( "#editForm5" ).validate( {
				rules: {
                    nip: 'required'
				},
				messages: {
					 nip: 'Kolom NIP harus diisi' 
                },
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".mb-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).parents( ".form-control" ).addClass( "is-invalid" ).removeClass( "valid" );
					
					
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".mb-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).parents( ".form-control" ).addClass( "valid" ).removeClass( "is-invalid" );
				
				}
			} );
		} );
	</script>