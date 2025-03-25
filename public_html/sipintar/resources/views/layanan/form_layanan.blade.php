<x-MainDashboard>
    <!-- breadcrumb-area-start -->
    <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="{{asset('vendor/img/breadcrumb/breadcrumb.png')}}">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="it-breadcrumb-content z-index-3 text-center">
                     <div class="it-breadcrumb-title-box"><br>
                        <h3 class="it-breadcrumb-title">{{$layanan}}</h3>
                     </div>
                     <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                           <span><a href="index.html">Layanan</a></span>
                           <span class="dvdr">//</span>
                           <span>{{$layanan}}</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb-area-end -->

      <!-- contact-area-start -->
      <div class="it-contact__area pt-120 pb-120">
         <div class="container">
            <div class="it-contact__wrap  z-index-3 p-relative">
                 @if (session() -> has('unsuccess'))
                     <div class="alert alert-danger" style="font-size: large;height: 100px;">
                        <strong>Gagal !</strong> {{ session() -> get('unsuccess')}}
                     </div>
                  @endif
               <div class="it-contact__shape-1 d-none d-xl-block">
                  <img src="assets/img/contact/shape-2-1.png" alt="">
               </div>
               <div class="row ">
                  <div class="col-xl-7">
                     <div class="it-contact__right-box">
                        <div class="it-contact__section-box pb-20">
                           <h4 class="it-contact__title pb-15">Ambil Foto</h4>
                           <p>Pastikan wajah terlihat dengan jelas, Pada saat pengambilan foto <br>
                              Jangan menggunakan aksesoris yang menutupi wajah.</p>
                        </div>
                        <form action="/input-layanan" method="post" enctype="multipart/form-data">
                        
                        <div class="it-contact__content mb-55" style="justify-content: center;text-align: center;">
                           <!-- <img src="https://bbpom-makassar.com/storage/images/blog/oZPex0KDRPYUjlXDSZgyIiF3wUEzm6d3W62HHFyR.jpg" alt="" style="width: 420px; height: 340px;"> -->
                           <center>
                           <div id="my_camera" style="width: 380px; height: 280px;display: block;"></div>
                           <div id="results" ></div>
                           </center>
                           <br><br>
                           <button type="button" class="it-btn" onClick="take_snapshot()">
                              <span>
                              Ambil Gambar
                                 <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                 <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                              </span>
                           </button>

                           <!--<input type=button class="btn btn-primary" value="Ambil Gambar" onClick="take_snapshot()">-->
                                    <input type="hidden" name="image" class="image-tag">

                        </div>
                        <label>Isian Captcha</label>
                      <div class="g-recaptcha" data-sitekey="6LcustspAAAAALh24hDG7Sosy9-2ZP49ylEva1uY"></div>
                              @error('g-recaptcha-response')
                              <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                        @csrf
                     </div>
                  </div>
                  <div class="col-xl-5">
                     <div class="it-contact__form-box">
                        <input type="text" value="{{ $layanan }}" name="layanan" hidden>
                        <div class="row">
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Nama</label>
                                 <input type="text" value="{{old('nama')}}" name="nama" placeholder="Nama">
                                 @error('nama')
                                    <span style="color: red;">Kolom Nama harus diisi</span>
                                 @enderror	
                              </div>
                           </div>
                           @if($layanan == "Layanan Sertifikasi")
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Jenis Sertifikasi</label>
                                 <div class="postbox__select">
                                    <select name="sertifikasi">
                                       <option>Pilih ...</option>
                                       <option value="Surat Keterangan Impor">Surat Keterangan Impor</option>
                                       <option value="Surat Keterangan Ekspor">Surat Keterangan Ekspor</option>
                                       <option value="CDOB">CDOB</option>
                                       <option value="CPOTB">CPOTB</option>
                                       <option value="CPKB">CPKB</option>
                                       <option value="Pemohon Notifikasi Kosmetik">Pemohon Notifikasi Kosmetik</option>
                                       <option value="IPCPPOB">IPCPPOB</option>
                                    </select>
                                    @error('umur')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           @endif
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Umur</label>
                                 <div class="postbox__select">
                                    <select name="umur">
                                       <option>Pilih ...</option>
                                       <option value="<25 Tahun"><25 Tahun</option>
                                       <option value="25-30 Tahun">25-30 Tahun</option>
                                       <option value="31-40 Tahun">31-40 Tahun</option>
                                       <option value="41-50 Tahun">41-50 Tahun</option>
                                       <option value="51-60 Tahun">51-60 Tahun</option>
                                       <option value=">60 Tahun">>60 Tahun</option>
                                    </select>
                                    @error('umur')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Jenis Kelamin</label>
                                 <div class="postbox__select">
                                    <select name="kelamin">
                                       <option>Pilih ...</option>
                                       <option value="Laki-Laki">Laki-Laki</option>
                                       <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('kelamin')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Nomor HP</label>
                                 <input type="text" value="{{old('hp')}}" name="hp" placeholder="Nomor HP">
                                 @error('hp')
                                    <span style="color: red;">Kolom Nomor HP harus diisi</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Email</label>
                                 <input type="email" value="{{old('email')}}" name="email" placeholder="Email">
                                 @error('email')
                                    <span style="color: red;">Kolom Email harus diisi</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">
                                 <label>Pekerjaan</label>
                                 <div class="postbox__select">
                                 <select name="pekerjaan">
                                    <option>Pilih ...</option>
                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Dosen/Peneliti">Dosen/Peneliti</option>
                                    <option value="Lainnya">Lainnya</option>
                                 </select>
                                 </div>
                              </div>
                           </div>

                           <div class="col-12 mb-25">
                              <div class="it-contact-input-box">

                              </div>
                              </div>
                           </div>


                         
                        
                        <button type="submit" class="it-btn">
                           <span>
                           Send Message
                              <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                 stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                 stroke-linecap="round" stroke-linejoin="round" />
                             </svg>
                        </span>
                        </button>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact-area-end -->

    
</x-MainDashboard>

    <!-- Jquery Webcam -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="<https://www.google.com/recaptcha/api.js>" async defer></script>
    <div class="g-recaptcha" data-sitekey="{{ env('6LcustspAAAAALh24hDG7Sosy9-2ZP49ylEva1uY') }}"></div>
    <!-- Google Recaptcha Widget-->
    <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>
    <script language="JavaScript">
   
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
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'" style="border:0; top:0px; left:0px; bottom:0px; right:0px; width:380px; height:280px;"/>';
            document.getElementById('my_camera').style.display = 'none';
        } );
    }

		
</script>