<x-HomeLayout>
<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Formulir Data Konsumen ULPK</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Data ULPK</li>
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
				    <!-- <a href="/laporanulpk" class="btn btn-primary my-3"><i class="fa fa-eye"></i> Lihat Laporan</a> -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Input Data ULPK</h3>
                            </div>
                            <div class="card-body">
                                <div class="panel panel-primary">
                                    <div class="tab-menu-heading">
                                        <div class="tabs-menu">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs panel-success">
                                                <li><a href="#tab9" class="active " data-bs-toggle="tab"><span><i class="fe fe-user me-1 "></i></span>Identitas Konsumen</a></li>
                                                <li><a href="#tab10" data-bs-toggle="tab"><span><i class="fa fa-address-card me-1"></i></span>Layanan Konsumen</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body">
                                        <form id="signupForm" method="post" class="form-horizontal" action="/ulpk/update/{{$ulpk->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')			
                                            <div class="tab-content tab-validate">            
                                                <div class="tab-pane active" id="tab9">
                                                    <div class="form-row">
                                                        <div class="col-xl-5 mb-12 ">
                                                            <label for="tgl_terima" class="form-label">Tanggal Terima</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                                </div>
                                                                <input class="form-control fc-datepicker" value="{{ \Carbon\Carbon::parse($ulpk->tgl_lapor)->format('d/m/Y') }}" placeholder="MM/DD/YYYY" value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" type="text" name="tgl_terima" id="tgl_terima">
                                                            </div>
                                                            @error('tgl_terima')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" value="{{$ulpk->nama}}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" >
                                                            @error('nama')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="umur">Umur</label>
                                                            <select name="umur" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                                    <option value="=<20 Tahun" {{$ulpk->umur == '=<20 Tahun' ? 'selected' : ''}}> =<20 Tahun </option>
                                                                    <option value="21-30 Tahun" {{$ulpk->umur == '21-30 Tahun' ? 'selected' : ''}}>21-30 Tahun</option>
                                                                    <option value="31-40 Tahun" {{$ulpk->umur == '31-40 Tahun' ? 'selected' : ''}}>31-40 Tahun</option>
                                                                    <option value="41-50 Tahun" {{$ulpk->umur == '41-50 Tahun' ? 'selected' : ''}}>41-50 Tahun</option>
                                                                    <option value="51-60 Tahun" {{$ulpk->umur == '51-60 Tahun' ? 'selected' : ''}}>51-60 Tahun</option>
                                                                    <option value=">=60 Tahun" {{$ulpk->umur == '>=60 Tahun' ? 'selected' : ''}}>>=60 Tahun</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Jenis Kelamin</label>
                                                            <select name="kelamin" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                                    <option value="Laki-Laki" {{$ulpk->kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                                                                    <option value="Perempuan" {{$ulpk->kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-12 mb-12 ">
                                                            <label for="jenis" class="form-label">Alamat</label>
                                                            <textarea  class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  rows="4">{{$ulpk->alamat}}</textarea>
                                                            @error('alamat')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="hp" class="form-label">HP/Telp.</label>
                                                            <input type="text" value="{{$ulpk->hp}}"  class="form-control  @error('hp') is-invalid @enderror" id="hp" name="hp" >
                                                            @error('hp')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="text" value="{{$ulpk->email}}"  class="form-control  @error('email') is-invalid @enderror" id="email" name="email" >
                                                            @error('email')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="perusahaan" class="form-label">Nama Perusahaan/Instansi</label>
                                                            <input type="text" value="{{$ulpk->perusahaan}}"  class="form-control  @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" >
                                                            @error('perusahaan')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="Pekerjaan">Pekerjaan</label>
                                                            <select name="pekerjaan" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                                <option value="Apoteker" {{$ulpk->pekerjaan == 'Apoteker' ? 'selected' : ''}}>Apoteker</option>
                                                                <option value="Bidan" {{$ulpk->pekerjaan == 'Bidan' ? 'selected' : ''}}>Bidan</option>
                                                                <option value="Dokter" {{$ulpk->pekerjaan == 'Dokter' ? 'selected' : ''}}>Dokter</option>
                                                                <option value="Dokter Gigi" {{$ulpk->pekerjaan == 'Dokter Gigi' ? 'selected' : ''}}>Dokter Gigi</option>
                                                                <option value="Ibu Rumah Tangga" {{$ulpk->pekerjaan == 'Ibu Rumah Tangga' ? 'selected' : ''}}>Ibu Rumah Tangga </option>
                                                                <option value="Karyawan" {{$ulpk->pekerjaan == 'Karyawan' ? 'selected' : ''}}>Karyawan</option>
                                                                <option value="LSM" {{$ulpk->pekerjaan == 'LSM' ? 'selected' : ''}}>LSM</option>
                                                                <option value="Nakes Lain" {{$ulpk->pekerjaan == 'Nakes Lain' ? 'selected' : ''}}>Nakes Lain</option>
                                                                <option value="Pelajar Mahasiswa" {{$ulpk->pekerjaan == 'Pelajar Mahasiswa' ? 'selected' : ''}}>Pelajar Mahasiswa</option>
                                                                <option value="Pelaku Usaha" {{$ulpk->pekerjaan == 'Pelaku Usaha' ? 'selected' : ''}}>Pelaku Usaha</option>
                                                                <option value="Perawat" {{$ulpk->pekerjaan == 'Perawat' ? 'selected' : ''}}>Perawat</option>
                                                                <option value="PNS/TNI/POLRI" {{$ulpk->pekerjaan == 'PNS/TNI/POLRI' ? 'selected' : ''}}>PNS/TNI/POLRI</option>
                                                                <option value="Sarjana Hukum" {{$ulpk->pekerjaan == 'Sarjana Hukum' ? 'selected' : ''}}>Sarjana Hukum</option>
                                                                <option value="Tenaga Teknis Kefarmasian" {{$ulpk->pekerjaan == 'Tenaga Teknis Kefarmasian' ? 'selected' : ''}}>Tenaga Teknis Kefarmasian</option>
                                                                <option value="Umum" {{$ulpk->pekerjaan == 'Umum' ? 'selected' : ''}}>Umum</option>
                                                                <option value="Wartawan" {{$ulpk->pekerjaan == 'Wartawan' ? 'selected' : ''}}>Wartawan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                                
                                                <div class="tab-pane" id="tab10">
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12" >
                                                            <label class="form-label">Jenis Layanan</label>
                                                            <select name="jenis" class="form-control form-select select2" style="width: 300px;"  data-bs-placeholder="Select Country">
                                                                    <option value="Informasi" {{$ulpk->jenis == 'Informasi' ? 'selected' : ''}}>Informasi</option>
                                                                    <option value="Pengujian" {{$ulpk->jenis == 'Pengujian' ? 'selected' : ''}}>Pengujian</option>
                                                                    <option value="SKI" {{$ulpk->jenis == 'SKI' ? 'selected' : ''}}>SKI</option>
                                                                    <option value="SKE" {{$ulpk->jenis == 'SKE' ? 'selected' : ''}}>SKE</option>
                                                                    <option value="CDOB" {{$ulpk->jenis == 'CDOB' ? 'selected' : ''}}>CDOB</option>
                                                                    <option value="CPOTB" {{$ulpk->jenis == 'CPOTB' ? 'selected' : ''}}>CPOTB</option>
                                                                    <option value="CPKB" {{$ulpk->jenis == 'CPKB' ? 'selected' : ''}}>CPKB</option>
                                                                    <option value="Notifikasi Kosmetik" {{$ulpk->jenis == 'Notifikasi Kosmetik' ? 'selected' : ''}}>Notifikasi Kosmetik</option>
                                                                    <option value="IPCPPOB" {{$ulpk->jenis == 'IPCPPOB' ? 'selected' : ''}}>IPCPPOB</option>
                                                                    <option value="Lainnya" {{$ulpk->jenis == 'Lainnya' ? 'selected' : ''}}>Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-12 mb-12 ">
                                                            <label for="layanan" class="form-label">Layanan</label>
                                                            <textarea  class="editor form-control  @error('layanan') is-invalid @enderror" id="layanan" name="layanan"  rows="4">{{$ulpk->layanan}}</textarea>
                                                            @error('layanan')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-12 mb-12 ">
                                                            <label for="jawaban" class="form-label">Jawaban</label>
                                                            <textarea  class="editor2 form-control  @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban"  rows="4">{{$ulpk->jawaban}}</textarea>
                                                            @error('jawaban')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Jenis Komoditi</label>
                                                            <select name="komoditi" class="form-control form-select select2" style="width: 300px;" data-bs-placeholder="Select Country">
                                                                    <option value="Obat" {{$ulpk->komoditi == 'Obat' ? 'selected' : ''}}>Obat</option>
                                                                    <option value="Obat Tradisional" {{$ulpk->komoditi == 'Obat Tradisional' ? 'selected' : ''}}>Obat Tradisional</option>
                                                                    <option value="Suplemen Kesehatan" {{$ulpk->komoditi == 'Suplemen Kesehatan' ? 'selected' : ''}}>Suplemen Kesehatan</option>
                                                                    <option value="Pangan Olahan" {{$ulpk->komoditi == 'Pangan Olahan' ? 'selected' : ''}}>Pangan Olahan</option>
                                                                    <option value="Kosmetik" {{$ulpk->komoditi == 'Kosmetik' ? 'selected' : ''}}>Kosmetik</option>
                                                                    <option value="Umum" {{$ulpk->komoditi == 'Umum' ? 'selected' : ''}}>Umum</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" value="{{$ulpk->user->name}}"  class="form-control  @error('nama') is-invalid @enderror" id="user" name="user" readonly >
                                                            @error('user')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="user_data" class="form-label">Petugas 2</label>
                                                            <select name="petugas" class="form-control form-select select2" style="width: 530px;">
                                                                <option value="-" {{$ulpk->petugas2_id == null ? 'selected' : ''}}>-</option>
                                                                @foreach($user as $item)
                                                                <option value="{{$item->id}}" {{$ulpk->petugas2_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                                @endforeach
                                                            </select>	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Sarana Informasi</label>
                                                            <select name="sarana" class="form-control form-select select2" style="width: 300px;" data-bs-placeholder="Select Country">
                                                                    <option value="Langsung" {{$ulpk->sarana == 'Langsung' ? 'selected' : ''}}>Langsung</option>
                                                                    <option value="WaatsApp" {{$ulpk->sarana == 'WaatsApp' ? 'selected' : ''}}>WaatsApp</option>
                                                                    <option value="Sosial Media" {{$ulpk->sarana == 'Sosial Media' ? 'selected' : ''}}>Sosial Media</option>
                                                                    <option value="KIE" {{$ulpk->sarana == 'KIE' ? 'selected' : ''}}>KIE</option>
                                                                    <option value="Email" {{$ulpk->sarana == 'Email' ? 'selected' : ''}}>Email</option>
                                                                    <option value="Surat" {{$ulpk->sarana == 'Surat' ? 'selected' : ''}}>Surat</option>
                                                                    <option value="Telepon" {{$ulpk->sarana == 'Telepon' ? 'selected' : ''}}>Telepon</option>
                                                                    <option value="Simpel LPK" {{$ulpk->sarana == 'Simpel LPK' ? 'selected' : ''}}>Simpel LPK</option>
                                                                    <option value="SP4N LAPOR" {{$ulpk->sarana == 'SP4N LAPOR' ? 'selected' : ''}}>SP4N LAPOR</option>
                                                                    <option value="Media Lainnya" {{$ulpk->sarana == 'Media Lainnya' ? 'selected' : ''}}>Media Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Rujuk/Tindak Lanjut</label>
                                                            <select name="rujuk" class="form-control form-select select2" style="width: 200px;" data-bs-placeholder="Select Country">
                                                                    <option value=1 {{$ulpk->rujuk == 1 ? 'selected' : ''}}>Ya</option>
                                                                    <option value=0 {{$ulpk->rujuk == 0 ? 'selected' : ''}}>Tidak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                   <br>
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

     <!-- CKeditor 5 js-->
     <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    </x-HomeLayout>
	
	
    <script type="text/javascript">
    ClassicEditor
    .create( document.querySelector( '.editor' ),{})
    ClassicEditor
    .create( document.querySelector( '.editor2' ),{})
         
    var date = $('#tgl_terima').datepicker({ dateFormat: 'dd/mm/yy' }).val();
    setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
    $(function() {

    
    });

	</script>
