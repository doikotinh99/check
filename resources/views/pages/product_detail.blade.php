<?php
    $sum = 0;
    $vote1s = 0;
    $vote2s = 0;
    $vote3s = 0;
    $vote4s = 0;
    $vote5s = 0;
    foreach ($votes as $val){
        $sum += $val->vote;
    }

    if(count($votes) == 0){
        $voteT = 0;
    }else{
        $voteT = $sum/count($votes);
    }
?>
<section class="container pt-2 bg-light">
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div id="product_detail_img" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->more_detail as $key => $val)
                        <div class="carousel-item @if($key == 0) active @endif">
                            <img src="{{ asset("/upload/images/testUp/".$val->images)}}" alt="" class="w-100">
                        </div>
                    @endforeach
                </div>
               <button class="carousel-control-prev border-0 bg-gradient-light" type="button" data-target="#product_detail_img" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next border-0 bg-gradient-light" type="button" data-target="#product_detail_img" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
            <h2 class="text-danger h3 text-uppercase">{{$product->title}}</h2>
            <div class="mb-3">
                <span class="text-danger">{{round($voteT, 1)}} <i class="bi bi-star-fill"></i></span> |
                <span>{{count($votes)}} đánh giá</span> |
                <span>3k đã bán</span>
            </div>
            <p class="h3 mb-3">


                @if($product->sale != null)
                    <del>500$</del>
                    - <span class="text-danger">400$</span>
                    <small class="btn btn-danger p-0">{{$product->sale}}% giảm</small>
                @else
                    <span class="text-danger">{{$product->more_detail[0]->price }} <sup>đ</sup> - {{$product->more_detail[count($product->more_detail) - 1]->price}}<sup>đ</sup></span>
                @endif

            </p>
            <div class="row mb-3">
                <div class="col-2 py-1 d-flex align-items-center">
                    <p class="mb-0">Màu</p>
                </div>
                <div class="col-10">
                    @foreach($product->more_detail as $val)
                        <button type="button" class="btn btn-outline-danger p-1">{{$val->type}}</button>
                    @endforeach
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-2 py-1 d-flex align-items-center">
                    <p class="mb-0">Số lượng</p>
                </div>
                <div class="col-10">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown" id="prdDetail_count">
                        <button type="button" class="btn btn-outline-secondary cart_remove">-</button>
                        <input type="text" value="1" class="text-center" style="max-width: 79px" id="count_poduct">
                        <button type="button" class="btn btn-outline-secondary cart_add">+</button>
                      </div>
                </div>
            </div>
            <div>
                <button class="btn btn-outline-danger" id="btn_add_prdToCart" data-product="{{$product->id}}">Thêm vào giỏ hàng</button>
                <button class="btn btn-danger">Mua ngay</button>
            </div>
        </div>
    </div>
</section>

<section class="container mt-2 bg-light">
    <h3>Chi tiết sản phẩm</h3>
    <div class="row">
        <div class="col-2">
            Xuất sứ
        </div>
        <div class="col-10">
            {{$product->made}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            Chất liệu
        </div>
        <div class="col-10">
            {{$product->material}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            Kiểu dáng
        </div>
        <div class="col-10">
            @foreach($product->more_detail as $val)
                {{$val->type}} ,
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            Kho hàng
        </div>
        <div class="col-10">
            <?php
                $sum = 0;
                foreach ($product->more_detail as $val){
                    $sum += $val->count;
                }
                echo $sum;
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            Gửi từ
        </div>
        <div class="col-10">
            {{$product->location}}
        </div>
    </div>
    <h3>Mô tả sản phẩm</h3>
    <?php
        echo $product->description;
    ?>
</section>

<section class="container mt-2 bg-light">
    <h3>Đánh giá sản phẩm</h3>
    <div class="rating">
        <input type="radio" name="rating" value="5" id="5" checked>
        <label for="5">☆</label>
        <input type="radio" name="rating" value="4" id="4">
        <label for="4">☆</label>
        <input type="radio" name="rating" value="3" id="3">
        <label for="3">☆</label>
        <input type="radio" name="rating" value="2" id="2">
        <label for="2">☆</label>
        <input type="radio" name="rating" value="1" id="1">
        <label for="1">☆</label>
    </div>
    <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="voteP_comment"></textarea>
    </div>
    <div class="w-100 text-right">
        <button class="btn btn-primary" id="btn_voteP" data-product="{{$product->id}}">Đánh giá</button>
    </div>
    <hr>
    <div id="prd_voteBlock">
        @include('pages.vote_product')
    </div>
</section>
