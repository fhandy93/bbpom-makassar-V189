<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Online SPPD BBPOM Di Makassar</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Online SPPD</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Formulir</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
					<x-notify />    	
					<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-10 col-md-10">
					
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Formulir Online SPPD</h3>
							</div>
							<div class="card-body">
								<form id="signupForm" method="post" class="form-horizontal" action="/sppd-update-external/{{$data->id}}" enctype="multipart/form-data">
									@csrf
									@method('put')

									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="user_data" class="form-label">Nama</label>
											<input type="text"  value="{{$data->user_data}}" id="user_data" class="form-control  @error('nip') is-invalid @enderror" name="user_data" readonly>
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="nip" class="form-label">NIP</label>
											<input type="text" value="{{$data->nip }}" id="nip" class="form-control  @error('nip') is-invalid @enderror" name="nip" >
											@error('nip')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="pangkat" class="form-label">Pangkat</label>
											<input type="text" value="{{$data->pangkat}}" id="pangkat" class="form-control  @error('pangkat') is-invalid @enderror" name="pangkat" >
											@error('pangkat')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-10 mb-12 ">
											<label for="jabatan" class="form-label">jabatan</label>
											<input type="text" value="{{$data->jabatan}}" id="jabatan" class="form-control  @error('jabatan') is-invalid @enderror" name="jabatan" >
											@error('jabatan')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Tingkat Biaya Perjalanan</label>
											<select name="level_biaya" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih Tingkat Biaya Perjalanan ...</option>
												<option value="1" {{ $data->level_biaya == 1 ? 'selected' : '' }} >A</option>
												<option value="2" {{ $data->level_biaya == 2 ? 'selected' : '' }} >B</option>
												<option value="3" {{ $data->level_biaya == 3 ? 'selected' : '' }} >C</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="maksud" class="form-label">Maksud Perjalanan Dinas</label>
											<textarea  class="form-control  @error('jenis') is-invalid @enderror" id="maksud" name="maksud"  rows="4">{{ $data->maksud }}</textarea>
											@error('maksud')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Moda Transportasi</label>
											<select name="transport" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih Moda Transportasi ...</option>
												<option value="Pesawat Udara" {{ $data->transport == 'Pesawat Udara' ? 'selected' : '' }} >Pesawat Udara</option>
												<option value="Kendaraan Umum" {{ $data->transport == 'Kendaraan Umum' ? 'selected' : '' }} >Kendaraan Umum</option>
												<option value="Kendaraan Dinas" {{ $data->transport == 'Kendaraan Dinas' ? 'selected' : '' }} >Kendaraan Dinas</option>
												<option value="Kapal Air" {{ $data->transport == 'Kapal Air' ? 'selected' : '' }} >Kapal Air</option>
												<option value="Kereta Api" {{ $data->transport == 'Kereta Api' ? 'selected' : '' }} >Kereta Api</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="asal" class="form-label">Tempat Berangkat</label>
											<input type="text" value="{{$data->asal}}" id="asal" class="form-control  @error('asal') is-invalid @enderror" name="asal" >
											@error('asal')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-6 mb-12 ">
											<label for="tujuan" class="form-label">Tempat Tujuan</label>
											<input type="text" value="{{$data->tujuan}}" id="tujuan" class="form-control  @error('tujuan') is-invalid @enderror" name="tujuan" >
											@error('tujuan')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
                                        <div class="col-xl-6 mb-12 ">
                                            <label for="tgl_berangkat" class="form-label">Tanggal Berangkat. (Tanggal-Bulan-Tahun)</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{date('d/m/Y', strtotime($data->tgl_berangkat));}}" type="text" name="tgl_berangkat" id="tgl_berangkat">
                                            </div>
                                            @error('tgl_berangkat')
                                            <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                        </div>
                                    </div>
									<div class="form-row">
                                        <div class="col-xl-6 mb-12 ">
                                            <label for="tgl_kembali" class="form-label">Tanggal Kembali. (Tanggal-Bulan-Tahun)</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{date('d/m/Y', strtotime($data->tgl_kembali));}}" type="text" name="tgl_kembali" id="tgl_kembali">
                                            </div>
                                            @error('tgl_kembali')
                                            <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                        </div>
                                    </div>
                                    <br>
										<div class="card">
											<div class="card-header">
												<h3 class="card-title">Tempat dan Tanggal Berangkat/Kembali Tambahan</h3>
											</div>
											<div class="card-body">
												<span class="text-warning">* Diisi hanya jika perjalanan dinas dilakukan lebih dari 2 hari dan tidak menginap atau Pulang Pergi (PP)</span><br>
												<br>
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">Tambahan 1</h3>
													</div>
													<div class="card-body">
														<div class="form-row">
															<label class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" name="jns_dns2" value="1" @if($data->jns_dns2 == 1) checked @endif>
																	<span class="custom-control-label">Dinas Berlanjut</span>
															</label>&nbsp; &nbsp; &nbsp; 
															<label class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" name="jns_dns2" value="2" @if($data->jns_dns2 == 2) checked @endif>
																	<span class="custom-control-label">Dinas Hari Berbeda</span>
															</label> 
															
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="asal" class="form-label">Tempat Berangkat</label>
																<input type="text"  id="asal" class="form-control" name="asal2" value="{{ $data->asal2 }}">
																@error('asal')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>	
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tujuan" class="form-label">Tempat Tujuan</label>
																<input type="text"  id="tujuan" class="form-control" name="tujuan2"  value="{{ $data->tujuan2 }}">
																@error('tujuan')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tgl_berangkat2" class="form-label">Tanggal Berangkat</label>
																<div class="input-group">
																	<div class="input-group-text">
																		<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
																	</div>
																	<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"  type="text" name="tgl_berangkat2" id="tgl_berangkat2" value="@if(isset($data->tgl_berangkat2)) {{date('d/m/Y', strtotime($data->tgl_berangkat2))}}@endif">
																</div>
																@error('tgl_berangkat')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tgl_kembali2" class="form-label">Tanggal Kembali</label>
																<div class="input-group">
																	<div class="input-group-text">
																		<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
																	</div>
																	<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="tgl_kembali2" id="tgl_kembali2" value="@if(isset($data->tgl_kembali2)) {{date('d/m/Y', strtotime($data->tgl_kembali2))}} @endif">
																</div>
																@error('tgl_kembali')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div><br>
														
													</div>
												</div><br>
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">Tambahan 2</h3>
													</div>
													<div class="card-body">
														<div class="form-row">
															<label class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" name="jns_dns3" value="1" @if($data->jns_dns3 == 1) checked @endif>
																	<span class="custom-control-label">Dinas Berlanjut</span>
															</label>&nbsp; &nbsp; &nbsp; 
															<label class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" name="jns_dns3" value="2" @if($data->jns_dns3 == 2) checked @endif>
																	<span class="custom-control-label">Dinas Hari Berbeda</span>
															</label> 
															
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="asal" class="form-label">Tempat Berangkat</label>
																<input type="text"  id="asal" class="form-control " name="asal3"  value="{{ $data->asal3 }}">
																@error('asal')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>	
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tujuan" class="form-label">Tempat Tujuan</label>
																<input type="text"  id="tujuan" class="form-control" name="tujuan3" value="{{ $data->tujuan3 }}">
																@error('tujuan')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tgl_berangkat2" class="form-label">Tanggal Berangkat</label>
																<div class="input-group">
																	<div class="input-group-text">
																		<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
																	</div>
																	<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"  type="text" name="tgl_berangkat3" id="tgl_berangkat3" value="@if(isset($data->tgl_berangkat3)) {{date('d/m/Y', strtotime($data->tgl_berangkat3))}}@endif">
																</div>
																@error('tgl_berangkat')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tgl_kembali2" class="form-label">Tanggal Kembali</label>
																<div class="input-group">
																	<div class="input-group-text">
																		<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
																	</div>
																	<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="tgl_kembali3" id="tgl_kembali3" value="@if(isset($data->tgl_kembali3)) {{date('d/m/Y', strtotime($data->tgl_kembali3))}} @endif">
																</div>
																@error('tgl_kembali')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
													</div>
												</div><br>
												<div class="card">
													<div class="card-header">
														<h3 class="card-title">Tambahan 3</h3>
													</div>
													<div class="card-body">
														<div class="form-row">
															<label class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" name="jns_dns4" value="1" @if($data->jns_dns4 == 1) checked @endif>
																	<span class="custom-control-label">Dinas Berlanjut</span>
															</label>&nbsp; &nbsp; &nbsp; 
															<label class="custom-control custom-radio">
																	<input type="radio" class="custom-control-input" name="jns_dns4" value="2" @if($data->jns_dns4 == 2) checked @endif>
																	<span class="custom-control-label">Dinas Hari Berbeda</span>
															</label> 
															
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="asal" class="form-label">Tempat Berangkat</label>
																<input type="text"  id="asal" class="form-control" name="asal4" value="{{ $data->asal4 }}">
																@error('asal')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>	
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tujuan" class="form-label">Tempat Tujuan</label>
																<input type="text"  id="tujuan" class="form-control" name="tujuan4" value="{{ $data->tujuan4 }}">
																@error('tujuan')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tgl_berangkat2" class="form-label">Tanggal Berangkat</label>
																<div class="input-group">
																	<div class="input-group-text">
																		<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
																	</div>
																	<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"  type="text" name="tgl_berangkat4" id="tgl_berangkat4" value="@if(isset($data->tgl_berangkat4)) {{date('d/m/Y', strtotime($data->tgl_berangkat4))}} @endif">
																</div>
																@error('tgl_berangkat')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
														<div class="form-row">
															<div class="col-xl-6 mb-12 ">
																<label for="tgl_kembali2" class="form-label">Tanggal Kembali</label>
																<div class="input-group">
																	<div class="input-group-text">
																		<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
																	</div>
																	<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="tgl_kembali4" id="tgl_kembali4" value="@if(isset($data->tgl_kembali4)) {{date('d/m/Y', strtotime($data->tgl_kembali4))}} @endif">
																</div>
																@error('tgl_kembali')
																<span class="invalid-feedback"> {{ $message }} </span>
																@enderror	
															</div>
														</div>
													</div>
												</div><br>
											</div>
										</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="instansi" class="form-label">Instansi</label>
											<input type="text"  id="instansi" value="{{$data->instansi}}" class="form-control  @error('instansi') is-invalid @enderror" name="instansi" >
											@error('instansi')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="akun" class="form-label">Akun</label>
											<input type="text" value="{{$data->akun}}" id="akun" class="form-control  @error('akun') is-invalid @enderror" name="akun" >
											@error('akun')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
									<div class="form-row">
										<div class="col-xl-8 mb-12 ">
											<label for="ket" class="form-label">Keterangan Lain-lain/Nomor Surat Tugas</label>
											<input type="text" value="{{$data->keterangan}}" id="ket" class="form-control  @error('ket') is-invalid @enderror" name="ket" >
											@error('ket')
											<span class="invalid-feedback"> {{ $message }} </span>
											@enderror	
										</div>
									</div>
								    <div class="form-row">
                                        <div class="col-xl-6 mb-12 ">
                                            <label for="tgl" class="form-label">Tanggal Surat Tugas.</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="@if(isset($data->tgl_st)){{date('d/m/Y', strtotime($data->tgl_st))}}@else{{\Carbon\Carbon::now()->format('d/m/Y')}}  @endif" type="text" name="tgl_st" id="tgl_st">
                                            </div>
                                            @error('tgl')
                                            <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                        </div>
                                    </div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">PPK</label>
											<select name="ppk" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih PPK ...</option>
												<option value="1" {{ $data->ppk == '1' ? 'selected' : '' }} >Tri Astuty, ST</option>
												<option value="2" {{ $data->ppk == '2' ? 'selected' : '' }}>Hamdana, S.Si </option>
												<option value="3" {{ $data->ppk == '3' ? 'selected' : '' }}>Yayu Sulistia, S.Si., Apt. </option>
												<option value="4" {{ $data->ppk == '4' ? 'selected' : '' }}>Siti Nurazika Arifin, SE </option>

									
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Mengetahui</label>
											<select name="mengetahui" class="form-control form-select select2" data-bs-placeholder="Jenis Pemeliharaan">
												<option value="aa" selected disabled>Pilih ...</option>
												<option value="1" {{ $data->mengetahui == '1' ? 'selected' : '' }} >Kepala Bagian Tata Usaha</option>
												<option value="2" {{ $data->mengetahui == '2' ? 'selected' : '' }} >Ketua TIM SAKIP, IKPA</option>
												<option value="3" {{ $data->mengetahui == '3' ? 'selected' : '' }} >Ketua TIM IT </option>
												<option value="4" {{ $data->mengetahui == '4' ? 'selected' : '' }} >Ketua TIM Inspeksi Kedeputian II </option>
												<option value="5" {{ $data->mengetahui == '5' ? 'selected' : '' }} >Ketua TIM Inspeksi Kedeputian I </option>
												<option value="6" {{ $data->mengetahui == '6' ? 'selected' : '' }} >Ketua TIM Inspeksi Kedeputian III </option>
												<option value="7" {{ $data->mengetahui == '7' ? 'selected' : '' }} >Ketua TIM Sertifikasi</option>
												<option value="8" {{ $data->mengetahui == '8' ? 'selected' : '' }} >Ketua TIM Kegiatan Non Pro PN</option>
												<option value="9" {{ $data->mengetahui == '9' ? 'selected' : '' }} >Ketua TIM Kegiatan Pro PN</option>
												<option value="10" {{ $data->mengetahui == '10' ? 'selected' : '' }} >Ketua TIM Penindakan</option>
												<option value="11" {{ $data->mengetahui == '11' ? 'selected' : '' }} >Ketua TIM Pengujian (Obat–OT–SK)</option>
												<option value="12" {{ $data->mengetahui == '12' ? 'selected' : '' }} >Ketua TIM Pengujian (Kosmetik)</option>
												<option value="13" {{ $data->mengetahui == '13' ? 'selected' : '' }} >Ketua TIM Pengujian (Pangan)</option>
												<option value="14" {{ $data->mengetahui == '14' ? 'selected' : '' }} >Ketua TIM Sistem Manajemen Mutu</option>
											</select>
										</div>
									</div>
										<div class="form-row">
                                        <div class="col-xl-6 mb-12 ">
                                            <label for="tgl" class="form-label">Tanggal Mengetahui</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{date('d/m/Y', strtotime($data->tgl));}}" type="text" name="tgl" id="tgl">
                                            </div>
                                            @error('tgl')
                                            <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror	
                                        </div>
                                    </div><br>
									<div class="form-row" id="galeri"  >
                                        <div class="col-xl-8 mb-12 ">
                                            <div class="form-group">
												
                                                <label class="form-label mt-0">Input Surat Tugas</label>
												<span class="text-warning">*Input File untuk mengedit file</span>
                                                <input class="form-control @error('st') is-invalid @enderror" type="file" name="st" id="st">
												@if(isset($data->file))
												<li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/sppd-download{{$data->file}}">{{ $data->file  }}</a></li>
												@endif
												@error('st')
												<span class="invalid-feedback"> {{ $message }} </span>
												@enderror<p>	
                                                <span class="text-warning">* File harus berextensi PDF</span>
                                            </div>
                                        </div>
                                    </div>
									<p><br>
									<div class="form-row">
										<div class="form-group col-xl-6 mb-12 ">
											<label class="form-label">Pengikut :</label><p>
											<span class="text-warning">*</span> Diisi hanya jika diperlukan
										</div>
									</div>
									<div class="form-row">
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label">Pengikut 1<span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Nama" name="nama_pengikut1" @if(isset($ikut->nama1)) value='{{$ikut->nama1}}' @endif >
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"><span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir_pengikut1" @if(isset($ikut->tgl1)) value='{{$ikut->tgl1}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"> <span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Ket." name="ket_pengikut1" @if(isset($ikut->ket1)) value='{{$ikut->ket1}}' @endif>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label">Pengikut 2<span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Nama" name="nama_pengikut2" @if(isset($ikut->nama2)) value='{{$ikut->nama2}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"><span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir_pengikut2" @if(isset($ikut->tgl2)) value='{{$ikut->tgl2}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"> <span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Ket." name="ket_pengikut2"  @if(isset($ikut->ket2)) value='{{$ikut->ket2}}' @endif>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label">Pengikut 3<span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Nama" name="nama_pengikut3" @if(isset($ikut->nama3)) value='{{$ikut->nama3}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"><span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir_pengikut3" @if(isset($ikut->tgl3)) value='{{$ikut->tgl3}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"> <span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Ket." name="ket_pengikut3" @if(isset($ikut->ket3)) value='{{$ikut->ket3}}' @endif>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label">Pengikut 4<span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Nama" name="nama_pengikut4"  @if(isset($ikut->nama4)) value='{{$ikut->nama4}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"><span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir_pengikut4" @if(isset($ikut->tgl4)) value='{{$ikut->tgl4}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"> <span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Ket." name="ket_pengikut4" @if(isset($ikut->ket4)) value='{{$ikut->ket4}}' @endif >
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label">Pengikut 5<span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Nama" name="nama_pengikut5" @if(isset($ikut->nama5)) value='{{$ikut->nama5}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"><span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir_pengikut5" @if(isset($ikut->tgl5)) value='{{$ikut->tgl5}}' @endif>
											</div>
										</div>
										<div class="col-sm-4 col-md-4">
											<div class="form-group">
												<label class="form-label"> <span class="text-warning">*</span></label>
												<input type="text" class="form-control" placeholder="Ket." name="ket_pengikut5" @if(isset($ikut->ket5)) value='{{$ikut->ket5}}' @endif >
											</div>
										</div>
									</div>

									<p>
									@if($data->status == 1)
									<div class="text-center">
										<button type="submit" name="mode" value="save" class="btn btn-primary" style="width:150px;">Update Laporan</button>
										<button type="submit" name="mode" value="kirim" class="btn btn-secondary show_confirm" >Kirim dan Update Laporan</button>
									</div>
									@endif
									@if($data->status == 2 || $data->status == 3 && checkPermission(['superadmin']) || checkPermission(['admin']) )
									<div class="text-center">
										<button type="submit" name="mode" value="admin" class="btn btn-primary" >Update Laporan VIA Admin</button>
									</div>
									@endif
								</form><!-- End Multi Columns Form -->
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
		var date = $('#tgl_berangkat2').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_berangkat3').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_berangkat4').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_kembali').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_kembali2').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_kembali3').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_kembali4').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl_st').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		var date = $('#tgl').datepicker({ dateFormat: 'dd/mm/yy' }).val();
		setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					user_data: {
						required: true
					},
					level_biaya: {
						required: true
					},
                    maksud : {
						required: true
					},
                    transport: {
						required: true
					},
					nip: {
						required: true
					},
                    pangkat : {
						required: true
					},
                    jabatan: {
						required: true
					},
					asal: {
						required: true
					},
                    tujuan: {
						required: true,
					},
					instansi: {
						required: true,
					},
                    akun: {
						required: true,
					},
					ket: {
						required: true,
					},
					ppk: {
						required: true,
					},
					mengetahui: {
						required: true,
					}


				},
				messages: {
					user_data: {
						required: "Nama Pegawai harus diisi"
					},
					level_biaya: {
						required: "Tingkat Biaya Perjalanan harus dipilih"
					},
                    maksud : {
						required: "Maksud Perjalanan Dinas harus diisi"
					},
                    transport: {
						required: "Moda Transport harus dipilih"
					},
					nip: {
						required: "NIP harus terisih"
					},
                    pangkat : {
						required: "Pangkat harus terisih"
					},
                    jabatan: {
						required: "Jabatan harus terisih"
					},
					asal: {
						required: "Tempat Berangkat harus diisi",
					},
                    tujuan: {
						required: "Tempat Tujuan harus diisi"
					},
					instansi: {
						required: "Instansi harus diisi"
					},
                    akun: {
						required: "Akun harus diisi"
					},
                    ket: {
						required: "Keterangan harus diisi"
					},
                    ppk: {
						required: "Nama PPK harus dipilih"
					},
                    mengetahui: {
						required: "Atasan Mengetahui harus diisi"
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