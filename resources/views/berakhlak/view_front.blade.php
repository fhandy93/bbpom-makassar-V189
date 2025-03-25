<x-WelcomeLayout>
    <!-- wrapper -->
    <div id="wrapper">
        <!-- content    -->
        <div class="content">
           
           <!-- section  -->
           <section>
                <div class="container">
                    <div class="section-title sect_dec">
                        <h2>Foto Kegiatan {{$menu}}</h2>
                    </div>
                    @if(isset($post['new_image']->judul))
                        <div class="row">
                            <div class="col-md-5">
                                <div class="list-post-wrap list-post-wrap_column list-post-wrap_column_fw">
                                    <!--list-post-->	
                                    <div class="list-post fl-wrap">
                                        <div class="list-post-media">
                                                <div class="bg-wrap">
                                                    <img class="bg" src="{{asset($post['new_image']->file) }}">
                                                </div>
                                            <span class="post-media_title">&copy; BBPOM Makassar</span>
                                        </div>
                                        <div class="list-post-content">
                                            <h3>{{Str::limit( $post['new_image']->judul, 50, $end='.......') }}</h3>
                                            <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($post['new_image']->created_at)->diffForHumans()}}</span>
                                            <p>{!! Str::limit( $post['new_image']->desk, 200, $end='.......') !!}</p>
                                        
                                            <div class="author-link"><a href="/user/{{ $post['new_image']->user->username }}/profile"><img src="{{asset($post['new_image']->user->image) }}" alt="">  <span>{{ $post['new_image']->user->name }}</span></a></div>
                                        </div>
                                    </div>
                                    <!--list-post end-->			
                                </div>
                                <a href="/view-foto/{{$menu2}}" class="dark-btn fl-wrap"> Tampilkan Semua Foto </a>
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
                                            @foreach($post['all_image'] as $pop)
                                        
                                            <div class="list-post fl-wrap">
                                                <div class="list-post-media">
                                                
                                                        <div class="bg-wrap">
                                                            <img class="bg" src="{{asset($pop->file) }}">
                                                        </div>
                                                    </a>
                                                    <span class="post-media_title">&copy;  BBPOM Makassar</span>
                                                </div>
                                                <div class="list-post-content">
                                                
                                                    <h3>{{Str::limit( $pop->judul, 30, $end='.......') }}</h3>
                                                    <span class="post-date"><i class="far fa-clock"></i>{{ Carbon\Carbon::parse($pop->created_at)->diffForHumans()}}</span>
                                                    <p>{!! Str::limit( $pop->desk, 100, $end='.......') !!}</p>
                                                    <ul class="post-opt">
                                                    
                                                    </ul>
                                                    <div class="author-link"><a href="/user/{{ $pop->user->username }}/profile"><img src="{{asset($pop->user->image) }}" alt="">  <span>{{$pop->user->name}}</span></a></div>
                                                </div>
                                            </div>
                                        
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="controls-limit fl-wrap"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="limit-box"></div>
            </section>
            <!-- section end -->

              <!-- section  -->
           <section>
                <div class="container">
                    <div class="section-title sect_dec">
                        <h2>Link Tentang {{$menu}}</h2>
                    </div>
                    <div class="row">
                        @if(isset($post['link']))
                            <!--   row-->
                            <div class="row">

                                @foreach($post['link'] as $item)
                                <!--   file-item-->
                                <div class="col-md-3">
                                    <div class="det-box">
                                        <a href="#" class="det-box-media" style="background-color: #B6B7C2;"><img src="{{ asset('vendor/images/brand/logo5.png') }}" alt="" class="respimg" style="width: 100px;">
                                        </a>
                                        <div class="det-box-ietm dbig dbi_shop fl-wrap">
                                            <h3><a href="#">{{$item->judul}}</a></h3>
                                            <p>{{$item->desk}}</p>
                                        
                                            <div class="grid-item_price fl-wrap">

                                                <div class="add_cart"><a target="_new" href="{{$item->file}}"><i class="fal fa-link" style="color: white;"></i> <span style="color: white;">Open</span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--   file-item end-->
                                @endforeach
                            
                            </div>
                            <!--  row end-->
                        
                        <p style="text-align: center;">
                            <!--pagination-->
                            {{ $post['file']->withQueryString()->links('pagination::semantic-ui') }}
                            <!--pagination end-->	
                        </p>
                        @endif
                    </div>
                </div>
                <div class="limit-box"></div>
            </section>
            <!-- section end -->
            
            @if(isset($post['all_video']))
                <!-- section   -->
                <section class="dark-bg no-bottom-padding">
                    <div class="container">
                        <div class="main-video-wrap fl-wrap">
                            <div class="video-main-cont">
                                <div class="video-section-title fl-wrap">
                                    <h2>Video Kegiatan {{$menu}}</h2>
                                    <h4>Stay up-to-date</h4>
                                    <a href="https://www.youtube.com/@AkuBerakhlak-bpom" target="new">View On Youtube <i class="fas fa-caret-right"></i></a>
                                </div>
                                @if(isset($post['new_video']))
                                    <iframe width="860" height="515" src="{{ $post['new_video']->file }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                @endif
                            </div>
                            @if(isset($post['new_video']))
                            <a href="/view-video/{{$menu2}}" class="dark-btn fl-wrap"> Tampilkan Semua Video </a>
                            @endif
                            <!-- video-links-wrap   -->
                            <div class="video-links-wrap">

                            @foreach($post['all_video'] as $item)
                                <!-- video-item  -->
                                <div class="video-item video-item_active fl-wrap" data-url="" data-video-link="">
                                <iframe width="360" height="215" src="{{$item->file}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    
                                </div>
                                <!--video-item end   -->
                            @endforeach
                                                                    
                            </div>
                            <!-- video-links-wrap end   -->
                        </div>
                    </div>
                <p>
                </section>
                <!-- section end -->
            @endif

            <!-- section  -->
           <section>
                <div class="container">
                    <div class="section-title sect_dec">
                        <h2>File Tentang {{$menu}}</h2>
                    </div>
                    <div class="row">
                    @if(isset($post['file']))
                        <!--   row-->
                        <div class="row">

                            @foreach($post['file'] as $item)
                            <!--   file-item-->
                            <div class="col-md-3">
                                <div class="det-box">
                                    <a href="#" class="det-box-media" style="background-color: #B6B7C2;"><img src="{{ asset('vendor/images/brand/logo5.png') }}" alt="" class="respimg" style="width: 100px;">
                                    </a>
                                    <div class="det-box-ietm dbig dbi_shop fl-wrap">
                                        <h3><a href="#">{{$item->judul}}</a></h3>
                                        <p>{{$item->desk}}</p>
                                      
                                        <div class="grid-item_price fl-wrap">

                                            <div class="add_cart"><a href="{{$item->file}}"><i class="fal fa-download" style="color: white;"></i> <span style="color: white;">Download</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--   file-item end-->
                            @endforeach
                           
                        </div>
                        <!--  row end-->
                        <p style="text-align: center;">
                            <!--pagination-->
                            {{ $post['file']->withQueryString()->links('pagination::semantic-ui') }}
                            <!--pagination end-->	
                        </p>
                    @endif
                    </div>
                </div>
                <div class="limit-box"></div>
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