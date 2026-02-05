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
                                @if($data->status==1)
                                bg-secondary
                                @elseif($data->status==2)
                                bg-info
                                @elseif($data->status==3)
                                bg-danger
                                @elseif($data->status==4)
                                bg-warning
                                @elseif($data->status==5)
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
                                                    <td>: <span class="badge rounded-pill bg-secondary">Data Terkirim</span></td>
                                                    @elseif($data -> status == 2)
                                                    <td>: <span class="badge rounded-pill bg-info">Izin Diterima</span></td>
                                                    @elseif($data -> status == 3)
                                                    <td>: <span class="badge rounded-pill bg-danger">Izin Ditolak</span></td>
                                                    @elseif($data -> status == 4)
                                                    <td>: <span class="badge rounded-pill bg-warning">Izin Expired</span></td>
                                                    @elseif($data -> status == 5)
                                                    <td>: <span class="badge rounded-pill bg-success">Izin Selesai</span></td>
                                                    @endif

                                            </tr>
                                           
                                        </tbody>
                                    </table><p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-status card-status-left 
                                    @if($data->status==1)
                                    bg-secondary
                                    @elseif($data->status==2)
                                    bg-info
                                    @elseif($data->status==3)
                                    bg-danger
                                    @elseif($data->status==4)
                                    bg-warning
                                    @elseif($data->status==5)
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
                                                <td>: {{$data->jam}}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Keperluan</td>
                                                <td>: {{$data->keperluan}}</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Pemberi Izin</td>
                                                <td>: {{$data->pemberi}}</td>
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
                                                <td>Lokasi Kembali</td>
                                                <td>: <img src="https://maps.googleapis.com/maps/api/staticmap?center={{$data->lat}}, {{$data->lon}}&zoom=16&size=750x500&markers={{$data->lat}}, {{$data->lon}}&key=AIzaSyBEhznriNnQ-tR1xx3bCax6Nv348pQ-0Qk"></td>
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
                                @if($data -> status == 2 && $data ->user_id == Auth::user()->id)
                                <!-- <a href="/akhiri-izin/{{$data ->id}}" class="btn btn-primary my-3 show_confirm">Akhiri Izin</a> -->
                                <form id="signupForm" method="post" class="form-horizontal show_confirm" action="/akhiri-izin/{{$data ->id}}">
                                @csrf
                                        <input type="text" id="lan" name="lan" hidden>
                                        <input type="text" id="lat" name="lat" hidden>
                                        <button type="submit" class="btn btn-primary " ><i class="fa fa-check me-2"></i>Selesaikan Izin</input>
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
    
    var x = document.getElementById("demo");
    var lan = document.getElementById("lan");
    var lat = document.getElementById("lat");
         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latlongvalue = position.coords.latitude + ","
                              + position.coords.longitude;
            var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlongvalue+"&zoom=16&size=750x500&markers="+latlongvalue+"&key=AIzaSyBEhznriNnQ-tR1xx3bCax6Nv348pQ-0Qk";
            // document.getElementById("mapholder").innerHTML =
            // "<img src ='"+img_url+"'>";
          
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
         
         $(window).on('load', function() {
            if(navigator.geolocation){
               // timeout at 60000 milliseconds (60 seconds)
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition
               (showLocation, errorHandler, options);
               document.getElementById('loc').style.display = 'none';
            }else{
               alert("Sorry, browser does not support geolocation!");
            }
         });




         $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Anda yakin ingin mengakhiri izin ini ?`,
            text: "Pastikan lokasi anda berada DALAM WILAYAH KANTOR, Waktu dan Lokasi saat ini akan tercatat sebagai waktu anda kembali dari izin anda.",
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
	
