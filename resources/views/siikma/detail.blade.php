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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SIIKMA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Izin</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
				<div class="row">
					<x-notify />
					<div class="col-lg-3 col-md-3"></div>
					<div class="col-lg-12 col-md-6">
                        <div class="table-responsive">
                            <div class="card">
                            <div class="card-status card-status-left 
                                @if($data->status==1)
                                bg-info
                                @elseif($data->status==2)
                                bg-success
                              
                                @endif
                                br-bs-7 br-ts-7">
                            </div>
                                <div class="card-header">
                                    <h3 class="card-title">Data Pemohon dan Status Izin</h3>
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
                                                <td>: {{$data->user->name}}</td>
                                            </tr>
                                           
                                            <tr>
                                                <td>2</td>
                                                <td>Status izin</td>

                                                @if($data -> status == 1)
                                                    <td>: <span class="badge rounded-pill bg-info">Data Terkirim</span></td>
                                                    @elseif($data -> status == 2)
                                                    <td>: <span class="badge rounded-pill bg-success">Izin Diterima</span></td>
                                                  
                                                    @endif

                                            </tr>
                                           
                                        </tbody>
                                    </table><p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-status card-status-left 
                                   @if($data->status==1)
                                    bg-info
                                    @elseif($data->status==2)
                                    bg-success
                                
                                    @endif
                                    br-bs-7 br-ts-7">
                                </div>
                                <div class="card-header">
                                    <h3 class="card-title">Detail Permohonan Izin</h3>
                                    <div class="card-options">
                                        <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0" style="width:30 px;">
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tanggal Izin</td>
                                                <td>: {{$data->tgl_izin}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Jam Izin</td>
                                                <td>: {{$data->jam1}} - {{$data->jam2}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Keperluan</td>
                                                <td>: {{$data->keperluan}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Bidang</td>
                                                <td>:   @if($data->bidang == 21)
                                                            Penindakan
                                                        @elseif($data->bidang == 18)  
                                                            Inspeksi Deputi 1
                                                        @elseif($data->bidang == 17)  
                                                            Infokom Non Pro PN
                                                        @elseif($data->bidang == 19)
                                                            Sertifikasi
                                                        @elseif($data->bidang == 20)
                                                            Pengujian Obat
                                                        @elseif($data->bidang == 12)
                                                            Tata Usaha
                                                        @elseif($data->bidang == 16)
                                                            Ketua TIM
                                                        @elseif($data->bidang==23)
                                                            SAKIP / NKA
                                                        @elseif($data->bidang==24)
                                                            Pengujian Pangan
                                                        @elseif($data->bidang==25)
                                                            Pengujian Kosmetik
                                                        @elseif($data->bidang==26)
                                                            Pengujian Mikro
                                                        @elseif($data->bidang==27)
                                                            Pengujian Obat Tradisional
                                                        @elseif($data->bidang==28)
                                                            Inspeksi Deputi 2
                                                        @elseif($data->bidang==29)
                                                            Inspeksi Deputi 3
                                                        @elseif($data->bidang==30)
                                                            Infokom Pro PN
                                                        @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Keterangan</td>
                                                <td>: {{$data->ket}}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Tanggal Input Izin</td>
                                                <td>: {{$data->created_at}}</td>
                                            </tr>
                                            @if($data->wktu_kembali)
                                            <tr>
                                                <td>7</td>
                                                <td>Tanggal/Jam Kembali</td>
                                                <td>: {{$data->wktu_kembali}}</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Jumlah jam izin</td>
                                                <td>: {{$data->jumlah}} </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Lokasi Kembali</td>
                                                <td>: {{$data->lat}}  {{$data->lon}} </td>
                                            </tr>
                                           @endif
                                        </tbody>
                                    </table><p>
                                </div>
                            </div> 
                        <p>
                    </div><p>
                    <table>
                            <tr>
                                <td>
                                @if($data -> status == 1 && $data ->user_id == Auth::user()->id)
                                <!-- <a href="/akhiri-izin/{{$data ->id}}" class="btn btn-primary my-3 show_confirm">Akhiri Izin</a> -->
                                <form id="signupForm" method="post" class="form-horizontal" action="/siikma/akhiri-izin/{{$data->id}}">
                                    @csrf
                                    <input type="text" id="lan" name="lan" hidden>
                                    <input type="text" id="lat" name="lat" hidden>
                                    <button id="checkLocationBtn" type="button" class="btn btn-primary show_confirm" onclick="checkLocation()">
                                        <i class="fa fa-check me-2"></i><span id="btnText">Selesaikan Izin</span>
                                    </button>
                                </form>
                               
                                @endif
                                </td>
                            </tr>
                        </table>
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
    
     let isSubmitting = false; // Mencegah submit ganda

    function checkLocation() {
        const btn = document.getElementById("checkLocationBtn");

        if (isSubmitting) return; // Hindari double click
        isSubmitting = true;

        btn.disabled = true;
        btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span> Mengecek lokasi...`;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                isiLokasiDanSubmit(lat, lon);
            }, function(error) {
                // Fallback: Gunakan lokasi dummy (Makassar)
                console.warn("Gagal dapat lokasi asli, gunakan dummy.");
                const dummyLat = -5.1661;
                const dummyLon = 119.4114;
                alert("⚠️ Gagal mendapatkan lokasi asli. Menggunakan data dummy.");

                isiLokasiDanSubmit(dummyLat, dummyLon);
            });
        } else {
            alert("❌ Browser tidak mendukung Geolocation. Menggunakan data dummy.");
            const dummyLat = -5.1661;
            const dummyLon = 119.4114;
            isiLokasiDanSubmit(dummyLat, dummyLon);
        }
    }

    function isiLokasiDanSubmit(lat, lon) {
        document.getElementById("lat").value = lat;
        document.getElementById("lan").value = lon;

        // Titik lokasi kantor yang akurat (misalnya BBPOM Makassar)
        const kantorLat = -5.1661;
        const kantorLon = 119.4114;

       
        
        const jarakMeter = getDistanceFromLatLonInMeters(lat, lon, kantorLat, kantorLon);

        if (jarakMeter <= 100) {
            alert("✅ Lokasi valid! Anda berada dalam radius 100 meter dari kantor.");
        } else {
            alert(`❌ Lokasi Anda berada di luar area yang diizinkan! Jarak Anda: ${Math.round(jarakMeter)} meter`);
        }

        document.getElementById("signupForm").submit();
    }

    function getDistanceFromLatLonInMeters(lat1, lon1, lat2, lon2) {
        const R = 6371000; // Radius bumi dalam meter
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLon = (lon2 - lon1) * Math.PI / 180;
        const a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * Math.PI / 180) *
            Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return R * c;
    }
    </script>  

    </x-HomeLayout>
	
