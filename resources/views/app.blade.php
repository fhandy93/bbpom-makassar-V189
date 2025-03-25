<x-WelcomeLayout>
    <!-- wrapper -->
    <div id="wrapper">
        <!-- content    -->
        <div class="content">
           
          

              <!-- section  -->
           <section>
                <div class="container">
                    <div class="section-title sect_dec">
                        <h2>Aplikasi BBPOM Di Makassar</h2>
                    </div>
                    <div class="row">
                        @if(isset($data))
                            <!--   row-->
                            <div class="row">

                                @foreach($data as $item)
                                <!--   file-item-->
                                <div class="col-md-3">
                                    <div class="det-box">
                                        <a href="{{$item->link}}" class="det-box-media" style="background-color: #B6B7C2;">{{$item->name}}
                                        </a>
                                        <div class="det-box-ietm dbig dbi_shop fl-wrap">
                                            <h3><a href="{{$item->link}}"><img style="height: 90px;" src="{{ $item->image }}" alt="" class="respimg" ></a></h3>
                                            
                                        
                                            <div class="grid-item_price fl-wrap">
                                            <h3 style="text-align: center;">{{$item->desc}}</h3>
                                                <!-- <div class="add_cart"><a target="_new" href="{{$item->file}}"><i class="fal fa-link" style="color: white;"></i> <span style="color: white;">Open</span></a></div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--   file-item end-->
                                @endforeach
                            
                            </div>
                            <!--  row end-->
                        
                      
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