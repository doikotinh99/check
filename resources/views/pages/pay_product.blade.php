{{-- modal --}}
<!-- Button trigger modal -->
  <!-- Modal -->
<div class="modal fade" id="vouchemodal" tabindex="-1" aria-labelledby="vouchermodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="vouchemodalLabel">Chọn mã giảm giá</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập mã giả giá" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Áp dụng</button>
                </div>
            </div>
            <h5>Mã của bạn</h5>
            <hr class="mt-1">
            <?php for($i = 0; $i < 5; $i++){ ?>
            <div class="card mb-3 pointer-none list_voucher_payPrd" style="max-width: 540px;" data-id="{{$i}}" data-dismiss="modal">
                <div class="row no-gutters position-relative">
                  <div class="col-md-4">
                    <img class="w-100" src="{{ asset('/upload/images/banner_1.jpg')}}" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-0 pl-1">
                      <h5 class="card-title">Miễn phí ship</h5>
                      <p class="card-text">HSD: 31.12.2021</p>
                    </div>

                    <a href="/voucher/id" target="_blank" class="card-text position-absolute bt-0 right-0 p-2 text-primary"><small>Điều kiện</small></a>
                  </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="paymentmodal" tabindex="-1" aria-labelledby="paymentmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="vouchemodalLabel">Phương thức thanh toán</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pay" id="pay_old" value="">
                <label class="form-check-label" for="pay_old">
                  Thanh toán khi nhận hàng
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pay" id="pay_momo" value="">
                <label class="form-check-label" for="pay_momo">
                  Thanh toán momo
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pay" id="pay_paypal" value="">
                <label class="form-check-label" for="pay_paypal">
                    Thanh toán paypal
                </label>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>


{{-- end modal --}}

<section class="container py-3">
    <div class="border rounded pt-3 px-2" id="address_payment">
        <h5 class="text-danger"><i class="bi bi-geo-alt-fill"></i> Địa chỉ nhận hàng</h5>
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="custom-control custom-radio mb-3 <?php if($i != 2)echo "d-none" ?>" data-id="{{$i}}">
                <input type="radio" id="address_payment{{$i}}" data-id="{{$i}}" name="address_payment" class="custom-control-input" <?php if($i == 2)echo "checked"; ?>>
                <label class="custom-control-label" for="address_payment{{$i}}">
                    <b>{{Auth::user()->name}} - SĐT</b> - Địa chỉ {{$i}} <?php if($i == 2){ ?><span class="px-2">Mặc định</span> <?php }?>
                </label>
                <span class="text-primary btn p-0 btn_payAddress <?php if($i == 2) echo "d-none;" ?>">Thay đổi</span>
            </div>
        <?php }?>

        <div class="mb-2 d-none">
            <button class="btn btn-danger" id="complete">Lưu</button>
        </div>
    </div>

    <div class="border rounded mt-2 px-2 no-gutters">
        <div class="row d-sm-none d-md-flex pt-1 mx-0 px-0">
            <div class="col-md-6 pl-0">
                <h5>Sản phẩm</h5>
            </div>
            <div class="col-md-6 text-center">
                <div class="row">
                    <div class="col-5">
                        Đơn giá
                    </div>
                    <div class="col-2">
                        Số lượng
                    </div>
                    <div class="col-5">
                        Thành tiền
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list_cart mt-1">
        @foreach($product as $key => $val)
            <div class="card mb-1 w-100 py-3 px-2">
                <div class="row no-gutters d-flex">
                    <div class="col-md-6 d-flex">
                        <img src="{{ asset("/upload/images/testUp/".$val->more_detail[0]->images)}}" alt="...">
                        <h5 class="card-title pl-2">{{$val->title}}</h5>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="card-body row text-center">
                            <div class="col-md-5">
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
                            <div class="col-md-2">
                                <p class="text-center">{{$val->count}}</p>
                            </div>
                            <div class="col-md-5">
                                @foreach($val->more_detail as $key => $more)
                                    <span class="text-danger @if($key > 0)d-none @endif">{{$more->price*$val->count}} <sup>đ</sup></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="border rounded mt-2">
        <div class="row">
            <div class="col-sm-12 col-md-7">

            </div>
            <div class="col-sm-12 col-md-5 d-flex py-2 pointer" data-toggle="modal" data-target="#vouchemodal">
                <div class="">
                    <img height="24px" src="{{ asset("/upload/images/coupon.png")}}" alt="">
                    <span id="code_voucher">Sale3S Voucher</span>
                </div>
                <div class="ml-auto pr-2 text-primary">Chọn Hoặc Nhập Mã</div>
            </div>
        </div>
        <hr class="m-0">
        <div class="p-2" data-toggle="modal" data-target="#paymentmodal">
            <span><i class="fas fa-dollar-sign"></i> Phương thức thanh toán</span>
            <span class="text-primary pointer float-right">Thanh toán khi nhận hàng <i class="bi bi-caret-right-fill"></i></span>
        </div>
        <hr class="m-0">
        <div class="p-2">
            <div class="w-100 d-flex">
                <p>Tổng tiền hàng</p>
                <p class="ml-auto text-danger">50000$</p>
            </div>
            <div class="w-100 d-flex">
                <p>Phí ship</p>
                <p class="ml-auto text-danger">50000$</p>
            </div>
            <div class="w-100 d-flex">
                <p>Giảm giá</p>
                <p class="ml-auto text-danger">-5000$</p>
            </div>
            <div class="w-100 d-flex">
                <p>Tổng tiền</p>
                <p class="ml-auto text-danger">50000$</p>
            </div>
        </div>
        <div class="p-2 text-right">
            <button class="btn btn-danger p-3 px-4">Đặt hàng</button>
        </div>
    </div>
</section>
