<x-HomeLayout>
<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Edit Rujukan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data Rujukan</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
					@if (session() -> has('succes'))
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Success</h4>
							<p class="card-text">{{ session() -> get('succes')}}</p>
						</div>
					@endif    	
					<div class="col-lg-12 col-md-12">
					     @if (Auth::user()->is_permission==1 or Auth::user()->is_permission==5) 
                        <a href="/v2-rujukan-view" class="btn btn-primary my-3">View Laporan</a>
                    @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Rujukan</h3>
                            </div>
                            <div class="card-body">
                                <div class="panel panel-primary">
                                    <div class="tab-menu-heading">
                                        <div class="tabs-menu">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs panel-success">
                                                <li><a href="#tab9" class="active " data-bs-toggle="tab"><span><i class="fe fe-user me-1 "></i></span>Identitas Pelapor</a></li>
                                                <li><a href="#tab10" data-bs-toggle="tab"><span><i class="fa fa-address-card me-1"></i></span>Identitas Kasus/Masalah</a></li>
                                                <li><a href="#tab11" data-bs-toggle="tab"><span><i class="fa fa-edit me-1"></i></span>Uraian Masalah</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <form id="signupForm" method="post" class="form-horizontal" action="/v2-rujukan/{{$rujuk->id}}/update" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')			
                                            <div class="tab-content tab-validate">            
                                                <div class="tab-pane active" id="tab9">
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="tgl_terima" class="form-label">Tanggal Terima</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                                </div>
                                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{$rujuk->tgl_terima}}" type="text" name="tgl_terima" id="tgl_terima">
                                                            </div>
                                                            @error('tgl_terima')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="nama" class="form-label">Nama Pelapor</label>
                                                            <input type="text" value="{{ $rujuk->nama }}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" >
                                                            @error('nama')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="ttl" class="form-label">Tempat/Tgl Lahir</label>
                                                            <input type="text" value="{{ $rujuk->ttl }}"  class="form-control  @error('ttl') is-invalid @enderror" id="ttl" name="ttl" >
                                                            @error('ttl')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="umur" class="form-label">Umur</label>
                                                            <input type="text" value="{{ $rujuk->umur }}"  class="form-control  @error('umur') is-invalid @enderror" id="umur" name="umur" >
                                                            @error('umur')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-4 mb-12 ">
                                                            <label class="form-label">Jenis Kelamin</label>
                                                            <select name="kelamin" class="form-control form-select" data-bs-placeholder="Select Country">
                                                                @if($rujuk->kelamin =='Laki-Laki')
                                                                <option value="Laki-Laki" selected>Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                                @else
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan" selected>Perempuan</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="agama" class="form-label">Agama</label>
                                                           
                                                            <select name="agama" class="form-control form-select " data-bs-placeholder="Select Religion">
                                                                @if($rujuk->agama =='Islam')
                                                                <option value="Islam" selected>Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Khonghucu">Khonghucu</option>
                                                                @elseif ($rujuk->agama =='Kristen Protestan')
                                                                <option value="Islam" >Islam</option>
                                                                <option value="Kristen Protestan" selected>Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Khonghucu">Khonghucu</option>
                                                                @elseif ($rujuk->agama =='Kristen Katolik')
                                                                <option value="Islam" >Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik" selected>Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Khonghucu">Khonghucu</option>
                                                                @elseif ($rujuk->agama =='Hindu')
                                                                <option value="Islam" >Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu" selected>Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Khonghucu">Khonghucu</option>
                                                                @elseif ($rujuk->agama =='Buddha')
                                                                <option value="Islam" >Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha" selected>Buddha</option>
                                                                <option value="Khonghucu">Khonghucu</option>
                                                                @elseif ($rujuk->agama =='Khonghucu')
                                                                <option value="Islam" >Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Khonghucu" selected>Khonghucu</option>
                                                                @endif
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                            <input type="text" value="{{ $rujuk->pekerjaan }}"  class="form-control  @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" >
                                                            @error('pekerjaan')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="jenis" class="form-label">Alamat</label>
                                                            <textarea  class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  rows="4">{{ $rujuk->alamat }}</textarea>
                                                            @error('alamat')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="hp" class="form-label">HP/Telp.</label>
                                                            <input type="text" value="{{ $rujuk->hp }}"   class="form-control  @error('hp') is-invalid @enderror" id="hp" name="hp" >
                                                            @error('hp')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="fax" class="form-label">No. Fax</label>
                                                            <input type="text" value="{{ $rujuk->fax }}"   class="form-control  @error('fax') is-invalid @enderror" id="fax" name="fax" >
                                                            @error('fax')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" value="{{ $rujuk->email }}"   class="form-control  @error('email') is-invalid @enderror" id="email" name="email" >
                                                            @error('email')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                                
                                                <div class="tab-pane" id="tab10">
                                                    
                                                    <div class="form-row">
                                                        <div class="col-xl-4 mb-12 ">
                                                            <label class="form-label">Jenis Pengaduan</label>
                                                            <select  name="pengaduan" class="form-control form-select" data-bs-placeholder="Select Country">
                                                                @if($rujuk->pengaduan=='Langsung')
                                                                <option value="Langsung" selected>Langsung</option>
                                                                <option value="Telp">Telp</option>
                                                                <option value="Fax">Fax</option>
                                                                <option value="Surat">Surat</option>
                                                                <option value="Email">Email</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                                @elseif($rujuk->pengaduan=='Telp')
                                                                <option value="Langsung">Langsung</option>
                                                                <option value="Telp" selected>Telp</option>
                                                                <option value="Fax">Fax</option>
                                                                <option value="Surat">Surat</option>
                                                                <option value="Email">Email</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                                @elseif($rujuk->pengaduan=='Fax')
                                                                <option value="Langsung">Langsung</option>
                                                                <option value="Telp">Telp</option>
                                                                <option value="Fax" selected>Fax</option>
                                                                <option value="Surat">Surat</option>
                                                                <option value="Email">Email</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                                @elseif($rujuk->pengaduan=='Surat')
                                                                <option value="Langsung">Langsung</option>
                                                                <option value="Telp">Telp</option>
                                                                <option value="Fax">Fax</option>
                                                                <option value="Surat" selected>Surat</option>
                                                                <option value="Email">Email</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                                @elseif($rujuk->pengaduan=='Email')
                                                                <option value="Langsung">Langsung</option>
                                                                <option value="Telp">Telp</option>
                                                                <option value="Fax">Fax</option>
                                                                <option value="Surat">Surat</option>
                                                                <option value="Email" selected>Email</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                                @else
                                                                <option value="Langsung">Langsung</option>
                                                                <option value="Telp">Telp</option>
                                                                <option value="Fax">Fax</option>
                                                                <option value="Surat">Surat</option>
                                                                <option value="Email">Email</option>
                                                                <option value="WhatsApp" selected>WhatsApp</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="produk" class="form-label">Nama Produk</label>
                                                            <input type="text" value="{{ $rujuk->produk }}"  class="form-control  @error('produk') is-invalid @enderror" id="produk" name="produk" >
                                                            @error('produk')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-4 mb-12 ">
                                                            <label for="regis" class="form-label">No. Registrasi</label>
                                                            <input type="text" value="{{ $rujuk->regis }}"  class="form-control  @error('regis') is-invalid @enderror" id="regis" name="regis" >
                                                            @error('regis')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-4 mb-12 ">
                                                            <label for="batch" class="form-label">No. Batch</label>
                                                            <input type="text" value="{{ $rujuk->batch }}"   class="form-control  @error('batch') is-invalid @enderror" id="batch" name="batch" >
                                                            @error('batch')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-4 mb-12 ">
                                                            <label for="kadaluarsa" class="form-label">Kadaluarsa</label>
                                                            <input type="text"  value="{{ $rujuk->kadaluarsa }}"   class="form-control  @error('kadaluarsa') is-invalid @enderror" id="kadaluarsa" name="kadaluarsa" >
                                                            @error('kadaluarsa')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="pabrik" class="form-label">Nama Pabrik</label>
                                                            <input type="text"  value="{{ $rujuk->pabrik }}"   class="form-control  @error('pabrik') is-invalid @enderror" id="pabrik" name="pabrik" >
                                                            @error('pabrik')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="alm_pab" class="form-label">Alamat Pabrik</label>
                                                            <input type="text"  value="{{ $rujuk->alm_pab }}"  class="form-control  @error('alm_pab') is-invalid @enderror" id="alm_pab" name="alm_pab" >
                                                            @error('alm_pab')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="nama_kor" class="form-label">Nama Korban</label>
                                                            <input type="text"  value="{{ $rujuk->nama_kor }}"   class="form-control  @error('nama_kor') is-invalid @enderror" id="nama_kor" name="nama_kor" >
                                                            @error('nama_kor')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="alm_kor" class="form-label">Alamat Korban</label>
                                                            <input type="text"  value="{{ $rujuk->alm_kor }}"   class="form-control  @error('alm_kor') is-invalid @enderror" id="alm_kor" name="alm_kor" >
                                                            @error('alm_kor')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-4 mb-12 ">
                                                            <label class="form-label">Jenis Kelamin</label>
                                                            <select name="kelamin_kor" class="form-control form-select " data-bs-placeholder="Select Country">
                                                                @if($rujuk->kelamin_kor =='Laki-Laki')
                                                                <option value="Laki-Laki" selected>Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                                @else
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan" selected>Perempuan</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="tab-pane" id="tab11">
                                                    <div class="form-group">
                                                        <label for="desc" class="is-invalid" style="color: red;"></label>
                                                        <textarea class="ckeditor form-control @error('desc') is-invalid @enderror" cols="30" rows="10" name="desc" id="desc" >{{ $rujuk->desc }}</textarea>
                                                        @error('desc')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}    
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="tujuan" class="form-label">Tujuan</label>
                                                            <input type="text" value="{{ $rujuk->tujuan }}"  class="form-control  @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" >
                                                            @error('tujuan')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="hal" class="form-label">Hal</label>
                                                            <textarea  class="form-control  @error('hal') is-invalid @enderror" id="hal" name="hal"  rows="4">{{ $rujuk->hal }}</textarea>
                                                            @error('hal')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="ket" class="form-label">Ket. lain</label>
                                                            <textarea  class="form-control  @error('ket') is-invalid @enderror" id="ket" name="ket"  rows="4">{{ $rujuk->ket }}</textarea>
                                                            @error('ket')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div><br>
                                                    <h3 class="text-center" style="color: #E1684E;">Edit Gambar: *Pilih gambar hanya untuk merubah gambar</h5>
                                                    <div class="form-group">
                                                            <label class="form-label mt-0">File 1</label>
                                                            
                                                            <input class="form-control @error('gambar1') is-invalid @enderror" type="file" name="gambar1" id="gambar1">
                                                            @if(isset($rujuk->gambar1))
                                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar1  }}">{{ $rujuk->gambar1  }}</a></li>
                                                            @endif
                                                            @error('gambar1')
                                                                <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                            <span>* Ukuran maksimal file 500kb dan berextensi jpg,img,png,gif</span>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="form-label mt-0">File 2</label>
                                                            
                                                            <input class="form-control @error('gambar2') is-invalid @enderror" type="file" name="gambar2" id="gambar2">
                                                            @if(isset($rujuk->gambar2))
                                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar2  }}">{{ $rujuk->gambar2  }}</a></li>
                                                            @endif
                                                            @error('gambar2')
                                                                <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                            <span>* Ukuran maksimal file 500kb dan berextensi jpg,img,png,gif</span>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="form-label mt-0">File 3</label>
                                                          
                                                            <input class="form-control @error('gambar3') is-invalid @enderror" type="file" name="gambar3" id="gambar3">
                                                            @if(isset($rujuk->gambar3))
                                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar3  }}">{{ $rujuk->gambar3  }}</a></li>
                                                            @endif
                                                            @error('gambar3')
                                                                <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                            <span>* Ukuran maksimal file 500kb dan berextensi jpg,img,png,gif</span>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="form-label mt-0">File 4</label>
                                                            <input class="form-control @error('gambar4') is-invalid @enderror" type="file" name="gambar4" id="gambar4">
                                                            @if(isset($rujuk->gambar4))
                                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar4  }}">{{ $rujuk->gambar4  }}</a></li>
                                                            @endif
                                                            @error('gambar4')
                                                                <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                            <span>* Ukuran maksimal file 500kb dan berextensi jpg,img,png,gif</span>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="form-label mt-0">File 5</label>
                                                            <input class="form-control @error('gambar5') is-invalid @enderror" type="file" name="gambar5" id="gambar5">
                                                            @if(isset($rujuk->gambar5))
                                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar5  }}">{{ $rujuk->gambar5  }}</a></li>
                                                            @endif
                                                            @error('gambar5')
                                                                <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                            <span>* Ukuran maksimal file 500kb dan berextensi jpg,img,png,gif</span>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="form-label mt-0">File 6</label>
                                                            <input class="form-control @error('gambar6') is-invalid @enderror" type="file" name="gambar6" id="gambar6">
                                                            @if(isset($rujuk->gambar6))
                                                            <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar6  }}">{{ $rujuk->gambar6  }}</a></li>
                                                            @endif
                                                            @error('gambar6')
                                                                <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                            <span>* Ukuran maksimal file 500kb dan berextensi jpg,img,png,gif</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                                <span class="field">
                                                    <button class="btn btn-primary userEditSubmit">
                                                        Submit
                                                    </button>
                                                </span>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				<!-- ROW CLOSED -->
            </div>
            <!-- CONTAINER CLOSED -->
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

    <!-- CUSTOM JS -->
    <script src="{{ asset('vendor/js/custom.js')}}"></script>

	<!-- Perfect SCROLLBAR JS-->
	<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

	<!-- FORMVALIDATION JS -->
	<script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

    <!--- TABS JS -->
    <script src="{{ asset('vendor/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
    <script src="{{ asset('vendor/plugins/tabs/tab-content.js')}}"></script>

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
 

    </x-HomeLayout>
	
	
    <script type="text/javascript">
    var date = $('#tgl_terima').datepicker({ dateFormat: 'dd/mm/yy' }).val();
    setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
    $(function() {
    $('#signupForm').validate({
        ignore: [],
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
            
        },

        rules: {
            tgl_terima: {
                required: true
            },
            nama: {
                required: true,
                minlength: 2
            },
            ttl: {
                required: true
            },
            umur: {
                required: true
            },
            kelamin: {
                required: true
            },
            agama: {
                required: true
            },
            pekerjaan: {
                required: true
            },
            alamat: {
                required: true
            },
            hp: {
                required: true
            },
            fax: {
                required: true
            },
            email: {
                required: true
            },
            pengaduan: {
                required: true
            },
            produk: {
                required: true
            },
            regis: {
                required: true
            },
            batch: {
                required: true
            },
            pabrik: {
                required: true
            },
            alm_pab: {
                required: true
            },
            nama_kor: {
                required: true
            },
            alm_kor: {
                required: true
            },
            desc: {
                required: true
            },
            kadaluarsa: {
                required: true
            },
            tindak: {
                required: true
            },
            tujuan: {
                required: true
            },
            hal: {
                required: true
            },
            ket: {
                required: true
            }
        },messages: {
            tgl_terima: {
                required: "Kolom Tanggal Terima Laporan Harus diisi"
            },
            nama: {
                required: "Kolom Nama harus diisi",
                minlength: "Harus berisi minimal 2 karakter"
            },
            ttl: {
                required: "Kolom Tempat Tanggal Lahir harus diisi"
            },
            umur: {
                required: "Kolom Umur harus diisi"
            },
            kelamin: {
                required: "Tempat Tanggal Lahir harus diisi"
            },
            agama: {
                required: "Kolom Agama harus diisi"
            },
            pekerjaan: {
                required: "Kolom Pekerjaan harus diisi"
            },
            alamat: {
                required: "Kolom Alamat harus diisi"
            },
            hp: {
                required: "Kolom Nomor Hp harus diisi"
            },
            fax: {
                required: "Kolom Fax harus diisi"
            },
            email: {
                required: "Kolom Email harus diisi"
            },
            pengaduan: {
                required: "Kolom Pengaduan harus diisi"
            },
            produk: {
                required: "Kolom Nama Produk harus diisi"
            },
            regis: {
                required: "Kolom Registrasi harus diisi"
            },
            batch: {
                required: "Kolom No. Batch harus diisi"
            },
            pabrik: {
                required: "Kolom Nama Pabrik harus diisi"
            },
            alm_pab: {
                required: "Kolom Alamat Pabrik harus diisi"
            },
            nama_kor: {
                required: "Kolom Nama Korban harus diisi"
            },
            alm_kor: {
                required: "Kolom Alamat Korban harus diisi"
            },
            desc: {
                required: "Uraian Masalah Harus disi"
            },
            kadaluarsa: {
                required: "Kolom Kadaluarsa harus diisi"
            },
            tindak: {
                required: "Kolom Tindak Lanjut harus diisi"
            },
            tujuan: {
                required: "Kolom Tujuan harus diisi"
            },
            hal: {
                required: "Kolom Hal harus diisi"
            },
            ket: {
                required: "Kolom Keterangan harus diisi"
            }  
        }
        
    });
    
});

	</script>

<!-- CkEditorJs -->
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
 <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    CKEDITOR.replace('desc', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Choose Some Tags"
        });
    });
</script>

