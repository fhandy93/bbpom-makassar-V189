<x-HomeLayout>
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Peminjaman AULA</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">BMN Moments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peminjaman AULA</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row row-sm">
                    @if (session() -> has('success'))
                        <div class="card-body text-center" id="success"> 
                            <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                            <h4 class="h4 mb-0 mt-3">Success</h4>
                            <p class="card-text">{{ session() -> get('success')}}</p>
                        </div>
                    @endif 
                    @if (session() -> has('warning'))
                        <div class="card-body text-center" id="success"> 
                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#fad383" d="M15.728,22H8.272a1.00014,1.00014,0,0,1-.707-.293l-5.272-5.272A1.00014,1.00014,0,0,1,2,15.728V8.272a1.00014,1.00014,0,0,1,.293-.707l5.272-5.272A1.00014,1.00014,0,0,1,8.272,2H15.728a1.00014,1.00014,0,0,1,.707.293l5.272,5.272A1.00014,1.00014,0,0,1,22,8.272V15.728a1.00014,1.00014,0,0,1-.293.707l-5.272,5.272A1.00014,1.00014,0,0,1,15.728,22Z"/><circle cx="12" cy="16" r="1" fill="#f7b731"/><path fill="#f7b731" d="M12,13a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v4A1,1,0,0,1,12,13Z"/></svg></span>
                            <h4 class="h4 mb-0 mt-3">Warning</h4>
                            <p class="card-text">{{ session() -> get('warning')}}</p>
                        </div>
                    @endif 
                    <div class="col-lg-12">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Tanggal Peminjaman</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="/bmn/peminjaman-aula-filter" method="post">
                                            @csrf
                                            @method('post')
                                            <div class="row">
                                                <div class="col-sm-10 col-md-10">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                            </div>
                                                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" @if(isset($tgl)) value="{{$tgl}}" @else value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" @endif  type="text" name="tgl" id="tgl">
                                                        </div>
                                                        @error('tgl')
                                                        <span class="invalid-feedback"> {{ $message }} </span>
                                                        @enderror	
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-md-2">
                                                    <div class="form-group">
                                                        <button class="btn btn-primary"><i class="fa fa-check"></i> Pilih</button>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         
                           <div class="row ">
                                @foreach($aula as $item)
                                <div class="col-xl-6 col-sm-12">
                                    <div class="card border p-0">
                                        <div class="card-header bg-gray">
                                            <h4 class="card-title text-white">{{$item->nm_aula}}</h4>
                                            <div class="card-options">
                                                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="javascript:void(0)" class="card-options-remove" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            
<span class="avatar avatar-xxl brround cover-image" data-bs-image-src="{{ asset($item->foto)}}" style="background: url() center center;"></span>
                                            <h4 class="h4 mb-0 mt-3">Ukuran AULA {{$item->ukuran}}</h4>
                                            <h5 class="h5 mb-0 mt-3">Kapasitas AULA {{$item->kapasitas}}</h5><br>
                                            <h5 class="h5 mb-0 mt-3">Petugas AULA : {{$item->petugas}} <a href="https://wa.me/{{$item->wa_petugas}}" target="_blank"><i class="fa fa-whatsapp"></i></a> </h5><br>
                                            <p class="card-text"><span class="badge rounded-pill @if($item->status == 1) bg-success @elseif($item->status == 2) bg-warning @else bg-danger @endif"> @if($item->status == 1) Ready @elseif($item->status == 2) Maintenance @else Not Available @endif</span></p>
                                        </div>
                                        <div class="card-footer ">
                                        <div class="list-group">
                                            @foreach($trans as $tr)
                                                @if($tr->aula_id == $item->id )
                                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action flex-column align-items-start">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h5 class="mb-1">@if(isset($tr->user->name)){{$tr->user->name}}@endif</h5>
                                                            <small class="text-muted">Tanggal :{{\Carbon\Carbon::parse($tr->wkt_pinjam)->format('d-m-Y')}}</small>
                                                        </div>
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <small class="text-muted">Status :  <span class="badge rounded-pill @if($tr->status == 0) bg-warning @elseif($tr->status == 1) bg-success @else bg-danger @endif"> @if($tr->status == 0) Waiting Approval @elseif($tr->status == 1) Approved @else Rejected @endif</span></small>
                                                            <small class="text-muted">jam :{{\Carbon\Carbon::parse($tr->wkt_pinjam)->format('H:i')}}</small>
                                                        </div>
                                                        
                                                    </a>
                                                @endif
                                            @endforeach
                                                 
                                            </div><br>
                                            <div class="text-center">
                                            @if($item->status == 1 || $item->status == 2) 
                                                <a href="/bmn/peminjaman-aula/{{$item->id}}" class="btn btn-primary btn-sm ">Ajukan Peminjaman</a> 
                                            @else 

                                            @endif
                                            
                                            </div>    
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                @endforeach
                            </div>
                            <!-- ROW-3 CLOSED -->
                    
                </div>
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

    <!-- DATA TABLE JS-->
    <script src="{{ asset('vendor/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('vendor/js/table-data.js')}}"></script>

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

	<!-- DATEPICKER JS -->
	<script src="{{ asset('vendor/plugins/date-picker/date-picker.js')}}"></script>
     <script src="{{ asset('vendor/plugins/date-picker/jquery-ui.js')}}"></script>
     <script src="{{ asset('vendor/plugins/input-mask/jquery.maskedinput.js')}}"></script>

	 <!-- INTERNAL Bootstrap-Datepicker js-->
     <script src="{{ asset('vendor/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
</x-HomeLayout>
<script type="text/javascript">
    var date = $('#tgl').datepicker({ dateFormat: 'dd/mm/yy' }).val();
</script>