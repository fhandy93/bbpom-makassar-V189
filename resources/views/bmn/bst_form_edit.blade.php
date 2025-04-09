<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title"> {{ $jns == 1 ? 'Pengembalian' : 'Peminjaman' }}</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"> {{ $jns == 1 ? 'Pengembalian' : 'Peminjaman' }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Input Data</li>
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
					<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-10 col-md-10">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir BA  {{ $jns == 1 ? 'Pengembalian' : 'Peminjaman' }}</h3>
							</div>
							<form id="signupForm" method="post" class="form-horizontal" action="{{ $jns == 1 ? '/bmn/bast-pengembalian-update/'.$bmn->id : '/bmn/bast-peminjaman-update/'.$bmn->id }}" >
                                @csrf
                                @method('put')
								<div class="card-body">				
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="user_id" class="form-label">Nama Pegawai</label>
											<input type="text" class="form-control " value="{{$bmn->user->name}}"  readonly>
											@error('user_id')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>	
									@if($jns == 1)
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="no_surat" class="form-label">Nomor Surat</label>
											<input type="text" class="form-control  @error('no_surat') is-invalid @enderror" name="no_surat" id="no_surat" value="{{$bmn->no_surat}}" >
											@error('no_surat')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>	
									@endif							
							
									<br>
									<div class="card">
										<div class="card-header"  id="dtl" style="display: none;">
											<h3 class="card-title">Detail Barang</h3>
										</div>
										<div class="card-body">
                                        @foreach($data as $index => $item)
                                        @if($index > 0) 
                                            <hr style="border: 5px solid; color:red;">
                                        @endif                                      
                                        <div id="formbarang{{$index}}">
                                            <div class="form-row">
                                                <div class="col-xl-12 mb-12">
                                                    <label for="user_id" class="form-label">Kode-NUP Barang {{$index + 1}}</label>
                                                    <select name="nup[{{$index}}]" class="form-control form-select select2" onchange="showBarang1(this.value,'{{$index}}')" style="width: 100%;">
                                                        <option value="" selected disabled>{{$item->barang->kode}}{{$item->barang->nup}} - {{$item->barang->nm_barang}}</option>
                                                        @foreach($barang as $barangItem)
                                                        <option value="{{$barangItem->id}}" 
                                                            @if($barangItem->id == $item->barang_id) selected @endif>
                                                            {{$barangItem->kode}}{{$barangItem->nup}} - {{$barangItem->nm_barang}}
                                                        </option>
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>
                                            <input name="id[{{$index}}]" type="text" value="{{$item->id}}" hidden>
                                            <div class="form-row">
                                                <div class="col-xl-12 mb-12">
                                                    <div class="table-responsive">
                                                        <br>
                                                        <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Nama Barang</td>
                                                                    <td id="nm_barang_{{$index}}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Merek</td>
                                                                    <td id="merek_{{$index}}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Kondisi Barang</td>
                                                                    <td id="kondisi_{{$index}}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Lokasi Barang Saat ini</td>
                                                                    <td id="lokasi_{{$index}}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Tanggal Perolehan</td>
                                                                    <td id="tgl_{{$index}}"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            @if($jns == 2)
											<div class="form-row">
												<div class="col-xl-8 mb-12 ">
													<label for="user_data" class="form-label">Lokasi Barang Setelah Peminjaman</label>
													<select name="lokasi[{{$index}}]" class="form-control form-select select2" style="width: 100%;" >
														<option value="aa" selected disabled>Pilih Lokasi ...</option>
														@foreach($ruang as $ruangan)
														<option value="{{$ruangan->id}}" {{ $item->lokasi == $ruangan->id ? 'selected' : ''}}>{{$ruangan->nm_ruangan}}</option>
														@endforeach
													</select>	
												</div>
											</div>
											@endif
                                            <div class="form-row">
                                                <div class="col-xl-8 mb-12">
                                                    <label for="kondisi" class="form-label">Kondisi Barang</label>
                                                    <span class="text-warning">* Edit Kondisi barang hanya jika kondisi barang mengalami perubahan</span><br>
                                                    <select id="kondisi{{$index}}" name="kondisi[{{$index}}]" class="form-control form-select select2" style="width: 100%;">
                                                        <option value="aa" selected disabled>Pilih Kondisi ...</option>
                                                        <option value="1" {{ $item->kondisi == 1 ? 'selected' : '' }} >Baik</option>
                                                        <option value="2" {{ $item->kondisi == 2 ? 'selected' : '' }} >Rusak Ringan</option>
                                                        <option value="3" {{ $item->kondisi == 3 ? 'selected' : '' }}>Rusak Berat</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

						                </div>
					                </div>
                                    @error('nup')
                                        <span class="text-danger"> {{ $message }} </span>
                                        <br>
                                    @enderror	
                        
                                    <div class="form-row">
                                        <div class="form-group col-xl-8 mb-12 ">
                                            <label class="form-label">Petugas BMN</label>
                                            <select name="petugas" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
                                                <option value="aa" selected disabled>Pilih Petugas BMN ...</option>
                                                @foreach($pet as $index => $pet)
                                                    <option value="{{$pet->id}}" {{ $bmn->user_bmn == $pet->id ? 'selected' : '' }}>{{$pet->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('petugas')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <p>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" style="width:150px;">Update Data</button>
                                    </div>
                                </div>
                            </form><!-- End Multi Columns Form -->
                        </div>
                    </div>
                    
                <!-- ROW CLOSED -->
                </div>
                <!-- CONTAINER CLOSED -->
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

    <!-- CUSTOM JS -->
    <script src="{{ asset('vendor/js/custom.js')}}"></script>

	<!-- Perfect SCROLLBAR JS-->
	<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

	<!-- FORMVALIDATION JS -->
	<script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

	<!-- DATEPICKER JS -->
	<script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendor/js/select2.js')}}"></script>

	 <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

	<!-- Swet Alert -->
	<script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    </x-HomeLayout>
	
	<script type="text/javascript">
    	var date = $('#tgl_berangkat').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_kembali').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
	
		
    function showDetail(str1) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
	var obj = JSON.parse(this.responseText);
	var objLength = Object.keys(obj).length;
	document.getElementById('nip').value=obj[0].nip;
	document.getElementById('pangkat').value=obj[0].pangkat;
	document.getElementById('jabatan').value=obj[0].jabatan;

	}
	xhttp.open("GET", "show-nip/"+str1);
	xhttp.send();
	
	}

    function showBarang1(str1, prefix) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
		var obj = JSON.parse(this.responseText);
		var objLength = Object.keys(obj).length;
		document.getElementById(`nm_barang_${prefix}`).innerHTML=obj[0].nm_barang;
		document.getElementById(`merek_${prefix}`).innerHTML=obj[0].merek;
		document.getElementById(`kondisi_${prefix}`).innerHTML = 
		obj[0].kondisi == 1 ? "Baik" : obj[0].kondisi == 2 ? "Rusak Ringan" : "Rusak Berat";
		document.getElementById(`tgl_${prefix}`).innerHTML=obj[0].tgl_perolehan;
		const xhttpp = new XMLHttpRequest();
		xhttpp.onload = function() {
			var objj = JSON.parse(this.responseText);
			var objjLength = Object.keys(obj).length;
			document.getElementById(`lokasi_${prefix}`).innerHTML=objj[0].nm_ruangan;
		}
		xhttpp.open("GET", "/show-ruang/"+ obj[0].lokasi);
		xhttpp.send();
	}
	xhttp.open("GET", "/show-barang/"+str1);
	xhttp.send();
	}

    document.addEventListener('DOMContentLoaded', function () {
            @foreach($data as $index => $item)
                if ("{{$item->barang_id}}" !== "") {
                    showBarang1("{{$item->barang_id}}", "{{$index}}");
                }
            @endforeach
        });

	$('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Anda yakin ingin mengirim data ini ?`,
            text: "Setelah data terkirim, data tidak dapat diedit kembali.",
            icon: "info",
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