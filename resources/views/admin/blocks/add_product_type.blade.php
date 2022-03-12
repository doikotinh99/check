<div class="col-sm-6" id="type_count{{$type_count}}">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Thêm mẫu</h3>
        </div>
        <div class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Size</label>
                            <input type="text" class="form-control" placeholder="VD: 38,39,40" name="addPrd_size{{$type_count}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <input type="text" class="form-control" placeholder="VD: Màu vàng" name="addPrd_type{{$type_count}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Giá (VNĐ)</label>
                            <input type="text" class="form-control" placeholder="VD: 30000" name="addPrd_price{{$type_count}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>SỐ lượng sản phẩm</label>
                            <input type="text" class="form-control" placeholder="VD: 38" name="addPrd_count{{$type_count}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputFile">Hỉnh ảnh sản phẩm</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="addPrd_image{{$type_count}}" id="addPrd_image{{$type_count}}">
                                    <label class="custom-file-label" for="addPrd_image{{$type_count}}">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phân loại sản phẩm</label>
                            <select class="custom-select" name="addPrd_ctgr{{$type_count}}">
                                @foreach($category as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-danger type_count" id="btn_type_count{{$type_count}}" data-addPrd="{{$type_count}}">Xóa</button>
            </div>
        </div>
    </div>
    {{--script--}}
    <script>
        $("#btn_type_count{{$type_count}}").click((e)=>{
            if($(".type_count").length > 1){
                $("#type_count{{$type_count}}").remove();
                $list_randType = $.grep($list_randType, (e, i)=>{
                    return e != {{$type_count}};
                })
                $("#ip_list_typeCount").val($list_randType);
            }
        })
    </script>
</div>

