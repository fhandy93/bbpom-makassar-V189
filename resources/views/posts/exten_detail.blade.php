<x-WelcomeLayout>
<!-- wrapper -->
<div id="wrapper">
    <!-- content    -->
    <div class="content">
        <div class="breadcrumbs-header fl-wrap">
            <div class="container">
                <div class="breadcrumbs-header_url">
                    <a href="#">Home</a><span>Profile</span>
                </div>
                <div class="scroll-down-wrap">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                    <span>Scroll Down To Discover</span>
                </div>
            </div>
            <div class="pwh_bg"></div>
        </div>
        <!--section   -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-container fl-wrap fix-container-init">
                            <!-- single-post-header  -->
                            <div class="single-post-header fl-wrap">
                                
                                <div class="clearfix"></div>
                                <h1>{{ $post['post']->title }}</h1>
                                <div class="clearfix"></div>
                                <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($post['post']->created_at)->isoFormat('D MMMM Y'); }}</span>
                            </div>
                            <!-- single-post-header end   -->
                            <!-- single-post-media   -->
                            <div class="single-post-media fl-wrap">
                                <div class="single-slider-wrap fl-wrap">
                                    <div class="single-slider fl-wrap">
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper lightgallery">
                                                <!-- swiper-slide   -->
                                                <div class="swiper-slide hov_zoom">
                                                    <img src="{{ asset('storage/'.$post['post']->cover) }}" alt="">
                                                    <a href="{{ asset('storage/'.$post['post']->cover) }}" class="box-media-zoom   popup-image"><i class="fas fa-search"></i></a>
                                                    <span class="post-media_title pmd_vis">©BBPOM Di Makassar</span>
                                                </div>
                                                <!-- swiper-slide end   -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ss-slider-controls2">
                                        <div class="ss-slider-pagination pag-style"></div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- single-post-media end   -->
                            <!-- single-post-content   -->
                            <div class="single-post-content spc_column fl-wrap">
                                <div class="single-post-content_column">
                                    <div class="share-holder ver-share fl-wrap">
                                        <div class="share-title">Share This <br> Article:</div>
                                        <div class="share-container  isShare"></div>
                                    </div>
                                </div>
                                <div class="fs-wrap smpar fl-wrap">
                                    <div class="fontSize"><span class="fs_title">Font size: </span><input type="text" class="rage-slider" data-step="1" data-min="12" data-max="15" value="12"></div>
                                    
                                    <a class="print-btn" href="javascript:window.print()" data-microtip-position="bottom"><span>Print</span><i class="fal fa-print"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="single-post-content_text" style="text-align: left;" id="font_chage">
                                    <p class="has-drop-cap" style="text-align: left;">{!! $post['post']->desc !!}</p>
                                </div>
                            </div>
                            <!-- single-post-content  end   -->
                            <div class="limit-box2 fl-wrap"></div>			  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- sidebar   -->
                        <div class="sidebar-content fl-wrap fixed-bar">
                            <!-- box-widget -->
                            <div class="box-widget fl-wrap">
                                <div class="box-widget-content">
                                    <div class="search-widget fl-wrap">
                                        <form action="/search" method="get">
                                            @csrf
                                            <input name="search" id="se12" type="text" class="search" placeholder="Search..." value="" />
                                            <button class="search-submit2" id="submit_btn12"><i class="far fa-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- box-widget  end -->								
                            <!-- box-widget -->
                            <div class="box-widget fl-wrap">
                                    <div class="widget-title">Categories</div>
                                    <div class="box-widget-content">
                                        <ul class="cat-wid-list">
                                            @foreach ($post['category'] as $item)
                                            <li><a href="/vc/{{$item->id}}">{{$item-> keywords}}</a><span> ({{$item-> posts->count()}}) </span></li>
                                            @endforeach
                                        
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- box-widget  end -->
                                <!-- box-widget -->
                                <div class="box-widget fl-wrap">
                                    <div class="widget-title">Popular Tags</div>
                                    <div class="box-widget-content">
                                        <div class="tags-widget">
                                            @foreach($post['tag'] as $tag)
                                            <a href="/vt/{{ $tag -> keywords }}">{{ $tag -> name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- box-widget  end -->						
                             <!-- box-widget -->
                            <!-- <div class="box-widget fl-wrap">-->
                            <!--    <div class="widget-title">BBPOM Makassar Aplikasi</div>-->
                            <!--    <div class="box-widget-content">-->
                            <!--        <div class="social-widget">-->
                            <!--            <a href="/sinonim" class="">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/PPNPN202.jpg') }}"></i>-->
                            <!--            </a>-->
                            <!--            <a href="/sikama" class="twitter-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/sikama.png') }}"></i>											-->
                            <!--            </a> -->
                            <!--            <a href="/siyapp" class="youtube-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Siyapp.jpg') }}"></i>											-->
                            <!--            </a> 												-->
                            <!--            <a href="/ulpk" class="instagram-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Seppulo.jpg') }}"></i>											-->
                            <!--            </a> 														-->
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
                        </div>
                        <!-- sidebar  end -->
                    </div>
                </div>
                <div class="limit-box fl-wrap"></div>
            </div>
        </section>
        <!-- section end -->
        <!-- section  -->
        <div class="gray-bg ad-wrap fl-wrap">
            <div class="content-banner-wrap">
                <img src="images/all/banner.jpg" class="respimg" alt="">
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

