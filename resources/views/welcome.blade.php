<x-WelcomeLayout>
    <!-- wrapper -->
    <div id="wrapper">
        <!-- content    -->
        <div class="content">
            <!-- hero-slider-wrap     -->
            <div class="hero-slider-wrap fl-wrap">
                <!-- hero-slider-container     -->
                <div class="hero-slider-container multi-slider fl-wrap full-height">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <?php $count = 0; ?>
                        @foreach ($posts['post'] as $item)
                            <?php if($count == 0 or  $count == 1 or  $count == 2 or  $count == 3) {  ?>
                            <!-- swiper-slide -->
                            <div class="swiper-slide">
                                <div class="bg-wrap">
                                    <div class="bg" data-bg="{{asset('storage/'.$item->cover) }}" data-swiper-parallax="40%"></div>
                                    <div class="overlay"></div>
                                </div>
                                <div class="hero-item fl-wrap">
                                    <div class="container">
                                        <a class="post-category-marker" href="/vc/{{$item->category->id}}">{{ $item->category->keywords }}</a>
                                        <div class="clearfix"></div>
                                        <h2><a href="{{ route('show', $item->slug) }}">{{Str::limit( $item->title, 70, $end='.......') }}</a></h2>
                                        <div class="clearfix"></div>
                                        <div class="author-link"><a href="/user/{{ $item->user->username }}/profile"><img src="{{asset($item->user->image) }}" alt="{{$item->keywords}}">  <span>{{ $item->user->name }}</span></a></div>
                                        <span class="post-date"><i class="far fa-clock"></i>  {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- swiper-slide  end   -->
                            <?php }$count++; ?>
                        @endforeach					
                        </div>
                    </div>
                    <div class="fs-slider_btn color-bg fs-slider-button-prev"><i class="fas fa-caret-left"></i></div>
                    <div class="fs-slider_btn color-bg fs-slider-button-next"><i class="fas fa-caret-right"></i></div>
                </div>
                <!-- hero-slider-container  end   -->
                <!-- hero-slider_controls-wrap   -->
                <div class="hero-slider_controls-wrap">
                    <div class="container">
                        <div class="hero-slider_controls-list multi-slider_control">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                <?php $count = 0; ?>
                                @foreach ($posts['post'] as $item)
                                    <?php if($count == 0 or  $count == 1 or  $count == 2 or  $count == 3) {  ?>
                                    <!-- swiper-slide  -->
                                    <div class="swiper-slide">
                                        <div class="hsc-list_item fl-wrap">
                                            <div class="hsc-list_item-media">
                                                <div class="bg-wrap">
                                                    <div class="bg" data-bg="{{asset('storage/'.$item->cover) }}"></div>
                                                </div>
                                            </div>
                                            <div class="hsc-list_item-content fl-wrap">
                                                <h4>{{Str::limit( $item->title, 30, $end='.......') }}</h4>
                                                <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- swiper-slide end   -->
                                    <?php }$count++; ?>	
                                @endforeach					
                                </div>
                            </div>
                        </div>
                        <div class="multi-pag"></div>
                    </div>
                </div>
                <!-- hero-slider_controls-wrap end  -->
                <div class="slider-progress-bar act-slider">
                    <span>
                        <svg class="circ" width="30" height="30">
                            <circle class="circ2" cx="15" cy="15" r="13" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none" />
                            <circle class="circ1" cx="15" cy="15" r="13" stroke="#e93314" stroke-width="2" fill="none" />
                        </svg>
                    </span>
                </div>
            </div>
            <!-- hero-slider-wrap  end   -->
            <!-- section   -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="main-container fl-wrap fix-container-init">
                                <div class="section-title">
                                    <h2>Berita Terbaru</h2>
                                    <h4>Jangan lewatkan berita tentang BBPOM Makassar</h4>
                                </div>
                                <div class="ajax-wrapper fl-wrap">
                                    <div class="ajax-inner fl-wrap">
                                        <div class="list-post-wrap">
                                        <?php $count = 0; ?>
                                        @foreach ($posts['post'] as $item)
                                        <?php if($count == 0 or  $count == 1) {}
                                        elseif($count == 2 or $count == 3 ){  ?>
                                            <!--list-post-->	
                                            <div class="list-post fl-wrap">
                                                <div class="list-post-media">
                                                    <a href="{{ route('show', $item->slug) }}">
                                                        <div class="bg-wrap">
                                                            <div class="bg" data-bg="{{asset('storage/'.$item->cover) }}"></div>
                                                        </div>
                                                    </a>
                                                    <span class="post-media_title">&copy; BBPOM Makassar</span>
                                                </div>
                                                <div class="list-post-content">
                                                    <a class="post-category-marker" href="/vc/{{$item->category->id}}">{{ $item->category->keywords }}</a>
                                                    <h3><a href="{{ route('show', $item->slug) }}">{{Str::limit( $item->title, 70, $end='.......') }}</a></h3>
                                                    <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                                                    <p>{!! Str::limit( $item->desc, 120, $end='.......') !!}</p>
                                                    <ul class="post-opt">
                                                        <li><i class="far fa-comments-alt"></i>{{ count($item->comment) }}</li>
                                                        <li><i class="fal fa-eye"></i>{{ count($item->view) }}</li>
                                                    </ul>
                                                    <div class="author-link"><a href="/user/{{ $item->user->username }}/profile"><img src="{{asset($item->user->image) }}" alt="{{$item->keywords}}">  <span>{{ $item->user->name }}</span></a></div>
                                                </div>
                                            </div>
                                            <!--list-post end-->
                                            <?php }$count++;  ?>
                                            @endforeach
                                            <a href="/all_news" class="dark-btn fl-wrap"> Tampilkan Semua Berita Terbaru </a><p>		
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="main-container fl-wrap fix-container-init" style="margin-top: 20px;">
                                <div class="clearfix"></div>
                                <div class="section-title sect_dec">
                                    <h2>Profile</h2>
                                    <h4>Balai Besar Pengawasan Obat dan Makanan di Makassar</h4>
                                </div>
                                <div class="grid-post-wrap">
                                    <div class="more-post-wrap  fl-wrap">
                                        <div class="list-post-wrap list-post-wrap_column fl-wrap">
                                            <div class="row">
                                            @foreach($posts['exten'] as $item)
                                                @if ($item->id == 1)
                                                <div class="col-md-6">
                                                    <!--list-post-->	
                                                    <div class="list-post fl-wrap">
                                                        <div class="list-post-media">
                                                            <a href="/show/{{$item->slug}}">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ asset('storage/'.$item->cover) }}"></div>
                                                                </div>
                                                            </a>
                                                            <span class="post-media_title">&copy; BBPOM Makassar</span>
                                                        </div>
                                                        <div class="list-post-content">
                                                            <h3><a href="/show/{{$item->slug}}">Latar Belakang</a></h3>
                                                            <span class="post-date"> {!! Str::limit( $item->desc, 200, $end='.......') !!}</span><p>
                                                            <i class="far fa-clock"></i>{{ Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
                                                        </div>
                                                    </div>
                                                    <!--list-post end-->						  
                                                </div>
                                                @endif
                                            @endforeach
                                            @foreach($posts['exten'] as $item)
                                                @if ($item->id == 2)
                                                <div class="col-md-6">
                                                    <!--list-post-->	
                                                    <div class="list-post fl-wrap">
                                                        <div class="list-post-media">
                                                            <a href="/show/{{$item->slug}}">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ asset('storage/'.$item->cover) }}"></div>
                                                                </div>
                                                            </a>
                                                            <span class="post-media_title">&copy; BBPOM Makassar</span>
                                                        </div>
                                                        <div class="list-post-content">
                                                            <h3><a href="/show/{{$item->slug}}">Visi Misi BBPOM Makassar</a></h3>
                                                            <span class="post-date"> {!! Str::limit( $item->desc, 200, $end='.......') !!}</span><p>
                                                            <i class="far fa-clock"></i>{{ Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
                                                        </div>
                                                    </div>
                                                    <!--list-post end-->						  
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>
                                            <div class="row">
                                            @foreach($posts['exten'] as $item)
                                                @if ($item->id == 3)
                                                <div class="col-md-6">
                                                    <!--list-post-->	
                                                    <div class="list-post fl-wrap">
                                                        <div class="list-post-media">
                                                            <a href="/show/{{$item->slug}}">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ asset('storage/'.$item->cover) }}"></div>
                                                                </div>
                                                            </a>
                                                            <span class="post-media_title">&copy; BBPOM Makassar</span>
                                                        </div>
                                                        <div class="list-post-content">
                                                            <h3><a href="/show/{{$item->slug}}">Tugas Pokok</a></h3>
                                                            <span class="post-date"> {!! Str::limit( $item->desc, 200, $end='.......') !!}</span><p>
                                                            <i class="far fa-clock"></i>{{ Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
                                                        </div>
                                                    </div>
                                                    <!--list-post end-->						  
                                                </div>
                                                @endif
                                            @endforeach
                                            @foreach($posts['exten'] as $item)
                                                @if ($item->id == 4)
                                                <div class="col-md-6">
                                                    <!--list-post-->	
                                                    <div class="list-post fl-wrap">
                                                        <div class="list-post-media">
                                                            <a href="/show/{{$item->slug}}">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ asset('storage/'.$item->cover) }}"></div>
                                                                </div>
                                                            </a>
                                                            <span class="post-media_title">&copy; BBPOM Makassar</span>
                                                        </div>
                                                        <div class="list-post-content">
                                                            <h3><a href="/show/{{$item->slug}}">Struktur Organisasi</a></h3>
                                                            <span class="post-date"> {!! Str::limit( $item->desc, 200, $end='.......') !!}</span><p>
                                                            <i class="far fa-clock"></i>{{ Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
                                                        </div>
                                                    </div>
                                                    <!--list-post end-->						  
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- New news -->
                                    
                                    <!-- end -->
                                    <!--grid-post-item-->
                                    <div class="single-grid-slider-wrap fl-wrap">
                                        <div class="single-grid-slider">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <!-- swiper-slide-->  
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item  bold_gpi  fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg" data-bg="{{ asset('vendor/frontimages/media/layanan.png') }}"></div>
                                                                <div class="grid-post-media_title">
                                                                    <a class="post-category-marker" target="new" href="https://drive.google.com/file/d/1hBduyu-sMib8UmUIhki17Np7fXKTTZ4Q/view?usp=sharing">Standar Pelayanan</a>
                                                                    <h4><a href="https://drive.google.com/file/d/1hBduyu-sMib8UmUIhki17Np7fXKTTZ4Q/view?usp=sharing" target="new">Standar Pelayanan BBPOM Di Makassar</a></h4>
                                                                    <span class="video-date"><i class="far fa-home"></i> Balai Besar POM di Makassar</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                     <!-- swiper-slide-->  
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item  bold_gpi  fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg" data-bg="{{ asset('vendor/frontimages/media/SIPTP3.png') }}"></div>
                                                                <div class="grid-post-media_title">
                                                                    <a class="post-category-marker" target="new" href="https://drive.google.com/file/d/1_8cC677C_QKXig-K_j0RRbEdZSvfNf2J/view?usp=sharing">SIPT</a>
                                                                    <h4><a href="https://drive.google.com/file/d/1_8cC677C_QKXig-K_j0RRbEdZSvfNf2J/view?usp=sharing" target="new">Standar Pelayanan Portal SIPT Pihak Ke-3</a></h4>
                                                                    <span class="video-date"><i class="far fa-home"></i> Balai Besar POM di Makassar</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                      <!-- swiper-slide-->  
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item  bold_gpi  fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg" data-bg="{{ asset('vendor/frontimages/media/maklumat.png') }}"></div>
                                                                <div class="grid-post-media_title">
                                                                    <a class="post-category-marker" target="new" href="https://drive.google.com/file/d/1-7LAqc5Vaz-0BZzll70sAWyMYUuZtuBT/view">Maklumat</a>
                                                                    <h4><a href="https://drive.google.com/file/d/1-7LAqc5Vaz-0BZzll70sAWyMYUuZtuBT/view" target="new">MAKLUMAT PELAYANAN BALAI BESAR POM DI MAKASSAR</a></h4>
                                                                    <span class="video-date"><i class="far fa-home"></i> Balai Besar POM di Makassar</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                    <!-- swiper-slide-->  
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item  bold_gpi  fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg" data-bg="{{ asset('vendor/frontimages/media/sipt.png') }}"></div>
                                                                <div class="grid-post-media_title">
                                                                    <a class="post-category-marker" target="new" href="https://makassar.pom.go.id/frame/layanan/555">SIPT</a>
                                                                    <h4><a href="post-single.html">SISTEM INFORMASI PELAYANAN TERPADU (SIPT)</a></h4>
                                                                    <span class="video-date"><i class="far fa-home"></i> Balai Besar POM di Makassar</span>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                  									
                                                							
                                                </div>
                                                <div class="sgs-pagination sgs_ver "></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- sidebar   -->
                            <div class="sidebar-content fl-wrap fix-bar">
                                 <!-- box-widget -->
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <!-- content-tabs-wrap -->
                                        <div class="content-tabs-wrap tabs-act tabs-widget fl-wrap">
                                            <div class="content-tabs fl-wrap">
                                                <ul class="tabs-menu fl-wrap no-list-style">
                                                    <li class="current"><a href="#tab-popular"> Alur Pelayanan </a></li>
                                                    <li><a href="#tab-resent">Standar BPOM</a></li>
                                                </ul>
                                            </div>
                                            <!--tabs -->                       
                                            <div class="tabs-container">
                                                <!--tab -->
                                                <div class="tab">
                                                    <div id="tab-popular" class="tab-content first-tab">
                                                        <div class="post-widget-container fl-wrap">
                                                            <!-- post-widget-item -->
                                                            <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/16PprXe3fPayTLivf08FgbzCyGft0dnv2/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://drive.google.com/file/d/16PprXe3fPayTLivf08FgbzCyGft0dnv2/view" target="_new">ALUR PELAYANAN PENGUJIAN</a></h4>
                                                                  
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->
                                                            <!-- post-widget-item -->
                                                            <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/1ebhDCkuDbEOio_ZumNR2uZmTm6Dj-nEI/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://drive.google.com/file/d/1ebhDCkuDbEOio_ZumNR2uZmTm6Dj-nEI/view" target="_new">ALUR PELAYANAN ULPK</a></h4>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->														
                                                            <!-- post-widget-item -->
                                                            <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/1jxVwBElM6lasHQVqU7HFStEUmIXXdnvZ/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://drive.google.com/file/d/1jxVwBElM6lasHQVqU7HFStEUmIXXdnvZ/view" target="_new">ALUR PELAYANAN SKI</a></h4>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->			
                                                             <!-- post-widget-item -->
                                                             <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/1_pZRIF3_g_xaZYU58-CCpj74hnyYsuF8/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://drive.google.com/file/d/1_pZRIF3_g_xaZYU58-CCpj74hnyYsuF8/view" target="_new">ALUR PELAYANAN SKE</a></h4>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->																						
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--tab  end-->
                                                <!--tab -->
                                                <div class="tab">
                                                    <div id="tab-resent" class="tab-content">
                                                        <div class="post-widget-container fl-wrap">
                                                             <!-- post-widget-item -->
                                                            <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/1y8WBm_0UjMImfy9_coke8m9z3exRpdEz/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://bbpom-makassar.com//storage/standar-pelayanan/Standar Pelayanan Publik 2024.pdf" target="_new">Standar Pelayanan Publik 2024</a></h4>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->	
                                                             <!-- post-widget-item -->
                                                            <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/1y8WBm_0UjMImfy9_coke8m9z3exRpdEz/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://bbpom-makassar.com//storage/standar-pelayanan/Standar Pelayanan Publik 2023.pdf" target="_new">Standar Pelayanan Publik 2023</a></h4>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->	
                                                            <!-- post-widget-item -->
                                                            <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/1CYVEFUhN8bi8Bk1IqHpLUvoWIXsnMikj/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://drive.google.com/file/d/1CYVEFUhN8bi8Bk1IqHpLUvoWIXsnMikj/view" target="_new">Standar Pelayanan Publik 2022</a></h4>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->	
                                                            <!-- post-widget-item -->
                                                            <div class="post-widget-item fl-wrap">
                                                                <div class="post-widget-item-media">
                                                                    <a href="https://drive.google.com/file/d/1y8WBm_0UjMImfy9_coke8m9z3exRpdEz/view" target="_new"><img src="{{ asset('vendor/images/brand/logo5.png') }}"  alt=""></a>
                                                                </div>
                                                                <div class="post-widget-item-content">
                                                                    <h4><a href="https://drive.google.com/file/d/1y8WBm_0UjMImfy9_coke8m9z3exRpdEz/view" target="_new">STANDAR BIAYA PELAYANAN 2022</a></h4>
                                                                   
                                                                </div>
                                                            </div>
                                                            <!-- post-widget-item end -->														
                                                            													
                                                          										
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--tab end-->							
                                            </div>
                                            <!--tabs end-->  
                                        </div>
                                        <!-- content-tabs-wrap end -->
                                    </div>
                                </div>
                                <!-- box-widget  end -->
                                <!-- box-widget -->
                                <!--<div class="box-widget fl-wrap">-->
                                <!--    <div class="widget-title">BBPOM Makassar Aplikasi</div>-->
                                <!--    <div class="box-widget-content">-->
                                <!--       <div class="social-widget">-->
                                <!--            <a href="/sinonim" target="_blank" class="">-->
                                <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/PPNPN202.jpg') }}"></i>-->
                                <!--            </a>-->
                                <!--            <a href="/siikma" target="_blank" class="twitter-soc">-->
                                <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/SIIKMA.png') }}"></i>                                            -->
                                <!--            </a> -->
                                <!--            <a href="/siyapp" target="_blank" class="youtube-soc">-->
                                <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Siyapp.jpg') }}"></i>                                            -->
                                <!--            </a>                                                -->
                                <!--            <a href="/ulpk" target="_blank" class="instagram-soc">-->
                                <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Seppulo.jpg') }}"></i>                                           -->
                                <!--            </a>-->
                                <!--             <a href="/sudoku" target="_blank" class="instagram-soc">-->
                                <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/sudoku.png') }}"></i>                                           -->
                                <!--            </a>-->
                                <!--             <a href="/smile" target="_blank" class="instagram-soc">-->
                                <!--            <img style="margin-left: 0px;width: 100px;" src="{{ asset('vendor/images/media/Smile.png') }}"></i>                                           -->
                                <!--            </a>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!-- box-widget  end -->
                                <!-- box-widget -->
                                <div class="box-widget fl-wrap">
                                    <div class="widget-title">Aplikasi Publik BPOM</div>
                                    <div class="box-widget-content">
                                        <div class="social-widget">
                                            <a href="https://lpse.pom.go.id/eproc4" target="_blank" class="">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/lpse.jpg') }}"></i>
                                            </a>
                                            <a href="https://e-bpom.pom.go.id/" target="_blank" class="twitter-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/ebpom.png') }}"></i>											
                                            </a> 
                                            <a href="https://www.lapor.go.id/" target="_blank" class="youtube-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/lapor-logo.png') }}"></i>											
                                            </a> 												
                                            <a href="https://notifkos.pom.go.id/" target="_blank" class="instagram-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/notifikasi.jpg') }}"></i>											
                                            </a> 												
                                            <a href="https://e-sertifikasi.pom.go.id/" target="_blank" class="">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/e-sertifikasi.png') }}"></i>
                                            </a>
                                            <a href="https://infalabs.pom.go.id/" target="_blank" class="twitter-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/infalabs.png') }}"></i>											
                                            </a> 
                                            <a href="https://ppid.pom.go.id/" target="_blank" class="youtube-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/ppid.jpg') }}"></i>											
                                            </a> 												
                                            <a href="https://rb.pom.go.id/" target="_blank" class="instagram-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/rb.jpg') }}"></i>											
                                            </a> 	
                                            <a href="https://ecd.pom.go.id/" target="_blank" class="youtube-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/logo-ecd.png') }}"></i>											
                                            </a> 												
                                            <a href="https://qms.pom.go.id/" target="_blank" class="instagram-soc">
                                            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/frontimages/media/qms.jpg') }}"></i>											
                                            </a> 														
                                        </div>
                                    </div>
                                </div>
                                <!-- box-widget  end -->						
                                 <!-- box-widget -->
                                <div class="box-widget fl-wrap">
                                    <div class="widget-title">Popular Tags</div>
                                    <div class="box-widget-content">
                                        <div class="tags-widget">
                                            @foreach($posts['tag'] as $tag)
                                            <a href="/vt/{{ $tag -> keywords }}">{{ $tag -> name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- box-widget  end -->						
                               					
                                <!-- box-widget -->
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="single-grid-slider slider_widget">
                                           
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <!-- swiper-slide-->  
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item     fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ asset('vendor/frontimages/media/ebpom-min.png') }}"></div>
                                                                    <div class="overlay"></div>
                                                                </div>
                                                                <div class="grid-post-media_title">
                                                                    <a class="post-category-marker" href="https://www.pom.go.id/new/view/direct/cc" target="new">e-BPOM</a>
                                                                    <h4><a href="post-single.html"> PERIZINAN SKI EKSPOR</a></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                    <!-- swiper-slide-->  
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item     fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ asset('vendor/frontimages/media/halopom.png') }}"></div>
                                                                    <div class="overlay"></div>
                                                                </div>
                                                                <div class="grid-post-media_title">
                                                                    <a class="post-category-marker" href="https://www.pom.go.id/new/view/direct/cc" target="new">HALO POM</a>
                                                                    <h4><a href="post-single.html">Contact Center Badan POM</a></h4>
                                                                    <span class="video-date"><i class="far fa-phone"></i>+6281 21 9999 533</span>
                                                                    <ul class="post-opt">
                                                                        <li><i class="fal fa-envelope "></i>halobpom@pom.go.id</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->
                                                    <!-- swiper-slide-->  
                                                    <div class="swiper-slide">
                                                        <div class="grid-post-item  bold_gpi  fl-wrap">
                                                            <div class="grid-post-media gpm_sing">
                                                                <div class="bg-wrap">
                                                                    <div class="bg" data-bg="{{ asset('vendor/frontimages/media/ceklik.png') }}"></div>
                                                                    <div class="overlay"></div>
                                                                </div>
                                                                <div class="grid-post-media_title">
                                                                    <a class="post-category-marker" href="https://cekbpom.pom.go.id/" target="new">CEKLIK BPOM</a>
                                                                    <h4><a href="post-single.html">Cek Produk Badan Pengawas Obat dan Makanan RI</a></h4>
                                                                    <span class="video-date"><i class="far fa-search "></i> Cari Produk</span>
                                                                    <ul class="post-opt">
                                                                        <li><i class="far fa-home"></i>Sarana</li>
                                                                        <li><i class="fal fa-link"></i>  Link </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- swiper-slide end-->									                                      
                                                </div>
                                                <div class="sgs-pagination sgs_hor "></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- box-widget  end -->					
                            </div>
                            <!-- sidebar  end -->
                        </div>
                    </div>
                    <div class="limit-box fl-wrap"></div>
                </div>
            </section>
            <!-- section end -->
            
            <!-- section   -->
            <section class="dark-bg no-bottom-padding">
                <div class="container">
                    <div class="main-video-wrap fl-wrap">
                        <div class="video-main-cont">
                            <div class="video-section-title fl-wrap">
                                <h2>BBPOM di Makassar Video</h2>
                                <h4>Stay up-to-date</h4>
                                <a href="https://www.youtube.com/channel/UCxdQ3ws5vzdPLlcfp5DClJw" target="new">View On Youtube <i class="fas fa-caret-right"></i></a>
                            </div>
                            <a class="video-holder vh-main fl-wrap  image-popup"  href="#">
                                <div class="bg"></div>
                                <div class="overlay"></div>
                                <div class="big_prom"> <i class="fas fa-play"></i></div>
                            </a>
                            <div class="video-holder-title fl-wrap">
                                <div class="video-holder-title_item"><a target="new" href="#"></a></div>
                                <span class="video-date"><i class="far fa-video"></i> <strong></strong></span>
                                <a class="post-category-marker" target="new" href="#"></a>
                            </div>
                            <div class="vh-preloader"></div>
                        </div>
                        <!-- video-links-wrap   -->
                        <div class="video-links-wrap">
                            <!-- video-item  -->
                            <div class="video-item video-item_active fl-wrap" data-url="https://youtu.be/6l4TPu9kiWA?si=yIbPtblKETz8epAo" data-video-link="https://youtu.be/6l4TPu9kiWA?si=yIbPtblKETz8epAo">
                                <div class="video-item-img fl-wrap">
                                    <img src="{{ asset('vendor/frontimages/all/1.jpg') }}" class="respimg" alt="">
                                    <div class="play-icon"><i class="fas fa-play"></i></div>
                                </div>
                                <div class="video-item-title">
                                    <h4>Profile BBPOM di Makassar</h4>
                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                </div>
                                <a class="post-category-marker" target="new" href="https://www.youtube.com/watch?v=28h2NCH0Mjk&t=2s">Open On Youtube</a>
                            </div>
                            <!--video-item end   -->
                               <!-- video-item  -->
                            <div class="video-item fl-wrap" data-url="https://youtu.be/2JBetmTdGRU?si=tQtobB0Piyq1a2W4" data-video-link="https://youtu.be/2JBetmTdGRU?si=tQtobB0Piyq1a2W4">
                                <div class="video-item-img fl-wrap">
                                    <img src="{{ asset('vendor/frontimages/all/deklar.png') }}" class="respimg" alt="">
                                    <div class="play-icon"><i class="fas fa-play"></i></div>
                                </div>
                                <div class="video-item-title">
                                    <h4>Deklarasi dan Peluncuran Pengembangan Inovasi</h4>
                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                </div>
                                <a class="post-category-marker" target="new" href="https://youtu.be/2JBetmTdGRU?si=tQtobB0Piyq1a2W4">Open On Youtube</a>
                            </div>
                            <!--video-item end   -->
                            <!-- video-item  -->
                            <div class="video-item fl-wrap" data-url="https://youtu.be/WMi0lVCG-lk?si=d4H3rpnQEMzLprzm" data-video-link="https://youtu.be/WMi0lVCG-lk?si=d4H3rpnQEMzLprzm">
                                <div class="video-item-img fl-wrap">
                                    <img src="{{ asset('vendor/frontimages/all/nari.png') }}" class="respimg" alt="">
                                    <div class="play-icon"><i class="fas fa-play"></i></div>
                                </div>
                                <div class="video-item-title">
                                    <h4>Tari Kreasi Kontemporer BBPOM Makassar</h4>
                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                </div>
                                <a class="post-category-marker" target="new" href="https://youtu.be/WMi0lVCG-lk?si=d4H3rpnQEMzLprzm">Open On Youtube</a>
                            </div>
                            <!--video-item end   -->									
                            <!-- video-item  -->
                            <div class="video-item fl-wrap" data-url="https://youtu.be/JEKdMN0z7zc" data-video-link="https://youtu.be/JEKdMN0z7zc">
                                <div class="video-item-img fl-wrap">
                                    <img src="{{ asset('vendor/frontimages/all/3.jpg') }}" class="respimg" alt="">
                                    <div class="play-icon"><i class="fas fa-play"></i></div>
                                </div>
                                <div class="video-item-title">
                                    <h4>Pelayanan Publik 06 2022 BBPOM MAKASSAR</h4>
                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                </div>
                                <a class="post-category-marker" target="new" href="https://youtu.be/JEKdMN0z7zc">Open On Youtube</a>
                            </div>
                            <!--video-item end   -->	
                         									
                        </div>
                        <!-- video-links-wrap end   -->
                    </div>
                </div>
                <div class="video_carousel-wrap fl-wrap">
                    <div class="container">
                        <div class="video_carousel-container">
                            <div class="video_carousel_title">
                                <h4>Popular Videos</h4>
                                <div class="vc-pagination pag-style"></div>
                            </div>
                            <!-- fw-carousel  -->
                            <div class="video_carousel  lightgallery">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!-- swiper-slide-->  
                                        <div class="swiper-slide">
                                            <!-- video-item  -->
                                            <div class="video-item fl-wrap">
                                                <div class="video-item-img fl-wrap">
                                                    <img src="{{ asset('vendor/frontimages/all/wbbm.png') }}" class="respimg" alt="">
                                                    <a class="play-icon image-popup" href="https://youtu.be/2W7YVM4mD70?si=gH0U--d_RSyX2oXX"><i class="fas fa-play"></i></a>
                                                </div>
                                                <div class="video-item-title">
                                                    <h4><a href="https://youtu.be/2W7YVM4mD70?si=gH0U--d_RSyX2oXX" target="new">DEKLARASI WBBM DAN MANTAPPOL</a></h4>
                                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                                </div>
                                                <a class="post-category-marker" target="new" href="https://youtu.be/2W7YVM4mD70?si=gH0U--d_RSyX2oXX">Open On Youtube</a>
                                            </div>
                                            <!--video-item end   -->
                                        </div>
                                        <!-- swiper-slide end-->  
                                        <!-- swiper-slide-->  
                                        <div class="swiper-slide">
                                            <!-- video-item  -->
                                            <div class="video-item fl-wrap">
                                                <div class="video-item-img fl-wrap">
                                                    <img src="{{ asset('vendor/frontimages/all/hut.png') }}" class="respimg" alt="">
                                                    <a class="play-icon image-popup" href="https://youtu.be/IgydSZVVsTo?si=nUY2XqhlBQrKpJyi"><i class="fas fa-play"></i></a>
                                                </div>
                                                <div class="video-item-title">
                                                    <h4><a href="https://youtu.be/IgydSZVVsTo?si=nUY2XqhlBQrKpJyi">Lomba HUT RI Ke-79 BBPOM di Makassar</a></h4>
                                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                                </div>
                                                <a class="post-category-marker" target="new" href="https://youtu.be/IgydSZVVsTo?si=nUY2XqhlBQrKpJyi">Open On Youtube</a>
                                            </div>
                                            <!--video-item end   -->
                                        </div>
                                        <!-- swiper-slide end-->  									
                                        <!-- swiper-slide-->  
                                        <div class="swiper-slide">
                                            <!-- video-item  -->
                                            <div class="video-item fl-wrap">
                                                <div class="video-item-img fl-wrap">
                                                    <img src="{{ asset('vendor/frontimages/all/duta.png') }}" class="respimg" alt="">
                                                    <a class="play-icon image-popup" href="https://youtu.be/PZdU66B_ncc"><i class="fas fa-play"></i></a>
                                                </div>
                                                <div class="video-item-title">
                                                    <h4><a href="post-single2.html">Video Duta Kosmetik Badan POM RI</a></h4>
                                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                                </div>
                                                <a class="post-category-marker" target="new" href="https://youtu.be/PZdU66B_ncc">Open On Youtube</a>
                                            </div>
                                            <!--video-item end   -->
                                        </div>
                                        <!-- swiper-slide end-->  									
                                        <!-- swiper-slide-->  
                                        <div class="swiper-slide">
                                            <!-- video-item  -->
                                            <div class="video-item fl-wrap">
                                                <div class="video-item-img fl-wrap">
                                                    <img src="{{ asset('vendor/frontimages/all/rmdn.png') }}" class="respimg" alt="">
                                                    <a class="play-icon image-popup" href="https://youtu.be/fWo_9NX4vtA?si=GDtWwOgkgXSBwXYa"><i class="fas fa-play"></i></a>
                                                </div>
                                                <div class="video-item-title">
                                                    <h4><a href="https://youtu.be/fWo_9NX4vtA?si=GDtWwOgkgXSBwXYa" target="new">Pengawasan BBPOM di Makassar Selama Bulan Ramadan</a></h4>
                                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                                </div>
                                                <a class="post-category-marker" target="new" href="https://youtu.be/fWo_9NX4vtA?si=GDtWwOgkgXSBwXYa">Open On Youtube</a>
                                            </div>
                                            <!--video-item end   -->
                                        </div>
                                        <!-- swiper-slide end-->  	
                                         <!-- swiper-slide-->  
                                        <div class="swiper-slide">
                                            <!-- video-item  -->
                                            <div class="video-item fl-wrap">
                                                <div class="video-item-img fl-wrap">
                                                    <img src="{{ asset('vendor/frontimages/all/beuty.png') }}" class="respimg" alt="">
                                                    <a class="play-icon image-popup" href="https://youtu.be/m3Za2mi1e-0?si=nRjqQkFrcv_OQ-PH"><i class="fas fa-play"></i></a>
                                                </div>
                                                <div class="video-item-title">
                                                    <h4><a href="https://youtu.be/m3Za2mi1e-0?si=nRjqQkFrcv_OQ-PH" target="new">Beauty Entusiast - BBPOM di Makassar</a></h4>
                                                    <span class="video-date"><i class="far fa-video"></i> <strong>Bbpom Makassar</strong></span>
                                                </div>
                                                <a class="post-category-marker" target="new" href="https://youtu.be/m3Za2mi1e-0?si=nRjqQkFrcv_OQ-PH">Open On Youtube</a>
                                            </div>
                                            <!--video-item end   -->
                                        </div>
                                        <!-- swiper-slide end-->  	
                                    </div>
                                </div>
                            </div>
                            <!-- fw-carousel end -->								
                            <div class="cc-prev cc_btn"><i class="fas fa-caret-left"></i></div>
                            <div class="cc-next cc_btn"><i class="fas fa-caret-right"></i></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end -->
            <!-- section  -->
            <section>
                <div class="container">
                    <div class="section-title sect_dec">
                        <h2>Berita Populer</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="list-post-wrap list-post-wrap_column list-post-wrap_column_fw">
                                <!--list-post-->	
                                <div class="list-post fl-wrap">
                                    <a class="post-category-marker" href="/vc/{{$posts['top']->category->id}}">{{$posts['top']->category->keywords}}</a>
                                    <div class="list-post-media">
                                        <a href="post-single.html">
                                            <div class="bg-wrap">
                                                <div class="bg" data-bg="{{asset('storage/'.$posts['top']->cover) }}"></div>
                                            </div>
                                        </a>
                                        <span class="post-media_title">&copy; BBPOM Makassar</span>
                                    </div>
                                    <div class="list-post-content">
                                        <h3><a href="post-single.html">{{Str::limit( $posts['top']->title, 50, $end='.......') }}</a></h3>
                                        <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($posts['top']->created_at)->diffForHumans()}}</span>
                                        <p>{!! Str::limit( $posts['top']->desc, 150, $end='.......') !!}</p>
                                        <ul class="post-opt">
                                            <li><i class="far fa-comments-alt"></i> {{ count($posts['top']->comment)}} </li>
                                            <li><i class="fal fa-eye"></i>{{ count($posts['top']->view)}}</li>
                                        </ul>
                                        <div class="author-link"><a href="/user/{{ $posts['top']->user->username }}/profile"><img src="{{asset($posts['top']->user->image) }}" alt="">  <span>{{ $posts['top']->user->name }}</span></a></div>
                                    </div>
                                </div>
                                <!--list-post end-->			
                            </div>
                            <a href="/populer" class="dark-btn fl-wrap"> Tampilkan Semua Berita Populer </a>
                        </div>
                        <div class="col-md-7">
                            <div class="picker-wrap-container fl-wrap">
                                <div class="picker-wrap-controls">
                                    <ul class="fl-wrap">
                                        <li><span class="pwc_up"><i class="fas fa-caret-up"></i></span></li>
                                        <li><span class="pwc_pause"><i class="fas fa-pause"></i></span></li>
                                        <li><span class="pwc_down"><i class="fas fa-caret-down"></i></span></li>
                                    </ul>
                                </div>
                                <div class="picker-wrap fl-wrap">
                                    <div class="list-post-wrap  fl-wrap">
                                        @foreach($posts['populer'] as $pop)
                                        <!--list-post-->	
                                        <div class="list-post fl-wrap">
                                            <div class="list-post-media">
                                                <a href="{{ route('show', $pop->slug) }}">
                                                    <div class="bg-wrap">
                                                        <div class="bg" data-bg="{{asset('storage/'.$pop->cover) }}"></div>
                                                    </div>
                                                </a>
                                                <span class="post-media_title">&copy;  BBPOM Makassar</span>
                                            </div>
                                            <div class="list-post-content">
                                                <a class="post-category-marker" href="/vc/{{$pop->category->id}}">{{ $pop->category->keywords }}</a>
                                                <h3><a href="{{ route('show', $pop->slug) }}">{{Str::limit( $pop->title, 50, $end='.......') }}</a></h3>
                                                <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($pop->created_at)->diffForHumans()}}</span>
                                                <p>{!! Str::limit( $pop->desc, 100, $end='.......') !!}</p>
                                                <ul class="post-opt">
                                                    <li><i class="far fa-comments-alt"></i>{{ count($pop->comment) }}</li>
                                                    <li><i class="fal fa-eye"></i>{{ count($pop->view) }}</li>
                                                </ul>
                                                <div class="author-link"><a href="/user/{{ $pop->user->username }}/profile"><img src="{{asset($pop->user->image) }}" alt="{{$pop->keywords}}">  <span>{{$pop->user->name}}</span></a></div>
                                            </div>
                                        </div>
                                        <!--list-post end-->
                                       @endforeach
                                    </div>
                                </div>
                                <div class="controls-limit fl-wrap"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="limit-box"></div>
            </section>
            <!-- section end -->
            
           <!-- section -->
            <section class="no-padding" >
                <div class="fs-carousel-wrap" >
                    <div class="fs-carousel-wrap_title"  >
                        <div class="fs-carousel-wrap_title-wrap fl-wrap">
                            <h4>Struktur Organisasi</h4>
                            <h5>Balai Besar Pengawas Obat dan Makanan di Makassar</h5>
                        </div>
                        <div class="abs_bg"></div>
                       
                    </div>
                    <div class="fs-carousel fl-wrap">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- swiper-slide-->  
                                <div class="swiper-slide" >
                                    <div class="grid-post-item  bold_gpi  fl-wrap" >
                                       
                                    </div>
                                </div>
                                <!-- swiper-slide end-->
                            
                                <!-- swiper-slide-->  
                                <div class="swiper-slide">
                                    <div class="grid-post-item  bold_gpi  fl-wrap">
                                        <div class="grid-post-media gpm_sing">
                                            <div class="bg" data-bg="{{ asset('vendor/frontimages/employ/kabalai2.jpg') }}"></div>
                                            <div class="grid-post-media_title">
                                                <a class="post-category-marker" >Dra. Hariani, Apt</a>
                                                <h4><a>Kepala Balai Besar POM di Makassar</a></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- swiper-slide end-->
                               <!-- swiper-slide-->  
                               <div class="swiper-slide">
                                    <div class="grid-post-item  bold_gpi  fl-wrap">
                                        <div class="grid-post-media gpm_sing">
                                            <div class="bg" data-bg="{{ asset('vendor/frontimages/employ/KTU2.jpg') }}"></div>
                                            <div class="grid-post-media_title">
                                                <a class="post-category-marker" >Andi Amirah Nilawati, S.Si, Apt, M.HSM</a>
                                                <h4><a>Kepala Bagian Tata Usaha Balai Besar POM di Makassar</a></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- swiper-slide end-->
                                  
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section end -->
            
            <!-- section  -->
            <div class="gray-bg ad-wrap fl-wrap">
                <div class="content-banner-wrap">
                  
                </div>
            </div>
            <!-- section end -->
        </div>
        <!-- content  end-->
        <!-- footer -->
        <x-FootherNav></x-FootherNav>
        
    </div>
    <!-- wrapper end -->
</x-WelcomeLayout>