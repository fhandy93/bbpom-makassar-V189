<x-HomeLayout>
	<!--app-content open-->
	<div class="main-content app-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">ADAJA</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Adaja</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Absen</li>
                        </ol>
                    </div>	
                </div>
                <!-- PAGE-HEADER END -->
                <!-- ROW OPEN -->
                <div class="row">
                                  @if (session() -> has('success'))
						<div class="card-body text-center" id="success"> 
							<span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
							<h4 class="h4 mb-0 mt-3">Sukses</h4>
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
                    <div class="col-lg-2 col-md-2"></div>
                    	<div class="col-lg-8 col-md-8">
                    	    <button id="checkLocationBtn" type="button" class="btn btn-primary show_confirm" onclick="checkLocation()">
                                <i class="fa fa-check me-2"></i><span id="btnText">Cek Lokasi</span>
                            </button><p>
                                <ul>
                                    <li>
                                        <span class="text-warning">- Check In hanya dapat dilakukan pada pukul 10.30 s.d 11.30 !</span><br>
                                        <span class="text-warning">- Check Out hanya dapat dilakukan pada pukul 13.30 s.d 14.30 !</span><br>
                                        <span class="text-warning">- Lokasi Check In/Check Out hanya dapat dilakukan pada radius Kota Makassar, Sebagian Kab. Maros dan sebagian Kab. Gowa !</span><br>
                                    </li>    
                                </ul>
                               
                    	    <form id="signupForm" method="post" class="form-horizontal" action="/adastore">
                                @csrf
                                 <input type="text" id="lan" name="lan" hidden>
                                        <input type="text" id="lat" name="lat" hidden>
                                <!--<div class="form-row">-->
                                <!--    <div class="form-group col-xl-12 mb-12 ">-->
                                <!--        <label class="form-label">Lokasi Terkini</label>-->
                                <!--        <input type="text" id="lan" name="lan" hidden>-->
                                <!--        <input type="text" id="lat" name="lat" hidden>-->
                                <!--    <div id="mapholder"></div>-->
                                   
                                <!--        <input type="button" id="loc" class="btn btn-primary" onclick="getLocation();" value="Get Location"/>-->
                                    
                                <!--    </div>-->
                                <!--</div>-->
                    	</div>
                </div>
				<div class="row">	
					<div class="col-lg-2 col-md-2"></div>
					<div class="col-lg-8 col-md-8">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">ADAJA</h3>
							</div>
							<div class="card-body">	
                               <div class="form-row">
									<div class="form-group col-xl-12 mb-12 ">
                                        <div id="my_camera" style=" width: 100%;margin: auto;margin-left:-50px;display: block;"></div>
                                        <div id="results" ></div>
									</div>
                                    <input type=button class="btn btn-primary" value="Ambil Gambar" onClick="take_snapshot()">
                                    <input type="hidden" name="image" class="image-tag">
								</div>
                                <div class="form-row">
									<div class="form-group col-xl-12 mb-12 ">
                                        <label class="form-label">Jenis Absen</label>
                                        <select name="jenis" class="form-control form-select select2" data-bs-placeholder="Select mounth" >          
                                            <option value=1>Check In</option>
                                            <option value=2>Check Out</option>
										</select>
									</div>
								</div>                           
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" style="width:150px;">Kirim Absen</button>
                                </div>
							</form><!-- End Multi Columns Form -->
							</div>
						</div>
                        @if(checkPermission(['superadmin','ktu']))
                        <a href="/adajav"><button type="button" class="btn btn-primary">Laporan Absensi ADAJA</button></a>
                        @endif
                        <a href="/log"><button type="button" class="btn btn-primary">Log Absensi</button></a>
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

    <!-- Jquery Webcam -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <script language="JavaScript">
    setTimeout(function() {
			document.getElementById('success').style.display = 'none';
		}, 4000); // <-- time in milliseconds
	setTimeout(function() {
			document.getElementById('unsuccess').style.display = 'none';
		}, 4000); // <-- time in milliseconds
    Webcam.set({
        width: 380,
        height: 280,
        image_format: 'jpeg',
        jpeg_quality: 90,
        dest_width: 380,
        dest_height: 280,
    });
    
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" style="transform: rotate(0deg); border:0; top:0px; left:0px; bottom:0px; right:0px; width:280px; height:380px;"/>';
            document.getElementById('my_camera').style.display = 'none';
        } );
    }
    var x = document.getElementById("demo");
    var lan = document.getElementById("lan");
    var lat = document.getElementById("lat");
         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latlongvalue = position.coords.latitude + ","
                              + position.coords.longitude;
            var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlongvalue+"&zoom=16&size=750x500&markers="+latlongvalue+"&key=AIzaSyBEhznriNnQ-tR1xx3bCax6Nv348pQ-0Qk";
            document.getElementById("mapholder").innerHTML =
            "<img src ='"+img_url+"'>";
          
            document.getElementById("lan").value = position.coords.longitude;
            document.getElementById("lat").value = position.coords.latitude;
         }
         function errorHandler(err) {
            if(err.code == 1) {
               alert("Error: Access is denied!");
            }else if( err.code == 2) {
               alert("Error: Position is unavailable!");
            }
         }
         function getLocation(){
            if(navigator.geolocation){
               // timeout at 60000 milliseconds (60 seconds)
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition
               (showLocation, errorHandler, options);
               document.getElementById('loc').style.display = 'none';
            }else{
               alert("Sorry, browser does not support geolocation!");
            }
         }
 function checkLocation() {
        let btn = document.getElementById("checkLocationBtn");
        let btnText = document.getElementById("btnText");

        // Ubah tombol jadi loading
        btn.disabled = true;
        btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span> Mengecek lokasi...`;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                let lat2 = position.coords.latitude;
                let lon2 = position.coords.longitude;
                  document.getElementById("lan").value = position.coords.longitude;
                document.getElementById("lat").value = position.coords.latitude;
                setTimeout(() => {  // Simulasi loading selama 1 detik
                    if ((lat2 > 5.34) || (lat2 < 4.88) || (lon2 < 119.37) || (lon2 > 119.72)) {
                        alert("✅ Lokasi valid! Anda berada di dalam area.");
                    } else {
                        alert("❌ Lokasi Anda berada di luar area yang diizinkan!");
                    }
                    
                    // Kembalikan tombol ke keadaan awal
                    btn.innerHTML = `<i class="fa fa-check me-2"></i><span id="btnText">Check Lokasi</span>`;
                    btn.disabled = false;
                }, 1000);

            }, function(error) {
                setTimeout(() => {
                    alert("⚠️ Gagal mendapatkan lokasi. Pastikan izin lokasi diaktifkan.");
                    
                    btn.innerHTML = `<i class="fa fa-check me-2"></i><span id="btnText">Check Lokasi</span>`;
                    btn.disabled = false;
                }, 1000);
            });
        } else {
            alert("❌ Browser Anda tidak mendukung Geolocation.");
            
            btn.innerHTML = `<i class="fa fa-check me-2"></i><span id="btnText">Check Lokasi</span>`;
            btn.disabled = false;
        }
    }
		
</script>
    </x-HomeLayout>
	
      