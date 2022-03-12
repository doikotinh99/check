<?php
    function checkTabs1($tabs1, $tabs2){
        if($tabs1 == $tabs2){
            echo "menu-is-opening menu-open";
        }
    }
    function checkTabs2($tabs1, $tabs2){
        if($tabs1 == $tabs2){
            echo 'style="display: block;"';
        }
    }
?>

<!-- Modal -->
<div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="add_categoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_categoryLabel">Thêm danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="ctgr_name">Tên danh mục</label>
                    <input type="text" class="form-control" id="ctgr_name" placeholder="Tên dạnh mục">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_ctgr_save">Save changes</button>
            </div>
        </div>
    </div>
</div>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{ asset("/upload/images/iconw.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env("APP_NAME") }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item border-bottom">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>
                            {{Auth::user()->name}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="user/thong-tin" target="_blank" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>
                                    Thông tin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/" target="_blank" class="nav-link">
                                <i class="fas fa-tshirt nav-icon"></i>
                                <p>
                                    Về trang bán hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="nav-link">

                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>
                                    Đăng xuất
                                </p>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tổng quan
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php if (isset($tabs)) checkTabs1($tabs[0], "manage")?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Quản lý
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" <?php if (isset($tabs))checkTabs2($tabs[0], "manage")?>>
                        <li class="nav-item <?php if (isset($tabs))checkTabs1($tabs[1], "account")?>">
                            <a href="#" class="nav-link" id="admin_manger_acc">
                                <i class="far fa-user nav-icon"></i>
                                <p>
                                    Người dùng
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" <?php if (isset($tabs))checkTabs2($tabs[1], "account")?>>
                                <li class="nav-item" id="admin_manger_accA">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-check-circle nav-icon"></i>
                                        <p>Đang hoạt động</p>
                                    </a>
                                </li>
                                <li class="nav-item" id="admin_manger_accF">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-eye-slash nav-icon"></i>
                                        <p>Chưa kích hoạt</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="admin_manager_prd">
                                <i class="fas fa-tshirt nav-icon"></i>
                                <p>
                                    Sản phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="admin_manager_prdA">
                                        <i class="fas fa-check-circle nav-icon"></i>
                                        <p>Đang bán</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="admin_manager_prdH">
                                        <i class="fas fa-eye-slash nav-icon"></i>
                                        <p>Chưa kích hoạt</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link" id="admin_manger_productCtgr">
                                    <i class="fas fa-bars nav-icon"></i>
                                    <p>Danh mục</p>
                                </a>
                                  </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>
                                    Đơn hàng
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-check-circle nav-icon"></i>
                                        <p>Đã duyệt</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-square nav-icon"></i>
                                        <p>Chưa duyệt</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-times nav-icon"></i>
                                        <p>Hủy</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>
                                    Blog
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-check-circle nav-icon"></i>
                                        <p>Đang hoạt động</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-eye-slash nav-icon"></i>
                                        <p>Chưa kích hoạt</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-comments nav-icon"></i>
                                <p>
                                    Đánh giá sản phẩm
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-thumbs-up nav-icon"></i>
                                        <p>Tích cực</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-thumbs-down nav-icon"></i>
                                        <p>Tiêu cực</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if (isset($tabs)) checkTabs1($tabs[0], "add")?>">
                    <a href="#" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>
                            Thêm dữ liệu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" <?php if (isset($tabs))checkTabs2($tabs[0], "add")?>>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>
                                    Cấp tài khoản quản trị
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" data-toggle="modal" data-target="#add_category">
                            <a href="#" class="nav-link">
                                <i class="fas fa-bars nav-icon"></i>
                                <p>
                                    Thêm danh mục
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" id="admin_addprd">
                            <a href="/admin/product/add" class="nav-link  <?php if (isset($tabs)) if($tabs[1] == "product")echo "active"; ?>">
                                <i class="fas fa-tshirt nav-icon"></i>
                                <p>
                                    Sản phẩm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-newspaper nav-icon"></i>
                                <p>
                                    Blog
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-comments nav-icon"></i>
                                <p>
                                    Trả lời comment
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-thumbs-up nav-icon"></i>
                                        <p>Tích cực</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-thumbs-down nav-icon"></i>
                                        <p>Tiêu cực</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
