<x-WelcomeLayout>
<!-- wrapper -->
<div id="wrapper">
    <!-- content    -->
    <div class="content">
        <div class="breadcrumbs-header fl-wrap">
            <div class="container">
                <div class="breadcrumbs-header_url">
                    <a href="#">Home</a><span>{{$post['tag-title']}}</span>
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
                        <div class="section-title">
                            <h2>{{$post['tag-title']}}
                            </h2>
                            <h4>Jangan lewatkan berita tentang BBPOM Makassar</h4>
                        </div>
                        <div class="list-post-wrap">
                            @foreach($post['post'] as $item )
                            <!--list-post-->	
                            <div class="list-post fl-wrap">
                                <div class="list-post-media">
                                    <a href="{{ route('show', $item->slug) }}">
                                        <div class="bg-wrap">
                                            <div class="bg" data-bg="{{asset('storage/'.$item->cover) }}"></div>
                                        </div>
                                    </a>
                                    <span class="post-media_title">&copy; BBPOM Di Makassar</span>
                                </div>
                                <div class="list-post-content">
                                    <a class="post-category-marker" href="/vc/{{$item->id}}">{{$item->category->keywords}}</a>
                                    <h3><a href="{{ route('show', $item->slug) }}">{{Str::limit( $item->title, 70, $end='.......') }}</a></h3>
                                    <span class="post-date"><i class="far fa-clock"></i> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                                    <p>{!! Str::limit( $item->desc, 150, $end='.......') !!}</p>
                                    <ul class="post-opt">
                                        <li><i class="far fa-comments-alt"></i> {{ count($item->comment) }} </li>
                                        <li><i class="fal fa-eye"></i>{{ count($item->view) }}</li>
                                    </ul>
                                    <div class="author-link"><a href="/user/{{ $item->user->username }}/profile"><img src="{{asset($item->user->image) }}" alt="">  <span>{{ $item->user->name }}</span></a></div>
                                </div>
                            </div>
                            <!--list-post end-->
                            @endforeach		
                        </div>
                        <div class="clearfix"></div>
                        <!--pagination-->
                        {{ $post['post']->withQueryString()->links('pagination::semantic-ui') }}
                        <!--pagination end-->	
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
                            <!--            <a href="/sinonim" target="_blank" class="">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/PPNPN202.jpg') }}"></i>-->
                            <!--            </a>-->
                            <!--            <a href="/siikma" target="_blank" class="twitter-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/SIIKMA.png') }}"></i>											-->
                            <!--            </a> -->
                            <!--            <a href="/siyapp" target="_blank" class="youtube-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Siyapp.jpg') }}"></i>											-->
                            <!--            </a> 												-->
                            <!--            <a href="/ulpk" target="_blank" class="instagram-soc">-->
                            <!--            <img style="margin-left: 0px;width: 150px;" src="{{ asset('vendor/images/media/Seppulo.jpg') }}"></i>											-->
                            <!--            </a> 		-->
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

