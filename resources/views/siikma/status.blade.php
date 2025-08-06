<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Detail Izin</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIKAMA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Izin</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
                @if(request('status') == 'success')
                    <div class="row" style="margin-top: 30px;margin-bottom: 50px;">
                        <div class="col-md-12 text-center">
                            <h3>Izin Telah Terkirim</h3>
                            <h5>Notifikasi telah disampaikan kepada pihak security</h5>
                            <h5>Anda dapat memperlihatkan pesan ini untuk lebih memastikan izin anda telah diterima</h5>
                            <h3>{{date('Y:m:d')}} / 
                            @if(request('jam1') && request('jam2'))
                                {{request('jam1')}} - {{request('jam2')}}
                            @endif
                            </h3>
                            <img style="margin-top: -70px;margin-bottom: -70px;" src="{{ asset('vendor/images/media/su.png') }}"><br>
                            <a href="/siikma" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                @else
                    <div class="row" style="margin-top: 30px;margin-bottom: 50px;">
                        <div class="col-md-12 text-center">
                            <h3>Izin Gagal Terinput</h3>
                            <h3>{{date('Y:m:d')}}</h3>
                            <img style="margin-top: -70px;margin-bottom: -70px;" src="{{ asset('vendor/images/media/er.png') }}"><br>
                            <a href="/siikma" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                @endif
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


    </x-HomeLayout>
	
