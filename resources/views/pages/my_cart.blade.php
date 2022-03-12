<section class="container pt-3 list_cart">
    <div class="row m-0 border rounded mb-2">
        <div class="col-md-4 d-flex px-2 card-body">
            <div class="form-check my-auto">
                <input class="form-check-input position-static" type="checkbox" id="checkAllCart" value="option1" aria-label="...">
            </div>
            <div>
                <span>Sản phẩm</span>
            </div>
        </div>
        <div class="col-md-8 card-body text-center">
            <div class="row">
                <div class="col-3">
                    <span>Đơn giá</span>
                </div>
                <div class="col-3">
                    <span>Số lượng</span>
                </div>
                <div class="col-3">
                    <span>Số tiền</span>
                </div>
                <div class="col-3">
                    <span>Thao tác</span>
                </div>
            </div>
        </div>
    </div>
    <?php $i = 0; ?>

    @foreach($product as $val)
        <?php $i++; ?>
        <div class="card mb-1 w-100 py-3 px-2">
            <div class="row no-gutters d-flex">
                <div class="col-md-4 d-flex">
                    <div class="form-check my-auto">
                        <input class="form-check-input position-static checkCloneCart" type="checkbox" id="blankCheckbox"
                               value="option1" aria-label="...">
                    </div>
                    <img src="{{ asset("/upload/images/testUp/".$val->more_detail[0]->images)}}" alt="...">
                    <h5 class="card-title pl-2">{{$val->title}}</h5>
                </div>
                <div class="col-md-8">
                    <div class="card-body row text-center">
                        <div class="col-md-3">
                            @if($val->sale != null)
                                @foreach($val->more_detail as $key => $more)
                                    <p class="@if($key > 0)d-none @endif">
                                        <del class="text-secondary">{{$more->price}} <sup>đ</sup></del> <span class="text-danger">{{($more->price*$val->sale)/100}} <sup>đ</sup></span><br>
                                        <span class="text-primary">Giảm {{$val->sale}}%</span> <br>
                                    </p>
                                @endforeach

                            @else
                                @foreach($val->more_detail as $key => $more)
                                    <span class="text-danger @if($key > 0)d-none @endif" data-price="{{$more->price}}">{{$more->price}} <sup>đ</sup></span>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group cart_btnG_SL{{$i}}" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-secondary cart_remove">-</button>
                                <input type="text" value="{{$val->count}}" class="w-100">
                                <button type="button" class="btn btn-secondary cart_add">+</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @foreach($val->more_detail as $key => $more)
                                <span class="text-danger @if($key > 0)d-none @endif">{{$more->price*$val->count}} <sup>đ</sup></span>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control" name="cart_type">
                                    <?php
                                        foreach ($val->more_detail as $more){
                                            $list_size = explode(',', $more->size);
                                            foreach ($list_size as $size){
                                    ?>
                                        <option value="{{$more->id}}">{{$more->type." - ".$size}}</option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="w-100 border rounded position-sticky bt-0 container bg-white">
        <div class="row">
            <div class="col-sm-12 col-md-7">

            </div>
            <div class="col-sm-12 col-md-5 d-flex py-2 pointer">
                <div class="">
                    <img height="24px" src="{{ asset("/upload/images/coupon.png")}}" alt="">
                    Sale3S Voucher
                </div>
                <div class="ml-auto pr-2 text-primary">Chọn Hoặc Nhập Mã</div>
            </div>
        </div>
        <hr class="my-1">
        <div class="ml-auto d-flex px-2">
            <div class="form-check my-auto">
                <input class="form-check-input position-static" type="checkbox" id="checkAllCartBt" value="option1" aria-label="...">
                <label for="checkAllCartBt" class="d-inline-block px-1">Chọn tất cả (<span></span>)</label>
                <span class="pointer text-danger">Xóa</span>
            </div>
            <div class="ml-auto">
                <h5 class="text-dark btn">Tổng thanh toán (<span> </span> sản phẩm): <span class="text-danger">100000$</span></h5>
                <a class="btn btn-danger px-4" href="/san-pham/thanh-toan">Mua Hàng</a>
            </div>
        </div>
    </div>
</section>

