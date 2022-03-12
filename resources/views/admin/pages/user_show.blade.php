<table class="table table-hover">
    <thead>
    <tr>

        <th scope="col">Họ tên</th>
        <th scope="col">Email</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Cấp bậc</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $val)
        <tr>
            <td>{{$val->name}}</td>
            <td>{{$val->email}}</td>
            <td>null</td>
            <td>null</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @if($val->status == 0)
                        Chưa kích hoạt
                    @endif
                    @if($val->status == 1)
                        Đang hoạt động
                    @endif
                    </button>
                    <div class="dropdown-menu">
                        @if($val->status == 1)
                            <a class="dropdown-item" href="#">Hủy kích hoạt</a>
                        @else
                            <a class="dropdown-item" href="#">kích hoạt tài khoản</a>
                        @endif
                    </div>
                </div>
            </td>

            @if($val->role == 0)
                <td>Người quản trị</td>
            @endif
            @if($val->role == 1)
                <td>Người dùng</td>
            @endif
            @if($val->role == 2)
                <td>Quản lý</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
