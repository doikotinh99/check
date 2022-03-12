<script>
    function activeCtegory($id) {
        $.get("/admin/category/active/" + $id, (data)=>{
            if(data){
                alert("Kích hoạt thành công");
                $.get("/admin/category/get", (data)=>{
                    $("#admin_header_title").text("Quản lý danh mục");
                    $("#cnt_admin").html(data);
                })
            }
        })
    }
    function unactiveCtegory($id) {
        $.get("/admin/category/unactive/" + $id, (data)=>{
            if(data){
                alert("Đã ẩn thành công");
                $.get("/admin/category/get", (data)=>{
                    $("#admin_header_title").text("Quản lý danh mục");
                    $("#cnt_admin").html(data);
                })
            }
        })
    }
    function deleteCtegory($id) {
        $ques = confirm("Bạn chắc chắn muốn xóa danh mục");
        if($ques){
            $.get("/admin/category/delete/" + $id, (data)=>{
                if(data){
                    alert("Đã xóa thành công");
                    $.get("/admin/category/get", (data)=>{
                        $("#admin_header_title").text("Quản lý danh mục");
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
        <th scope="col">Tên danh mục</th>
        <th scope="col">Trạng thái</th>
        <th scope="col" class="text-center">Chức năng</th>
    </tr>
    </thead>
    <tbody>
        @foreach($ctgr as $val)
            <tr>
                <td>{{$val->name}}</td>
                <td>
                    @if($val->status == 1)
                        Đang hoạt động
                    @else
                        Tạm ẩn
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Chức năng
                        </button>
                        <div class="dropdown-menu">
                            @if($val->status == 1)
                                <a class="dropdown-item" href="#" onclick="unactiveCtegory({{$val->id}})">Hủy kích hoạt</a>
                            @else
                                <a class="dropdown-item" href="#" onclick="activeCtegory({{$val->id}})">kích hoạt</a>
                            @endif
                                <a class="dropdown-item" href="#" onclick="deleteCtegory({{$val->id}})">Xóa</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
