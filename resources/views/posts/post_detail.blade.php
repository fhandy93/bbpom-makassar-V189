<x-WelcomeLayout>
<!-- wrapper -->
<div id="wrapper">
    <!-- content    -->
    <div class="content">
        <div class="breadcrumbs-header fl-wrap">
            <div class="container">
                <div class="breadcrumbs-header_url">
                    <a href="#">Home</a><span>Detail Berita</span>
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
                                <a class="post-category-marker" href="/vc/{{$post['post']->category->id}}">{{ $post['post']->category->keywords }}</a>
                                <div class="clearfix"></div>
                                <h1>{{ $post['post']->title }}</h1>
                                
                                <div class="clearfix"></div>
                                <div class="author-link"><a href="/user/{{ $post['post']->user->username }}/profile"><img src="{{ $post['post']->user->image }}" alt="">  <span>{{ $post['post']->user->name }}</span></a></div>
                                <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($post['post']->created_at)->isoFormat('D MMMM Y'); }}</span>
                                <ul class="post-opt">
                                    <li><i class="fal fa-eye"></i> {{ count($post['post']->view) }} </li>
                                </ul>
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
                                                    <span class="post-media_title pmd_vis">© BBPOM Makassar</span>
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
                                <div class="single-post-content_text" id="font_chage">
                                    <p class="has-drop-cap">{!! $post['post']->desc !!}</p>
                                </div>
                                <div class="single-post-footer fl-wrap">
                                    <div class="post-single-tags">
                                        <span class="tags-title"><i class="fas fa-tag"></i> Tags : </span>
                                        <div class="tags-widget">
                                        @foreach ($post['post']->tags as $item)
                                        <a href="/vt/{{ $item -> keywords }}" class="tag">{{ $item->name }}</a>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- single-post-nav"   -->
                                <div class="single-post-nav fl-wrap">
                                    @if(isset($post['post1']))
                                    <a href="{{ route('show', $post['post1']->slug) }}" class="single-post-nav_prev spn_box">
                                        <div class="spn_box_img">
                                            <img src="{{ asset('storage/'.$post['post1']->cover) }}" class="respimg" alt="">
                                        </div>
                                        <div class="spn-box-content">
                                            <span class="spn-box-content_subtitle"><i class="fas fa-caret-left"></i> Prev Post</span>
                                            <span class="spn-box-content_title">{{Str::limit( $post['post1']->title, 60, $end='.......') }}</span>
                                        </div>
                                    </a>
                                    @endif
                                    @if(isset($post['post2']))
                                    <a href="{{ route('show', $post['post2']->slug) }}" class="single-post-nav_next spn_box">
                                        <div class="spn_box_img">
                                            <img src="{{ asset('storage/'.$post['post2']->cover) }}" class="respimg" alt="">
                                        </div>
                                        <div class="spn-box-content">
                                            <span class="spn-box-content_subtitle">Next Post <i class="fas fa-caret-right"></i></span>
                                            <span class="spn-box-content_title">{{Str::limit( $post['post2']->title, 60, $end='.......') }}</span>
                                        </div>
                                    </a>
                                    @endif
                                </div>
                                <!-- single-post-nav"  end   -->
                            </div>
                            <!-- single-post-content  end   -->
                            <div class="limit-box2 fl-wrap"></div>
                            <!-- post-author-->                                   
                            <div class="post-author fl-wrap">
                                <div class="author-img">
                                    <img  src="{{ $post['post']->user->image }}" alt="">	
                                </div>
                                <div class="author-content fl-wrap">
                                    <h5>Written By <a href="/user/{{ $post['post']->user->username }}/profile">{{ $post['post']->user->name }}</a></h5>
                                    <p>Balai Besar POM Di Makassar</p>
                                </div>
                                <div class="profile-card-footer fl-wrap">
                                    <a href="/user/{{ $post['post']->user->username }}/profile" class="post-author_link">View Profile <i class="fas fa-caret-right"></i></a>
                                    
                                </div>
                            </div>
                            <!--post-author end-->		
                            
                            <!--comments  -->
                            <div id="comments" class="single-post-comm fl-wrap">
                                <div class="pr-subtitle prs_big">Komentar <span>{{ count($post['post3']) }}</span></div>
                                
                                <ul class="commentlist clearafix">
                                    @foreach ($post['post3'] as $item3)
                                    <li class="comment">
                                        <div class="comment-author">
                                            <img alt="" src="{{ asset('vendor/images/brand/logo-2.png') }}" width="50" height="50">
                                        </div>
                                        <div class="comment-body smpar">
                                            <h4><a href="#">{{ $item3->nama }}</a></h4>
                                            <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                            <div class="clearfix"></div>
                                            <p>{{ $item3->comment }}</p>
                                            <div class="comment-meta"><i class="far fa-clock"></i> {{ Carbon\Carbon::parse($item3->created_at)->diffForHumans()}}</div>                                           
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                               
                                <div class="clearfix"></div>
                                <div id="addcom" class="clearafix">
                                    <div class="pr-subtitle"> Tinggalkan Komentar <i class="fas fa-caret-down"></i></div>
                                    <div class="comment-reply-form fl-wrap">
                                    <form method="post" class="add-comment custom-form" action="/comment" >
                                            @csrf
                                            @method('post')
                                            <fieldset>
                                                <div class="row">
                                                <input type="text" name="id" value="{{$post['post']->id}}" hidden />
                                                    <div class="col-md-6">
                                                        <input type="text" id="nama" name="nama" placeholder="Your Name *" value="{{old('nama')}}" @error('nama') style="border-color:red ;margin-bottom: 0px;" @enderror />
											            @error('nama')
                                                        <span style="color: red; "><i>{{ $message }}</i></span>
                                                        @enderror
                                                    </div>			
                                                    <div class="col-md-6">
                                                        <input type="text" id="email" name="email" placeholder="Email Address*" value="{{old('email')}}" @error('email') style="border-color:red ;margin-bottom: 0px;" @enderror/>
                                                        @error('email')
                                                        <span style="color: red; "><i>{{ $message }}</i></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div style=" margin-top: 20px;margin-bottom: 0px;">
                                                <textarea placeholder="Your Comment:" id="comment" name="comment"  @error('comment') style=" border-color:red ;"@enderror >{{old('comment')}}</textarea>
                                                @error('comment')
                                                <span style="color: red; "><i>{{ $message }}</i></span>
                                                @enderror
                                                </div>
                                               
                                            </fieldset>
                                             <div class="col-md-6" style="margin-top: 20px;">
                                                    {!! NoCaptcha::display() !!}
                                                    {!! NoCaptcha::renderJs() !!}
                                                    @error('g-recaptcha-response')
                                                    <span class="text-danger" role="alert" style="color: red; ">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            <div class="col-md-12" >
                                            <button class="btn float-btn color-btn">  Submit Comment <i class="fas fa-caret-right"></i> </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <!--end respond-->
                            </div>
                            <!--comments end -->					  
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
                            <!--            <a href="/siikma" class="twitter-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/SIIKMA.png') }}"></i>											-->
                            <!--            </a> -->
                            <!--            <a href="/siyapp" class="youtube-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Siyapp.jpg') }}"></i>											-->
                            <!--            </a> 												-->
                            <!--            <a href="/ulpk" class="instagram-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Seppulo.jpg') }}"></i>											-->
                            <!--            </a> -->
                            <!--            <a href="/sudoku" target="_blank" class="instagram-soc">-->
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

