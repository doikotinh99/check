<section class="container pt-3">
    <form class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="staticEmail">Email đăng nhập</label>
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->email}}">
            </div>
            <div class="form-group">
                <label for="info_name">Họ tên</label>
                <input type="text" class="form-control" id="info_name" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="info_status">Trạng thái tài khoản</label><br>
                @if (Auth::user()->status == 1)
                    <button type="button" class="btn btn-primary">kích hoạt</button>
                @endif

                @if (Auth::user()->status == 2)
                    <button type="button" class="btn btn-primary">Cảnh báo</button>
                @endif
            </div>
            <div class="form-group">
                <label for="info_role">Loại tài khoản</label><br>
                @if (Auth::user()->role == 1)
                    <button type="button" class="btn btn-primary">Khách hàng</button>
                @endif
                @if(Auth::user()->role == 0)
                    <button type="button" class="btn btn-danger">Admin</button>
                    <button type="button" class="btn btn-success">Đối tác</button>
                    <button type="button" class="btn btn-primary">Khách hàng</button>
                @endif
                @if(Auth::user()->role == 2)
                    <button type="button" class="btn btn-success">Đối tác</button>
                @endif
            </div>

        </div>
        <div class="w-100 text-center">
            <a href="/"><button type="button" class="btn btn-danger">Hủy</button></a>
            <button type="reset" class="btn btn-primary">Đặt lại</button>
            <button class="btn btn-success">Lưu</button>
        </div>
    </form>
</section>
