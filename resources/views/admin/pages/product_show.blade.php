<script>
    function activeProduct($id) {
        $.get("/admin/product/active/" + $id, (data)=>{
            if(data){
                alert("Kích hoạt thành công");
                $.get("/admin/product/show", (data)=>{
                    $("#admin_header_title").text("Quản lý sản phẩm");
                    $("#cnt_admin").html(data);
                })
            }
        })
    }
    function unactiveProduct($id) {
        $.get("/admin/product/active/" + $id, (data)=>{
            if(data){
                alert("Đã ẩn thành công");
                $.get("/admin/product/show", (data)=>{
                    $("#admin_header_title").text("Quản lý sản phẩm");
                    $("#cnt_admin").html(data);
                })
            }
        })
    }
    function deleteProduct($id) {
        $ques = confirm("Bạn chắc chắn muốn xóa danh mục");
        if($ques){
            $.get("/admin/product/delete/" + $id, (data)=>{
                if(data){
                    alert("Đã xóa thành công");
                    $.get("/admin/product/show", (data)=>{
                        $("#admin_header_title").text("Quản lý sản phẩm");
                        $("#cnt_admin").html(data);
                    })
                }
            })
        }

    }
</script>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Người đăng</th>
        <th scope="col">Chức năng</th>
    </tr>
    </thead>
    <tbody>
        @foreach($product as $val)
            <tr>
                <td>{{$val->title}}</td>
                <td>
                    @if($val->status == 1)
                        Đang bày bán
                    @else
                        Tạm ẩn
                    @endif
                </td>
                <td>{{$val->vendor[0]->name}}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Chức năng
                        </button>
                        <div class="dropdown-menu">
                            @if($val->status == 1)
                                <a class="dropdown-item" href="#" onclick="unactiveProduct({{$val->id}})">Gỡ xuống</a>
                            @else
                                <a class="dropdown-item" href="#" onclick="activeProduct({{$val->id}})">Lên kệ</a>
                            @endif
                            <a class="dropdown-item" href="#" onclick="deleteProduct({{$val->id}})">Xóa</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
