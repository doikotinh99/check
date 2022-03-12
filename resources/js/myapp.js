const { isSet } = require("lodash");
function list_name_search($key){
    $.get("/san-pham/api/search/" + $key, (data)=>{
        $s = '<a href="/san-pham/tim-kiem/" id="val_search" class="list-group-item-action" aria-current="true">Tìm "<span ></span>"</a>';
        $("#list_name_search").html($s);
        for($i = 0; $i < data.length; $i++){
            $s = '<a href="/san-pham/tim-kiem/' + data[$i].title + '" id="val_search" class="list-group-item-action" aria-current="true">' + data[$i].title + '</a>'
            $("#list_name_search").add($s).appendTo('#list_name_search');
            console.log($s);
        }
    })
}

$ip_search = $("#ip_search_header");
$ip_search.focusin(() => {
    list_name_search("");
    $(".list_search").addClass("active");
});
$ip_search.focusout(() => {
    setTimeout(() => {
        $(".list_search").removeClass("active");
    }, 200);
});

$ip_search.keyup((e) => {
    list_name_search($ip_search.val());
    if (e.keyCode == '13') {
        $(location).attr('href', '/san-pham/tim-kiem/' + $ip_search.val());
    }
});
if ($(".cart_add").length > 0) {
    for ($i = 0; $i < $(".cart_add").length; $i++) {
        $class = $(".cart_add")[$i].offsetParent.classList[1];
        $cartBtnR = "." + $class + " .cart_remove";
        $cartBtnA = "." + $class + " .cart_add";
        $($cartBtnR).click(($data) => {
            $class = $data.target.offsetParent.classList[1];
            $cartIp = $("." + $class + " input");
            $ipV = Number($cartIp.val()) - 1;
            if ($ipV <= 0) {
                $qes = confirm("Xác nhận xóa sản phẩm");

            } else {
                $cartIp.val($ipV);
            }
        });
        $($cartBtnA).click(($data) => {
            $class = $data.target.offsetParent.classList[1];
            $cartIp = $("." + $class + " input");
            $ipV = Number($cartIp.val()) + 1;
            $cartIp.val($ipV);
        })
    }
}
$("#checkAllCart").change(function() {
    var checked = $(this).is(':checked');
    if (checked) {
        $(".checkCloneCart").each(function() {
            $(this).prop("checked", true);
        });
        if (!$("#checkAllCartBt").is(':checked')) {
            $("#checkAllCartBt").prop("checked", true);
        }
    } else {
        if ($("#checkAllCartBt").is(':checked')) {
            $("#checkAllCartBt").prop("checked", false);
        }
        $(".checkCloneCart").each(function() {
            $(this).prop("checked", false);
        });
    }
});
$(".checkCloneCart").click(function() {
    if ($(".checkCloneCart").length == $(".checkCloneCart:checked").length) {
        $("#checkAllCart").prop("checked", true);
        $("#checkAllCartBt").prop("checked", true);
    } else {
        $("#checkAllCart").prop("checked", false);
        $("#checkAllCartBt").prop("checked", true);
    }

});

$("#checkAllCartBt").change(function() {
    var checked = $(this).is(':checked');
    if (checked) {
        if (!$("#checkAllCart").is(':checked')) {
            $("#checkAllCart").prop("checked", true);
        }
        $(".checkCloneCart").each(function() {
            $(this).prop("checked", true);
        });
    } else {
        if ($("#checkAllCart").is(':checked')) {
            $("#checkAllCart").prop("checked", false);
        }
        $(".checkCloneCart").each(function() {
            $(this).prop("checked", false);
        });
    }
});
$(".checkCloneCart").click(function() {
    if ($(".checkCloneCart").length == $(".checkCloneCart:checked").length) {
        $("#checkAllCartBt").prop("checked", true);
        $("#checkAllCart").prop("checked", true);
    } else {
        $("#checkAllCartBt").prop("checked", false);
        $("#checkAllCart").prop("checked", false);
    }

});
$(".btn_payAddress").click(() => {
    $("#address_payment .custom-control").removeClass("d-none");
    $("#address_payment div.mb-2").removeClass("d-none");
    $(".btn_payAddress").addClass("d-none");
});

