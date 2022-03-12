<div class="best_sellers">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="section_title new_arrivals_title">
            <h2>Best Sellers</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="product_slider_container">
            <div class="owl-carousel owl-theme product_slider" id="product_slider">
              <!-- Slide 1 -->
                @foreach($best_sale as $val)
                    <div class="item">
                        <div class="product-item @foreach($val->more_detail as $moreVal){{$moreVal->category->slug." "}}@endforeach ">
                            <a href="/san-pham/detail/{{$val->id."-".$val->slug}}">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="{{ asset('upload/images/testUp/'.$val->more_detail[0]->images)}}" alt="">
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                    @if($val->sale != null)
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>{{$val->sale}}%</span></div>
                                    @endif

                                    <div class="product_info">
                                        <h6 class="product_name"><a href="#">{{$val->title}}</a></h6>
                                        @if($val->sale != null)
                                            <div class="product_price">{{$val->more_detail[0]->price - ($val->more_detail[0]->price*$val->sale)/100}} VNĐ<span> {{$val->more_detail[0]->price}} VNĐ</span></div>
                                        @else
                                            <div class="product_price">{{$val->more_detail[0]->price}} VNĐ</div>
                                        @endif

                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button" data-product="{{$val->id}}">Thêm vào giỏ hảng</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Slider Navigation -->
            <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </div>
            <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
