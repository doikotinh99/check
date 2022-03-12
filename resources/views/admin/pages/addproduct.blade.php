
<section>
    <div class="card card-warning">
        <div class="card-header bg-primary">
            <h3 class="card-title text-center d-block w-100 text-white text-uppercase">General Elements</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label for="addPrd_name">Tên sản phẩm @error("error") {{$message}} @enderror</label>
                            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="addPrd_name" name="addPrd_name" required>
                            @error('addPrd_name')
                            <small id="addPrd_name" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Xuất xứ</label>
                            <input type="text" class="form-control" placeholder="Sản phẩm được làm ra tại đâu" name="addPrd_made" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Vị trí kho</label>
                            <input type="text" class="form-control" placeholder="Sản phẩm hiện tại ở đâu" name="addPrd_location" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Chất liệu chính sản phẩm</label>
                            <input type="text" class="form-control" placeholder="Sản phẩm đươc làm từ chất liệu gì" name="addPrd_material" required>
                        </div>
                    </div>
                </div>
                <input type="text" value="1" name="ip_list_typeCount" id="ip_list_typeCount" hidden>
                <div class="position-relative">
                    <button type="button" class="btn btn-primary position-sticky float-right" style="top: 60px; right: 30px; z-index: 9;" id="btn_addPrdCtn">Tiếp tục thêm</button>
                    <div class="row" style="clear: right" id="addPrd_list_type">

                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" rows="3" id="addPrd_desc" name="addPrd_desc"></textarea>
                </div>
                <script type="text/javascript">
                    CKEDITOR.replace( 'addPrd_desc');
                </script>
                <button type="submit" id="btn_sub">Đăng sản phẩm</button>
                @csrf
            </form>


        </div>
        <!-- /.card-body -->
    </div>
</section>
{{--script--}}
<script>
    function checkRand($rand, $n = 100){
        if ($n <= 0){
            return false;
        }
        for($i = 0; $i < $list_randType.length; $i++){
            if($list_randType[$i] == $rand){
                $rand = 1 + Math.floor(Math.random() * 100);
                return checkRand($rand, $n - 1);
            }
        }
        return $rand;
    }
    $("#btn_addPrdCtn").click(()=>{
        $rand = 1 + Math.floor(Math.random() * 100);
        $check = checkRand($rand);
        if($check){
            $list_randType.push($check);
            $("#ip_list_typeCount").val($list_randType);
        }else{
            console.log("nono");
        }
        $.get("/admin/product/type/"+$rand, (data)=>{
            $("#addPrd_list_type").add(data).appendTo('#addPrd_list_type');
        })
    })
</script>
