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
					@if (session() -> has('success'))
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Success</h4>
							<p class="card-text">{{ session() -> get('success')}}</p>
						</div>
					@endif  
					@if (session() -> has('unsuccess'))
						<div class="card-body text-center" id="unsuccess"> 
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Gagal</h4>
							<p class="card-text">{{ session() -> get('unsuccess')}}</p>
						</div>
					@endif  	
					<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-10 col-md-10">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir BAST  {{ $jns == 1 ? 'Pengembalian' : 'Peminjaman' }}</h3>
							</div>
							<form id="signupForm" method="post" class="form-horizontal" action="{{ $jns == 1 ? '/bmn/bast-pengembalian-store' : '/bmn/bast-peminjaman-store' }} " >
								<div class="card-body">				
									@csrf
									@method('post')

									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="user_id" class="form-label">Nama Pegawai</label>
											<select name="user_id" class="form-control form-select select2"  onchange="showDetail(this.value)">
												<option value="aa" selected disabled>Pilih Nama Pegawai ...</option>
												@foreach($data as $item)
            									<option value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
												
											</select>	
											@error('user_id')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>
									@if($jns == 1)
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="no_surat" class="form-label">Nomor Surat</label>
											<input type="text" class="form-control  @error('no_surat') is-invalid @enderror" name="no_surat" id="no_surat">
											@error('no_surat')
												<span class="text-danger"> {{ $message }} </span>
											@enderror
										</div>
									</div>	
									@endif
									<div class="form-row" id="opt" >
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Jumlah Barang Yang Akan {{ $jns == 1 ? 'Dikembalikan' : 'Dipinjamkan' }}</label>
											<select name="jml_barang" id="jml" onchange="jmlbarang()" class="form-control form-select select2" data-bs-placeholder="Select Country">
												<option value="aa" selected disabled>Pilih Jumlah Barang...</option>		
												<option value="1" >1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
							
									<br>
									<div class="card">
										<div class="card-header"  id="dtl" style="display: none;">
											<h3 class="card-title">Detail Barang</h3>
										</div>
										<div class="card-body">
											<div id="formbarang1" style="display: none;">
                                                <div class="form-row">
                                                    <div class="col-xl-12 mb-12 ">
                                                        <label for="user_id" class="form-label">Kode-NUP Barang 1</label>
                                                        <select name="nup[0]" class="form-control form-select select2"  onchange="showBarang1(this.value,'1')"  style="width: 100%;">
                                                            <option value="aa" selected disabled>Pilih Kode/NUP - Nama Barang ...</div></option>
                                                            @foreach($barang as $item)
                                                            <option value="{{$item->id}}">{{$item->kode}}{{$item->nup}} - {{$item->nm_barang}} - {{$item->merek}}</option>
                                                            @endforeach 
                                                        </select>	
													
                                                    </div>
                                                </div>
												<div class="form-row">
													<div class="col-xl-12 mb-12 ">
													<div class="table-responsive">
														<br>
														<table class="table border text-nowrap text-md-nowrap table-striped mb-0">
															
															<tbody>
																<tr>
																	<td>1</td>
																	<td>Nama Barang</td>
																	<td id="nm_barang_1"></td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>Merek</td>
																	<td id="merek_1"></td>
																</tr>
														
																<tr>
																	<td>3</td>
																	<td>Kondisi Barang</td>
																	<td id="kondisi_1"></td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Lokasi Barang Saat ini</td>
																	<td id="lokasi_1"></td>
																</tr>
																<tr>
																	<td>5</td>
																	<td>Tanggal Perolehan</td>
																	<td id="tgl_1"></td>
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
														<select name="lokasi[0]" class="form-control form-select select2" style="width: 100%;" >
															<option value="aa" selected disabled>Pilih Lokasi ...</option>
															@foreach($ruang as $item)
															<option value="{{$item->id}}">{{$item->nm_ruangan}}</option>
															@endforeach
														</select>	
													</div>
												</div>
												@endif
												<div class="form-row">
													<div class="col-xl-8 mb-12 ">
														<label for="kondisi" class="form-label">Kondisi Barang</label>
														<span class="text-warning">* Edit Kondisi barang hanya jika kondisi barang mengalami perubahan</span><br>
														<select id="kondisi1" name="kondisi[0]" class="form-control form-select select2" style="width: 100%;">
                                                        <option value="aa" selected disabled>Pilih Kondisi ...&nbsp;      </option>
                                                        <option value="1">Baik</option>
                                                        <option value="2">Rusak Ringan</option>
                                                        <option value="3">Rusak Berat</option>
                                                    </select>
													</div>
												</div>
												
										<div id="formbarang2" style="display: none;">
											<hr style="border: 5px solid;color:red;">
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
													<label for="user_id" class="form-label">Kode-NUP Barang 2</label>
													<select name="nup[1]" class="form-control form-select select2"  onchange="showBarang1(this.value,'2')"  style="width: 100%;">
														<option value="aa" selected disabled>Pilih Kode/NUP - Nama Barang ...</div></option>
														@foreach($barang as $item)
														<option value="{{$item->id}}">{{$item->kode}}{{$item->nup}} - {{$item->nm_barang}} - {{$item->merek}}</option>
														@endforeach 
													</select>	
												
												</div>
											</div>
                                               
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
												<div class="table-responsive">
													<br>
													<table class="table border text-nowrap text-md-nowrap table-striped mb-0">
														
														<tbody>
															<tr>
																<td>1</td>
																<td>Nama Barang</td>
																<td id="nm_barang_2"></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Merek</td>
																<td id="merek_2"></td>
															</tr>
													
															<tr>
																<td>3</td>
																<td>Kondisi Barang</td>
																<td id="kondisi_2"></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Lokasi Barang Saat ini</td>
																<td id="lokasi_2"></td>
															</tr>
															<tr>
																<td>5</td>
																<td>Tanggal Perolehan</td>
																<td id="tgl_2"></td>
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
													<select name="lokasi[1]" class="form-control form-select select2" style="width: 100%;" >
														<option value="aa" selected disabled>Pilih Lokasi ...</option>
														@foreach($ruang as $item)
														<option value="{{$item->id}}">{{$item->nm_ruangan}}</option>
														@endforeach
													</select>	
												</div>
											</div>
											@endif
											<div class="form-row">
												<div class="col-xl-8 mb-12 ">
													<label for="kondisi" class="form-label">Kondisi Barang</label>
													<span class="text-warning">* Edit Kondisi barang hanya jika kondisi barang mengalami perubahan</span><br>
													<select id="kondisi2" name="kondisi[1]" class="form-control form-select select2" style="width: 100%;">
													<option value="aa" selected disabled>Pilih Kondisi ...&nbsp;      </option>
													<option value="1">Baik</option>
													<option value="2">Rusak Ringan</option>
													<option value="3">Rusak Berat</option>
												</select>
											</div>
										</div>
										<div id="formbarang3" style="display: none;">
											<hr style="border: 5px solid; color:red;">
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
													<label for="user_id" class="form-label">Kode-NUP Barang 3</label>
													<select name="nup[2]" class="form-control form-select select2"  onchange="showBarang1(this.value,'3')"  style="width: 100%;">
														<option value="aa" selected disabled>Pilih Kode/NUP - Nama Barang ...</div></option>
														@foreach($barang as $item)
														<option value="{{$item->id}}">{{$item->kode}}{{$item->nup}} - {{$item->nm_barang}} - {{$item->merek}}</option>
														@endforeach 
													</select>	
												
												</div>
											</div>
                                               
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
												<div class="table-responsive">
													<br>
													<table class="table border text-nowrap text-md-nowrap table-striped mb-0">
														
														<tbody>
															<tr>
																<td>1</td>
																<td>Nama Barang</td>
																<td id="nm_barang_3"></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Merek</td>
																<td id="merek_3"></td>
															</tr>
													
															<tr>
																<td>3</td>
																<td>Kondisi Barang</td>
																<td id="kondisi_3"></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Lokasi Barang Saat ini</td>
																<td id="lokasi_3"></td>
															</tr>
															<tr>
																<td>5</td>
																<td>Tanggal Perolehan</td>
																<td id="tgl_3"></td>
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
													<select name="lokasi[2]" class="form-control form-select select2" style="width: 100%;" >
														<option value="aa" selected disabled>Pilih Lokasi ...</option>
														@foreach($ruang as $item)
														<option value="{{$item->id}}">{{$item->nm_ruangan}}</option>
														@endforeach
													</select>	
												</div>
											</div>
											@endif
											<div class="form-row">
												<div class="col-xl-8 mb-12 ">
													<label for="kondisi" class="form-label">Kondisi Barang</label>
													<span class="text-warning">* Edit Kondisi barang hanya jika kondisi barang mengalami perubahan</span><br>
													<select id="kondisi3" name="kondisi[2]" class="form-control form-select select2" style="width: 100%;">
													<option value="aa" selected disabled>Pilih Kondisi ...&nbsp;      </option>
													<option value="1">Baik</option>
													<option value="2">Rusak Ringan</option>
													<option value="3">Rusak Berat</option>
												</select>
												</div>
											</div>
										</div>
										<div id="formbarang4" style="display: none;">
											<hr style="border: 5px solid; color:red;">
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
													<label for="user_id" class="form-label">Kode-NUP Barang 4</label>
													<select name="nup[3]" class="form-control form-select select2"  onchange="showBarang1(this.value,'4')"  style="width: 100%;">
														<option value="aa" selected disabled>Pilih Kode/NUP - Nama Barang ...</div></option>
														@foreach($barang as $item)
														<option value="{{$item->id}}">{{$item->kode}}{{$item->nup}} - {{$item->nm_barang}} - {{$item->merek}}</option>
														@endforeach 
													</select>	
												
												</div>
											</div>
                                               
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
												<div class="table-responsive">
													<br>
													<table class="table border text-nowrap text-md-nowrap table-striped mb-0">
														
														<tbody>
															<tr>
																<td>1</td>
																<td>Nama Barang</td>
																<td id="nm_barang_4"></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Merek</td>
																<td id="merek_4"></td>
															</tr>
													
															<tr>
																<td>3</td>
																<td>Kondisi Barang</td>
																<td id="kondisi_4"></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Lokasi Barang Saat ini</td>
																<td id="lokasi_4"></td>
															</tr>
															<tr>
																<td>5</td>
																<td>Tanggal Perolehan</td>
																<td id="tgl_4"></td>
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
													<select name="lokasi[3]" class="form-control form-select select2" style="width: 100%;" >
														<option value="aa" selected disabled>Pilih Lokasi ...</option>
														@foreach($ruang as $item)
														<option value="{{$item->id}}">{{$item->nm_ruangan}}</option>
														@endforeach
													</select>	
												</div>
											</div>
											@endif
											<div class="form-row">
												<div class="col-xl-8 mb-12 ">
													<label for="kondisi" class="form-label">Kondisi Barang</label>
													<span class="text-warning">* Edit Kondisi barang hanya jika kondisi barang mengalami perubahan</span><br>
													<select id="kondisi4" name="kondisi[3]" class="form-control form-select select2" style="width: 100%;">
													<option value="aa" selected disabled>Pilih Kondisi ...&nbsp;      </option>
													<option value="1">Baik</option>
													<option value="2">Rusak Ringan</option>
													<option value="3">Rusak Berat</option>
												</select>
												</div>
											</div>
										</div>
										<div id="formbarang5" style="display: none;">
											<hr style="border: 5px solid; color:red;">
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
													<label for="user_id" class="form-label">Kode-NUP Barang 5</label>
													<select name="nup[4]" class="form-control form-select select2"  onchange="showBarang1(this.value,'5')"  style="width: 100%;">
														<option value="aa" selected disabled>Pilih Kode/NUP - Nama Barang ...</div></option>
														@foreach($barang as $item)
														<option value="{{$item->id}}">{{$item->kode}}{{$item->nup}} - {{$item->nm_barang}} - {{$item->merek}}</option>
														@endforeach 
													</select>	
												
												</div>
											</div>
                                               
											<div class="form-row">
												<div class="col-xl-12 mb-12 ">
												<div class="table-responsive">
													<br>
													<table class="table border text-nowrap text-md-nowrap table-striped mb-0">
														
														<tbody>
															<tr>
																<td>1</td>
																<td>Nama Barang</td>
																<td id="nm_barang_5"></td>
															</tr>
															<tr>
																<td>2</td>
																<td>Merek</td>
																<td id="merek_5"></td>
															</tr>
													
															<tr>
																<td>3</td>
																<td>Kondisi Barang</td>
																<td id="kondisi_5"></td>
															</tr>
															<tr>
																<td>4</td>
																<td>Lokasi Barang Saat ini</td>
																<td id="lokasi_5"></td>
															</tr>
															<tr>
																<td>5</td>
																<td>Tanggal Perolehan</td>
																<td id="tgl_5"></td>
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
													<select name="lokasi[4]" class="form-control form-select select2" style="width: 100%;" >
														<option value="aa" selected disabled>Pilih Lokasi ...</option>
														@foreach($ruang as $item)
														<option value="{{$item->id}}">{{$item->nm_ruangan}}</option>
														@endforeach
													</select>	
												</div>
											</div>
											@endif
											<div class="form-row">
												<div class="col-xl-8 mb-12 ">
													<label for="kondisi" class="form-label">Kondisi Barang</label>
													<span class="text-warning">* Edit Kondisi barang hanya jika kondisi barang mengalami perubahan</span><br>
													<select id="kondisi5" name="kondisi[4]" class="form-control form-select select2" style="width: 100%;">
													<option value="aa" selected disabled>Pilih Kondisi ...&nbsp;      </option>
													<option value="1">Baik</option>
													<option value="2">Rusak Ringan</option>
													<option value="3">Rusak Berat</option>
												</select>
												</div>
											</div>
										</div>
									</div>
								</div>
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
									@foreach($bmn as $index => $bmn)
										<option value="{{$bmn->id}}">{{$bmn->name}}</option>
									@endforeach
								</select>
								@error('petugas')
								<span class="text-danger"> {{ $message }} </span>
								@enderror
							</div>
						</div>
						<p>
						<div class="text-center">
							<button type="submit" value="save" class="btn btn-primary" style="width:150px;">Tambah Data</button>
						</div>
				</form><!-- End Multi Columns Form -->
				</div>
			</div>
			
			<!-- ROW CLOSED -->
		</div>
		<!-- CONTAINER CLOSED -->
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
	function jmlbarang(){
        var numberOfRows = document.getElementById("jml").value;
		
		document.getElementById('opt').style.display = 'none';
		document.getElementById('dtl').style.display = 'inline';

        if(numberOfRows==1){
            document.getElementById('formbarang1').style.display = 'inline';
        }
        else if(numberOfRows==2){
            document.getElementById('formbarang1').style.display = 'inline';
            document.getElementById('formbarang2').style.display = 'inline';
        }
		else if(numberOfRows==3){
            document.getElementById('formbarang1').style.display = 'inline';
            document.getElementById('formbarang2').style.display = 'inline';
			document.getElementById('formbarang3').style.display = 'inline';
        }
		else if(numberOfRows==4){
            document.getElementById('formbarang1').style.display = 'inline';
            document.getElementById('formbarang2').style.display = 'inline';
			document.getElementById('formbarang3').style.display = 'inline';
			document.getElementById('formbarang4').style.display = 'inline';
        }
		else if(numberOfRows==5){
            document.getElementById('formbarang1').style.display = 'inline';
            document.getElementById('formbarang2').style.display = 'inline';
			document.getElementById('formbarang3').style.display = 'inline';
			document.getElementById('formbarang4').style.display = 'inline';
			document.getElementById('formbarang5').style.display = 'inline';
        }
        }
	</script>          