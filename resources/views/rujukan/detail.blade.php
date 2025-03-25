<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Data Rujukan</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Rujukan</li>
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
                   
					<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-12 col-md-6">
                        <div class="table-responsive">
                            <div class="card">
                            <div class="card-status card-status-left 
                                @if($rujuk->status==0)
                                                bg-secondary
                                                @elseif($rujuk->status==1)
                                                bg-warning
                                                @elseif($rujuk->status==2 | $rujuk->status==8)
                                                bg-danger
                                                @elseif($rujuk->status==3)
                                                bg-primary
                                                @elseif($rujuk->status==4)
                                                bg-primary
                                                @elseif($rujuk->status==5)
                                                bg-primary
                                                @elseif($rujuk->status==6)
                                                bg-primary
                                                @elseif($rujuk->status==7)
                                                bg-success
                                                @elseif($rujuk->status==9)
                                                bg-success
                                                @endif
                                br-bs-7 br-ts-7">
                            </div>
                                <div class="card-header">
                                    <h3 class="card-title">Formulir Rujukan</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">             
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tanggal Terima Laporan</td>
                                                <td>: {{$rujuk->tgl_terima}}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Nomor Form</td>
                                                <td>: {{$rujuk->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Status Rujukan</td>
                                                @if($rujuk->status==0)
                                                <td>: <span class="badge rounded-pill bg-secondary">Data Belum Terkirim</span></td>
                                                @elseif($rujuk->status==1)
                                                <td>: <span class="badge rounded-pill bg-warning">Data Terkirim Kabalai</span></td>
                                                @elseif($rujuk->status==2 | $rujuk->status==8)
                                                <td>: <span class="badge rounded-pill bg-danger">Data Dikembalikan Kebalai</span></td>
                                                @elseif($rujuk->status==3)
                                                <td>: <span class="badge rounded-pill bg-primary">Tindak Lanjut Kelompok Infokom</span></td>
                                                @elseif($rujuk->status==4)
                                                <td>: <span class="badge rounded-pill bg-primary">Tindak Lanjut Kelompok Substansi Penindakan</span></td>
                                                @elseif($rujuk->status==5)
                                                <td>: <span class="badge rounded-pill bg-primary">Tindak Lanjut Kelompok Pemeriksaan</span></td>
                                                @elseif($rujuk->status==6)
                                                <td>: <span class="badge rounded-pill bg-primary">Tindak Lanjut Kelompok Substansi Pengujian</span></td>
                                                @elseif($rujuk->status==7)
                                                <td>: <span class="badge rounded-pill bg-success">Data Selesai Diolah</span></td>
                                                @elseif($rujuk->status==9)
                                                <td>: <span class="badge rounded-pill bg-success">Selesai</span></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Petugas Input Rujukan</td>
                                                <td>: {{$rujuk->user->name}}</td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-status card-status-left 
                                    @if($rujuk->status==0)
                                                    bg-secondary
                                                    @elseif($rujuk->status==1)
                                                    bg-warning
                                                    @elseif($rujuk->status==2 | $rujuk->status==8)
                                                    bg-danger
                                                    @elseif($rujuk->status==3)
                                                    bg-primary
                                                    @elseif($rujuk->status==4)
                                                    bg-primary
                                                    @elseif($rujuk->status==5)
                                                    bg-primary
                                                    @elseif($rujuk->status==6)
                                                    bg-primary
                                                    @elseif($rujuk->status==7)
                                                    bg-success
                                                    @elseif($rujuk->status==9)
                                                    bg-success
                                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Identitas Pelapor</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nama</td>
                                                <td>: {{$rujuk->nama}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>3</td>
                                                <td>Tempat Tanggal Lahir</td>
                                                <td>: {{$rujuk->ttl}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Umur</td>
                                                <td>: {{$rujuk->umur}}</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Kelamin</td>
                                                <td>: {{$rujuk->kelamin}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Agama</td>
                                                <td>: {{$rujuk->agama}}</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Pekerjaan</td>
                                                <td>: {{$rujuk->pekerjaan}}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Alamat</td>
                                                <td>: {{$rujuk->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>No. HP/Telp.</td>
                                                <td>: {{$rujuk->hp}}</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Fax</td>
                                                <td>: {{$rujuk->fax}}</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Email</td>
                                                <td>: {{$rujuk->email}}</td>
                                            </tr>
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 
                            <div class="card">
                                <div class="card-status card-status-left 
                                    @if($rujuk->status==0)
                                                    bg-secondary
                                                    @elseif($rujuk->status==1)
                                                    bg-warning
                                                    @elseif($rujuk->status==2 | $rujuk->status==8)
                                                    bg-danger
                                                    @elseif($rujuk->status==3)
                                                    bg-primary
                                                    @elseif($rujuk->status==4)
                                                    bg-primary
                                                    @elseif($rujuk->status==5)
                                                    bg-primary
                                                    @elseif($rujuk->status==6)
                                                    bg-primary
                                                    @elseif($rujuk->status==7)
                                                    bg-success
                                                    @elseif($rujuk->status==9)
                                                    bg-success
                                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Identitas Kasus Masalah</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">  
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">    
                                        <tbody>
                                            <tr>
                                                <td>12</td>
                                                <td>Jenis Pengaduan</td>
                                                <td>: {{$rujuk->pengaduan}}</td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Nama Produk</td>
                                                <td>: {{$rujuk->produk}}</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>No. Registrasi</td>
                                                <td>: {{$rujuk->regis}}</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>No. Batch</td>
                                                <td>: {{$rujuk->batch}}</td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>Kadaluarsa</td>
                                                <td>: {{$rujuk->kadaluarsa}}</td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>Nama Pabrik</td>
                                                <td>: {{$rujuk->pabrik}}</td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>Alamat Pabrik</td>
                                                <td>: {{$rujuk->alm_pab}}</td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>Nama Korban</td>
                                                <td>: {{$rujuk->nama_kor}}</td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>Alamat Korban</td>
                                                <td>: {{$rujuk->alm_kor}}</td>
                                            </tr>
                                            <tr>
                                                <td>21</td>
                                                <td>Kelamin Korban</td>
                                                <td>: {{$rujuk->kelamin_kor}}</td>
                                            </tr>
                                            <tr>
                                                <td>22</td>
                                                <td>Tujuan</td>
                                                <td>: {{$rujuk->tujuan}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><p>
                            </div>
                        </div> 
                    <div class="card m-b-20">
                        <div class="card-status card-status-left 
                            @if($rujuk->status==0)
                                            bg-secondary
                                            @elseif($rujuk->status==1)
                                            bg-warning
                                            @elseif($rujuk->status==2 | $rujuk->status==8)
                                            bg-danger
                                            @elseif($rujuk->status==3)
                                            bg-primary
                                            @elseif($rujuk->status==4)
                                            bg-primary
                                            @elseif($rujuk->status==5)
                                            bg-primary
                                            @elseif($rujuk->status==6)
                                            bg-primary
                                            @elseif($rujuk->status==7)
                                            bg-success
                                            @elseif($rujuk->status==9)
                                            bg-success
                                            @endif
                            br-bs-7 br-ts-7">
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Uraian Masalah</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! $rujuk->desc !!}
                        </div>
                    </div>
               
                    <div class="card m-b-20">
                        <div class="card-status card-status-left 
                            @if($rujuk->status==0)
                                            bg-secondary
                                            @elseif($rujuk->status==1)
                                            bg-warning
                                            @elseif($rujuk->status==2 | $rujuk->status==8)
                                            bg-danger
                                            @elseif($rujuk->status==3)
                                            bg-primary
                                            @elseif($rujuk->status==4)
                                            bg-primary
                                            @elseif($rujuk->status==5)
                                            bg-primary
                                            @elseif($rujuk->status==6)
                                            bg-primary
                                            @elseif($rujuk->status==7)
                                            bg-success
                                            @elseif($rujuk->status==9)
                                            bg-success
                                            @endif
                            br-bs-7 br-ts-7">
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Hal</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $rujuk->hal }}
                        </div>	
                    </div>
                    <div class="card m-b-20">
                        <div class="card-status card-status-left 
                            @if($rujuk->status==0)
                                            bg-secondary
                                            @elseif($rujuk->status==1)
                                            bg-warning
                                            @elseif($rujuk->status==2 | $rujuk->status==8)
                                            bg-danger
                                            @elseif($rujuk->status==3)
                                            bg-primary
                                            @elseif($rujuk->status==4)
                                            bg-primary
                                            @elseif($rujuk->status==5)
                                            bg-primary
                                            @elseif($rujuk->status==6)
                                            bg-primary
                                            @elseif($rujuk->status==7)
                                            bg-success
                                            @elseif($rujuk->status==9)
                                            bg-success
                                            @endif
                            br-bs-7 br-ts-7">
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Keterangan Lain</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $rujuk->ket }}
                        </div>	
                    </div>
                    <div class="card m-b-20">
                        <div class="card-status card-status-left 
                            @if($rujuk->status==0)
                                            bg-secondary
                                            @elseif($rujuk->status==1)
                                            bg-warning
                                            @elseif($rujuk->status==2 | $rujuk->status==8)
                                            bg-danger
                                            @elseif($rujuk->status==3)
                                            bg-primary
                                            @elseif($rujuk->status==4)
                                            bg-primary
                                            @elseif($rujuk->status==5)
                                            bg-primary
                                            @elseif($rujuk->status==6)
                                            bg-primary
                                            @elseif($rujuk->status==7)
                                            bg-success
                                            @elseif($rujuk->status==9)
                                            bg-success
                                            @endif
                            br-bs-7 br-ts-7">
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">File Pendukung</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar1  }}">{{ $rujuk->gambar1  }}</a></li>
                                <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar2  }}">{{ $rujuk->gambar2  }}</a></li>
                                <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar3  }}">{{ $rujuk->gambar3  }}</a></li>
                                <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar4  }}">{{ $rujuk->gambar4  }}</a></li>
                                <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar5  }}">{{ $rujuk->gambar5  }}</a></li>
                                <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $rujuk->gambar6  }}">{{ $rujuk->gambar6  }}</a></li>
                            </ul>
                            
                        </div>	
                    </div>
                    @if($rujuk->status != 0)
                    <div class="card m-b-20">
                        <div class="card-status card-status-left 
                            @if($rujuk->status==0)
                                            bg-secondary
                                            @elseif($rujuk->status==1)
                                            bg-warning
                                            @elseif($rujuk->status==2 | $rujuk->status==8)
                                            bg-danger
                                            @elseif($rujuk->status==3)
                                            bg-primary
                                            @elseif($rujuk->status==4)
                                            bg-primary
                                            @elseif($rujuk->status==5)
                                            bg-primary
                                            @elseif($rujuk->status==6)
                                            bg-primary
                                            @elseif($rujuk->status==7)
                                            bg-success
                                            @elseif($rujuk->status==9)
                                            bg-success
                                            @endif
                            br-bs-7 br-ts-7">
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Tindak Lanjut Kepala BBPOM Di Makassar</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                           
                            @if($rujuk->tindak=="4")
                            Tindak Lanjut :
                            Dirujuk ke Kelompok substansi penindakan 
                            @elseif($rujuk->tindak=="5")
                            Tindak Lanjut :
                            Dirujuk ke kelompok Substansi Pemeriksaan
                            @elseif($rujuk->tindak=="6")
                            Tindak Lanjut :
                            Dirujuk ke kelompok Substansi Pengujian
                            @elseif($rujuk->tindak=="3")
                            Tindak Lanjut :
                            Diselesaikan di Kelompok Substansi Infokom
                            @else
                                @if(checkPermission(['kabalai','superadmin']))  
                                    @if($rujuk->status=="1")
                                        <form method="post" class="form-horizontal" action="/v2-tindak-store/{{$rujuk->id}}">
                                        @csrf
                                        @method('put')	
                                            <div class="form-row">   
                                                <div class="col-md-6 ">
                                                <label for="tgl_terima" class="form-label">Pilih Tindak Lanjut</label> 
                                                    <select name="tindak" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                                        <option value="3">Diselesaikan dikelompok Infokom</option>
                                                        <option value="4">Dirujuk ke Kelompok substansi penindakan </option>
                                                        <option value="5">Dirujuk ke Kelompok Pemeriksaan</option>
                                                        <option value="6">Dirujuk keKelompok Substansi Pengujian</option>
                                                    </select>
                                                </div>
                                                
                                            </div><p>
                                            <div class="form-row">
                                                <div class="col-md-6 ">
                                                    <label for="tgl_terima" class="form-label">Deskripsi Tindak Lanjut</label> 
                                                    <textarea class="ckeditor form-control @error('desc_tl') is-invalid @enderror" cols="30" rows="10" name="desc_tl" id="desc_tl" ></textarea>
                                                    @error('desc')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}    
                                                    </div>
                                                    @enderror
                                                </div> 
                                            </div><p>
                                            <div class="">
                                                    <button type="submit" class="btn btn-primary show_confirm_lanjut">Kirim Tindak Lanjut</button>
                                                </div>
                                        </form>
                                    @endif
                                @else 
                                -
                                @endif
                            @endif
                            <p><p>
                            @if($rujuk->status != 0 && $rujuk->status != 1 )
                            Deskripsi Tindak Lanjut:<p>
                                {!! $rujuk->desc_tl !!}
                            @endif
                        </div>	
                    </div>
                    @endif
                    @if(isset($rujuk->kembali))
                    <div class="card m-b-20">
                       
                        <div class="card-header bg-danger">
                            <h3 class="card-title">Alasan Pengembalian Rujukan</h3>
                            <div class="card-options">
                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! $rujuk->kembali !!}
                        </div>	
                    </div>
                    @endif

                    @if(isset($hasil))
                        @if($hasil->bidang != 0)
                        <h3 class="text-center">Hasil Rujukan</h3>
                        <div class="card m-b-20">
                            <div class="card-status card-status-left 
                            @if($rujuk->status==0)
                                            bg-secondary
                                            @elseif($rujuk->status==1)
                                            bg-warning
                                            @elseif($rujuk->status==2 | $rujuk->status==8)
                                            bg-danger
                                            @elseif($rujuk->status==3)
                                            bg-primary
                                            @elseif($rujuk->status==4)
                                            bg-primary
                                            @elseif($rujuk->status==5)
                                            bg-primary
                                            @elseif($rujuk->status==6)
                                            bg-primary
                                            @elseif($rujuk->status==7)
                                            bg-success
                                            @elseif($rujuk->status==9)
                                            bg-success
                                            @endif
                            br-bs-7 br-ts-7">
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">Jawaban Hasil Rujukan</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $hasil->desc !!}
                            </div>	
                        </div>
                        <div class="card m-b-20">
                            <div class="card-status card-status-left 
                            @if($rujuk->status==0)
                                            bg-secondary
                                            @elseif($rujuk->status==1)
                                            bg-warning
                                            @elseif($rujuk->status==2 | $rujuk->status==8)
                                            bg-danger
                                            @elseif($rujuk->status==3)
                                            bg-primary
                                            @elseif($rujuk->status==4)
                                            bg-primary
                                            @elseif($rujuk->status==5)
                                            bg-primary
                                            @elseif($rujuk->status==6)
                                            bg-primary
                                            @elseif($rujuk->status==7)
                                            bg-success
                                            @elseif($rujuk->status==9)
                                            bg-success
                                            @endif
                            br-bs-7 br-ts-7">
                        </div>
                            <div class="card-header">
                                <h3 class="card-title">File Pendukung Hasil Rujukan</h3>
                                <div class="card-options">
                                    <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $hasil->gambar1  }}">{{ $hasil->gambar1  }}</a></li>
                                    <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $hasil->gambar2  }}">{{ $hasil->gambar2  }}</a></li>
                                    <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $hasil->gambar3  }}">{{ $hasil->gambar3  }}</a></li>
                                    <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $hasil->gambar4  }}">{{ $hasil->gambar4  }}</a></li>
                                    <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $hasil->gambar5  }}">{{ $hasil->gambar5  }}</a></li>
                                    <li class="list-group-item"><i class="fa fa-download text-muted me-2" aria-hidden="true"></i><a href="/v2-rujuk-download{{ $hasil->gambar6  }}">{{ $hasil->gambar6  }}</a></li>
                                </ul>
                                
                            </div>	
                        </div>
                        @endif
                    @endif
                        <p>
                        <table>
                            <tr>
                                <td>
                                <a href="/v2-rujukan/{{ $rujuk->id }}/cetak" class="btn btn-primary my-3">Cetak Data</a>
                                <!-- menu infokom -->
                                @if(Auth::user()->is_permission==5 or Auth::user()->is_permission==1 or Auth::user()->is_permission==17)
                                    @if($rujuk->status==0 or $rujuk->status==2)
                                    <a href="/v2-rujukan/{{ $rujuk->id }}/edit" class="btn btn-primary my-3">Edit Data</a>
                                    @endif
                                    @if($rujuk->status==0 or $rujuk->status==2)
                                        @if(Auth::user()->id == 1 or Auth::user()->id == 64)
                                            <form method="POST" action="/v2-rujukk" class="d-inline">
                                                @csrf
                                                @method('post')	
                                                <input type="text" value="{{ $rujuk->id }}" name="rujukan_id" hidden>
                                                <input type="submit" value="Kirim Data" class="btn btn-success my-3 show_confirm">
                                            </form>
                                        @endif
                                    @endif
                                @endif

                                <!-- menu bidang lain -->
                                @if(Auth::user()->is_permission==7 or 
                                    Auth::user()->is_permission==17 or 
                                    Auth::user()->is_permission==1 or 
                                    Auth::user()->is_permission==8 or 
                                    Auth::user()->is_permission==5 or  
                                    Auth::user()->is_permission==9)

                                    <!-- @if($rujuk->status==1)
                                    <form method="POST" action="/rujukkon" class="d-inline">
                                        @csrf
                                        @method('post')	
                                        <input type="text" value="{{ $rujuk->id }}" name="rujukan_id" hidden>
                                        <input type="submit" value="Konfirmasi Data" class="btn btn-warning my-3 show_confirmk">
                                    </form>
                                    @endif -->
                                    <!-- @if($rujuk->status==1)
                                    <a href="/formkembali/{{ $rujuk->id }}" class="btn btn-danger my-3">Kembalikan Data</a>
                                    @endif -->
                            
                                        <a href="/v2-rujuk-hasil/{{ $rujuk->id }}/edit" class="btn btn-primary my-3">Edit Data Hasil</a>
                                
                                        <form method="POST" action="/v2-rujuk-kirim-hasil" class="d-inline">
                                            @csrf
                                            @method('post')	
                                            <input type="text" value="{{ $rujuk->id }}" name="rujukan_id" hidden>
                                            <input type="submit" value="Kirim Hasil Rujukan" class="btn btn-success my-3 show_confirmh">
                                        </form>
                                @endif


                                @if(Auth::user()->is_permission==16||Auth::user()->is_permission==1)
                                    @if($rujuk->status==1 | $rujuk->status==7)
                                        <a href="/v2-formkembali/{{ $rujuk->id }}" class="btn btn-danger my-3">Kembalikan Data</a>
                                    @endif    
                                    @if($rujuk->status==7)
                                    <form method="POST" action="/v2-rujuk-selesai" class="d-inline">
                                        @csrf
                                        @method('post')	
                                        <input type="text" value="{{ $rujuk->id }}" name="rujukan_id" hidden>
                                        <button type="submit" class="btn btn-warning my-3 show_confirmk"><i class="fe fe-check me-2"></i>Selesai</button>
                                        
                                    </form>
                                    @endif    
                                @endif
                                </td>
                            </tr>
                        </table>
                      
                        
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

     <!-- Swet Alert -->
     <script src="{{ asset ('vendor/plugins/sweet-alert/sweetalert.min.js')}}"></script>


<script type="text/javascript">
setTimeout(function() {
            document.getElementById('success').style.display = 'none';
        }, 4000); // <-- time in milliseconds
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
    $('.show_confirmk').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Selesaikan Rujukan ?`,
            text: "Hasil Rujukan akan dikembalikan ke INFOKOM.",
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
    $('.show_confirmh').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Anda yakin ingin Mengirim hasil data ini ?`,
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
    $('.show_confirm_lanjut').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Kirim tindak lanjut untuk laporan ini ?`,
            text: "",
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
    </x-HomeLayout>
	
