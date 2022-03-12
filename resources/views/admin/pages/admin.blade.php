<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Đơn hàng trong ngày</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Tỉ lệ thành công</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>Người dùng mới</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Người dùng truy cập</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
{{$role}}
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user mr-1"></i>
                        Trả lời
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Nhập nội dung"></textarea>
                            <button class="btn btn-primary mt-1 float-right">Trả lời</button>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-envelope mr-1"></i>
                        Danh sách phản hồi khách hàng
                    </h3>
                    <!-- /.card-tools -->
                </div>
                <div class="card-body p-0 rounded-0" style="max-height: 250px; overflow: scroll">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            The current link item
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>

                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</div>
