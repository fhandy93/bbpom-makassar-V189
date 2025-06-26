<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Konsumen</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SEPPULO</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Konsumen</li>
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
                        <h3 class="text-center">Detail Data Konsumen</h3>
                        <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                            
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nama Konsumen</td>
                                    <td>{{$ulpk->nama}}</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Umur</td>
                                    <td>{{$ulpk->umur}}</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Jenis Kelamin</td>
                                    <td>{{$ulpk->kelamin}}</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Alamat</td>
                                    <td>{{$ulpk->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>No. Telp/Hp</td>
                                    <td>{{$ulpk->hp}}</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Email</td>
                                    <td>{{$ulpk->email}}</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Perusahaan</td>
                                    <td>{{$ulpk->perusahaan}}</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Pekerjaan</td>
                                    <td>{{$ulpk->pekerjaan}}</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Jenis Layanan</td>
                                    <td>{{$ulpk->jenis}}</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Layanan</td>
                                    <td>{!! $ulpk->layanan !!}</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Jawaban</td>
                                    <td>{!! $ulpk->jawaban !!}</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Komoditi</td>
                                    <td>{{$ulpk->komoditi}}</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Petugas 1</td>
                                    <td>{{$ulpk->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Petugas 2</td>
                                    <td>
                                        @if($v == 1)
                                            {{$ulpk->petugas}}
                                        @else
                                            @if(isset($ulpk->petugas->name))
                                                {{$ulpk->petugas->name}}
                                            @else
                                                -
                                            @endif
                                        @endif    
                                    </td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Sarana Komunikasi</td>
                                    <td>{{$ulpk->sarana}}</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Rujuk/Tindak Lanjut</td>
                                    <td>
                                        @if($ulpk->rujuk=="1")
                                        Ya
                                        @else
                                        Tidak
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>	
                        <p>
                        @if($v == 1)
                            <a href="/konsumen/{{ $ulpk->id }}/edit" class="btn btn-primary my-3">Edit Data</a>
                        @else
                          <a href="/ulpk/{{ $ulpk->id }}/edit" class="btn btn-primary my-3">Edit Data</a>
                        @endif    
                        
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

	<!-- Perfect SCROLLBAR JS-->
	<script src="{{ asset('vendor/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll.js')}}"></script>
	<script src="{{ asset('vendor/plugins/p-scroll/pscroll-1.js')}}"></script>

	<!-- FORMVALIDATION JS -->
	<script src="{{ asset('vendor/js/jquery.validate.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('vendor/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('vendor/js/select2.js')}}"></script>

    </x-HomeLayout>
	