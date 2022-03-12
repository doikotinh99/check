<div class="new_arrivals">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="section_title new_arrivals_title">
            <h2>{{$title_newArr}}</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col text-center">
          <div class="new_arrivals_sorting">
            <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tất cả</li>
              @isset($category_product)
                  @foreach ($category_product as $item)
                  <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter='.{{$item["slug"]}}'>{{$item["name"]}}</li>
                  @endforeach
              @endisset
              @empty($category_product)
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women's</li>
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li>
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">men's</li>
              @endempty
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
            <!-- Product 1 -->
              @foreach($product as $val)
                      <div class="product-item @foreach($val->more_detail as $moreVal){{$moreVal->category->slug." "}}@endforeach ">
                          <a href="/san-pham/detail/{{$val->id."-".$val->slug}}" class="d-block">
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
              @endforeach
          </div>
        </div>
      </div>
    </div>
</div>