$("#address_payment #complete").click(() => {
    $("#address_payment input").addClass("d-none");
    $("#address_payment input:checked").removeClass("d-none");
    $("#address_payment .custom-control").addClass("d-none");
    $("#address_payment div.mb-2").addClass("d-none");
    $id = $("#address_payment input:checked").attr("data-id");
    $("#address_payment .custom-control[data-id=" + $id + "]").removeClass("d-none");
    $("#address_payment .custom-control[data-id=" + $id + "] .btn_payAddress").removeClass("d-none");
});
$(".list_voucher_payPrd").click((data) => {
    $s = data.currentTarget.innerText.split('\n');
    $("#code_voucher").text($s[0]);
    $("#code_voucher").attr("data-id", data.currentTarget.getAttribute("data-id"));

});
$(".add_to_cart_button").click((data)=>{
    let $product_id = data.currentTarget.getAttribute("data-product");
    $.get("/san-pham/yeu-thich",{
        'product_id' : $product_id,
        'count' : 1
    }, (data)=>{
        if(data){
            $.get("/san-pham/api/count-cart", (datas)=>{
                $("#checkout_items").text(datas);
                $("#alert_all").addClass("show");
                $("#alert_all .alert").text("Đã thêm vào giỏ hàng");
                setTimeout(()=>{
                    $("#alert_all .alert").text();
                    $("#alert_all").removeClass("show");
                }, 3000);
            });
        }
    })
})

$("#btn_add_prdToCart").click((data)=>{
    let $product_id = data.currentTarget.getAttribute("data-product");
    let $count = $("#count_poduct").val();
    $.get("/san-pham/yeu-thich",{
        'product_id' : $product_id,
        'count' : Number($count)
    }, (data)=>{
        if(data){
            $.get("/san-pham/api/count-cart", (datas)=>{
                $("#checkout_items").text(datas);
                $("#alert_all").addClass("show");
                $("#alert_all .alert").text("Đã thêm vào giỏ hàng");
                setTimeout(()=>{
                    $("#alert_all .alert").text();
                    $("#alert_all").removeClass("show");
                }, 3000);
            });
        }
    })
})
$(window).ready(()=>{
    $.get("/san-pham/api/count-cart", (datas)=>{
        $("#checkout_items").text(datas);
    })
})

$("#prdDetail_count .cart_remove").click(()=>{
    $count = $("#count_poduct").val();
    $("#count_poduct").val(Number($count) - 1);
})

$("#prdDetail_count .cart_add").click(()=>{
    $count = $("#count_poduct").val();
    $("#count_poduct").val(Number($count) + 1);
})
$("#alert_all").click(()=>{
    $("#alert_all").removeClass("show");
})
$("#btn_voteP").click((data)=>{
    let $product_id = data.currentTarget.getAttribute("data-product");
    let $vote = $(".rating input");
    let $countVote = 0;
    for($i = 0; $i < $vote.length; $i++){
        if($vote[$i].checked){
            $countVote = $vote[$i].attributes.value.value;
        }
    }
    $comment = $("#voteP_comment").val();
    $.get("/san-pham/api/vote",{
        'count' : $countVote,
        'product_id' : $product_id,
        'comment' : $comment
    }, (data)=>{
        $.get("/san-pham/api/vote-view", {'product_id' : $product_id}, (data)=>{
            $("#prd_voteBlock").html(data);
        })
    })
})

$("#btn_more_cmt").click((data)=>{
    let $product_id = data.currentTarget.getAttribute("data-product");
    let $skip = data.currentTarget.getAttribute("data-skip");
    $("#btn_more_cmt").attr("data-skip", Number($skip) + 5);
    $.get("/san-pham/api/list-cmt",{
        'product_id' : $product_id,
        'skip' : $skip
    },(data)=>{
        $("#list_cmtP").add(data).appendTo('#list_cmtP');
    })

})
