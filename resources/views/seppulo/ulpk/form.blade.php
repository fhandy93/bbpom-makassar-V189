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
					<x-notify />
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
                                        <form id="signupForm" method="post" class="form-horizontal" action="/ulpk/store" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')			
                                            <div class="tab-content tab-validate">            
                                                <div class="tab-pane active" id="tab9">
                                                    <div class="form-row">
                                                        <div class="col-xl-5 mb-12 ">
                                                            <label for="tgl_terima" class="form-label">Tanggal Terima</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                                </div>
                                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" type="text" name="tgl_terima" id="tgl_terima">
                                                            </div>
                                                            @error('tgl_terima')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" value="{{old('nama')}}"  class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" >
                                                            @error('nama')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="umur">Umur</label>
                                                            <select name="umur" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                                    <option value="=<20 Tahun"> =<20 Tahun </option>
                                                                    <option value="21-30 Tahun">21-30 Tahun</option>
                                                                    <option value="31-40 Tahun">31-40 Tahun</option>
                                                                    <option value="41-50 Tahun">41-50 Tahun</option>
                                                                    <option value="51-60 Tahun">51-60 Tahun</option>
                                                                    <option value=">=60 Tahun">>=60 Tahun</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Jenis Kelamin</label>
                                                            <select name="kelamin" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-12 mb-12 ">
                                                            <label for="jenis" class="form-label">Alamat</label>
                                                            <textarea  class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  rows="4">{{old('alamat')}}</textarea>
                                                            @error('alamat')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="hp" class="form-label">HP/Telp.</label>
                                                            <input type="text" value="{{old('hp')}}"  class="form-control  @error('hp') is-invalid @enderror" id="hp" name="hp" >
                                                            @error('hp')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="text" value="{{old('email')}}"  class="form-control  @error('email') is-invalid @enderror" id="email" name="email" >
                                                            @error('email')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="perusahaan" class="form-label">Nama Perusahaan/Instansi</label>
                                                            <input type="text" value="{{old('perusahaan')}}"  class="form-control  @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" >
                                                            @error('perusahaan')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="Pekerjaan">Pekerjaan</label>
                                                            <select name="pekerjaan" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                                <option value="Apoteker">Apoteker</option>
                                                                <option value="Bidan">Bidan</option>
                                                                <option value="Dokter">Dokter</option>
                                                                <option value="Dokter Gigi">Dokter Gigi</option>
                                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga </option>
                                                                <option value="Karyawan">Karyawan</option>
                                                                <option value="LSM">LSM</option>
                                                                <option value="Nakes Lain">Nakes Lain</option>
                                                                <option value="Pelajar Mahasiswa">Pelajar Mahasiswa</option>
                                                                <option value="Pelaku Usaha">Pelaku Usaha</option>
                                                                <option value="Perawat">Perawat</option>
                                                                <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                                                <option value="Sarjana Hukum">Sarjana Hukum</option>
                                                                <option value="Tenaga Teknis Kefarmasian">Tenaga Teknis Kefarmasian</option>
                                                                <option value="Umum">Umum</option>
                                                                <option value="Wartawan">Wartawan</option>
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
                                                                    <option value="Informasi">Informasi</option>
                                                                    <option value="Pengujian">Pengujian</option>
                                                                    <option value="SKI">SKI</option>
                                                                    <option value="SKE">SKE</option>
                                                                    <option value="CDOB">CDOB</option>
                                                                    <option value="CPOTB">CPOTB</option>
                                                                    <option value="CPKB">CPKB</option>
                                                                    <option value="Notifikasi Kosmetik">Notifikasi Kosmetik</option>
                                                                    <option value="IPCPPOB">IPCPPOB</option>
                                                                    <option value="Lainnya">Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-12 mb-12 ">
                                                            <label for="layanan" class="form-label">Layanan</label>
                                                            <textarea  class="editor form-control  @error('layanan') is-invalid @enderror" id="layanan" name="layanan"  rows="4">{{old('layanan')}}</textarea>
                                                            @error('layanan')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-12 mb-12 ">
                                                            <label for="jawaban" class="form-label">Jawaban</label>
                                                            <textarea  class="editor2 form-control  @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban"  rows="4">{{old('jawaban')}}</textarea>
                                                            @error('jawaban')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Jenis Komoditi</label>
                                                            <select name="komoditi" class="form-control form-select select2" style="width: 300px;" data-bs-placeholder="Select Country">
                                                                    <option value="Obat">Obat</option>
                                                                    <option value="Obat Tradisional">Obat Tradisional</option>
                                                                    <option value="Suplemen Kesehatan">Suplemen Kesehatan</option>
                                                                    <option value="Pangan Olahan">Pangan Olahan</option>
                                                                    <option value="Kosmetik">Kosmetik</option>
                                                                    <option value="Umum">Umum</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-6 mb-12 ">
                                                            <label for="user" class="form-label">Petugas 1</label>
                                                            <input type="text" value="{{ Auth::user()->name}}"  class="form-control  @error('user') is-invalid @enderror" id="user" name="user" readonly>
                                                            @error('user')
                                                            <span class="invalid-feedback"> {{ $message }} </span>
                                                            @enderror	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-xl-8 mb-12 ">
                                                            <label for="user_data" class="form-label">Petugas 2</label>
                                                            <select name="petugas" class="form-control form-select select2" style="width: 530px;">
                                                                <option value="-" >-</option>
                                                                @foreach($user as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>	
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Sarana Informasi</label>
                                                            <select name="sarana" class="form-control form-select select2" style="width: 300px;" data-bs-placeholder="Select Country">
                                                                    <option value="Langsung">Langsung</option>
                                                                    <option value="WaatsApp">WaatsApp</option>
                                                                    <option value="Sosial Media">Sosial Media</option>
                                                                    <option value="KIE">KIE</option>
                                                                    <option value="Email">Email</option>
                                                                    <option value="Surat">Surat</option>
                                                                    <option value="Telepon">Telepon</option>
                                                                    <option value="Simpel LPK">Simpel LPK</option>
                                                                    <option value="SP4N LAPOR">SP4N LAPOR</option>
                                                                    <option value="Media Lainnya">Media Lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-xl-6 mb-12 ">
                                                            <label class="form-label">Rujuk/Tindak Lanjut</label>
                                                            <select name="rujuk" class="form-control form-select select2" style="width: 200px;" data-bs-placeholder="Select Country">
                                                                    <option value=1>Ya</option>
                                                                    <option value=0>Tidak</option>
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
