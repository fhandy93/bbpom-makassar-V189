<x-MainDashboard>
     <!-- breadcrumb-area-start -->
      <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="{{asset('vendor/img/breadcrumb/breadcrumb.png')}}">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="it-breadcrumb-content z-index-3 text-center">
                     <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">Survey Petugas Pelayanan</h3>
                     </div>
                     <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                           <span><a href="index.html">Survey</a></span>
                           <span class="dvdr">//</span>
                           <span>{{ $title }}</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb-area-end -->

       <!-- signup-area-start -->
       <div class="it-signup-area pt-120 pb-120">
         <div class="container">
            <div class="it-signup-bg p-relative">
               <div class="it-signup-thumb d-none d-lg-block">
               <img src="{{asset('vendor/img/team/petugas.png')}}" alt="" id="pic">
               </div>
               <div class="row">
                  <div class="col-xl-6 col-lg-6">
                  @if (session() -> has('unsuccess'))
                     <div class="alert alert-danger" style="font-size: large;height: 100px;">
                        <strong>Gagal !</strong> {{ session() -> get('unsuccess')}}
                     </div>
                  @endif
                  <form id="signupForm" method="post"  action="/kirim-survey" >
                    <input type="text" name="skala" value="{{$skala}}" hidden>
                    @csrf
				         @method('post')		
                        <div class="it-signup-wrap">
                           <h4 class="it-signup-title">Form Survey Petugas</h4>
                           <div class="it-signup-input-wrap">
                            <div class="it-contact-input-box">
                                 <label>Nama Petugas</label>
                                 <div class="postbox__select">
                                    <select name="petugas" onchange="showDetail(this.value)">
                                       <option value="">Pilih ...</option>
                                       @foreach($petugas as $item)
                                       <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('petugas')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="it-contact-input-box">
                                 <label>Nama Surveyor</label>
                                 <div class="postbox__select">
                                    <select name="surveyor">
                                       <option value="">Pilih ...</option>
                                       @foreach($surveyor as $item)
                                       <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('surveyor')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="it-contact-input-box">
                                 <label>Kesigapan Petugas Dalam Memberikan Pelayanan</label>
                                 <div class="postbox__select">
                                    <select name="kesigapan">
                                       <option value="">Pilih ...</option>
                                       <option value="Cepat">Cepat</option>
                                       <option value="Kurang Cepat">Kurang Cepat</option>
                                    </select>
                                    @error('kesigapan')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="it-contact-input-box">
                                 <label>Sikap Petugas Dalam Memberikan Pelayanan</label>
                                 <div class="postbox__select">
                                    <select name="sikap">
                                       <option value="">Pilih ...</option>
                                       <option value="Profesional">Profesional</option>
                                       <option value="Tidak Profesional">Tidak Profesional</option>
                                    </select>
                                    @error('sikap')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="it-contact-input-box">
                                 <label>Penampilan Petugas Dalam Memberikan Pelayanan</label>
                                 <div class="postbox__select">
                                    <select name="tampilan">
                                       <option value="">Pilih ...</option>
                                       <option value="Rapi">Rapi</option>
                                       <option value="Tidak Rapi">Tidak Rapi</option>
                                    </select>
                                    @error('tampilan')
                                    <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="it-contact-input-box">
                                 <br>
                                 {!! NoCaptcha::display() !!}
                                 {!! NoCaptcha::renderJs() !!}
                                 @error('g-recaptcha-response')
                                 <span class="text-danger" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                              </div>


                            


                           </div>
                           <p>
                           <div class="it-signup-btn mb-40">
                              <button class="it-btn large" type="submit">Kirim Survey</button>
                           </div>
                           <div class="it-signup-text">
                              <span>Bantu kami dalam meningkatkan pelayanan dengan memberikan survey.</span>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
       </div>
      <!-- signup-area-end -->
</x-MainDashboard>

<script type="text/javascript">
    function showDetail(str1) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
	var obj = JSON.parse(this.responseText);
	var objLength = Object.keys(obj).length;

    document.getElementById("pic").src = obj.foto;
    
  }
  xhttp.open("GET", "showpic/"+str1);
  xhttp.send();
  
}

	</script>  