const { isSet } = require("lodash");
$list_randType = [1];
$("#addPrd_list_type").ready(()=>{
    $list_randType = [1];
    $.get("/admin/product/type/1", (data)=>{
        $("#addPrd_list_type").add(data).appendTo('#addPrd_list_type');
    })
})

$("#admin_manger_acc").click(()=>{
    $.get("/admin/account/get", (data)=>{
        $("#admin_header_title").text("Quản lý người dùng ");
        $("#cnt_admin").html(data);
    })
})

$("#admin_manger_accA").click(()=>{
    $.get("/admin/account/get/status/1", (data)=>{
        $("#admin_header_title").text("Quản lý người dùng ");
        $("#cnt_admin").html(data);
    })
})

$("#admin_manger_accF").click(()=>{
    $.get("/admin/account/get/status/0", (data)=>{
        $("#admin_header_title").text("Quản lý người dùng ");
        $("#cnt_admin").html(data);
    })
})

$("#admin_manger_productCtgr").click(()=>{
    $.get("/admin/category/get", (data)=>{
        $("#admin_header_title").text("Quản lý danh mục");
        $("#cnt_admin").html(data);
    })
})

$("#admin_manager_prd").click(()=>{
    $.get("/admin/product/show", (data)=>{
        $("#admin_header_title").text("Quản lý sản phẩm");
        $("#cnt_admin").html(data);
    })
})

$("#admin_manager_prdA").click(()=>{
    $.get("/admin/product/status/active", (data)=>{
        $("#admin_header_title").text("Quản lý sản phẩm");
        $("#cnt_admin").html(data);
    })
})

$("#admin_manager_prdH").click(()=>{
    $.get("/admin/product/status/unactive", (data)=>{
        $("#admin_header_title").text("Quản lý sản phẩm");
        $("#cnt_admin").html(data);
    })
})
$("#btn_ctgr_save").click(()=>{
    $.get("/admin/category/add/" + $("#ctgr_name").val(),
        (data)=>{
        if(data == 1){
            alert("Thêm thành công");
        }else{
            alert("Đã tồn tại");
        }
    })
})


