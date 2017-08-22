$(document).ready(function () {
    $(".updatecart").on("click", function () {
        var rowid = $(this).attr("id");
        var qty = $(this).parent().parent().find(".qty").val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "cap-nhat/" + rowid + "/" + qty,
            type: "GET",
            cache: false,
            data: {"id": rowid, "qty": qty, "_token": token},
            success: function (data) {
                if (data == "OK") {
                    window.location = "gio-hang";
                    return false;
                }
            }
        });
    });

    $(".keywords").keyup(function () {
        var k = $(".keywords").val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "searchAjax",
            type: "get",
            cache: false,
            data: {"k": k},
            success: function (data) {
                $("#quicksearch").html(data);
                $("#quicksearch").css("display", "block");
            }
        });
        return false;
    });

    $(".comment").on("click", function (e) {
        var d = new Date();
        e.preventDefault();
        var comm_name = $(".comm_name").val();
        var comm_content = $(".comm_content").val();
        var id = $(".product_id").val();
        var alias = $(".product_alias").val();
        var token = $(".token1").val();
        $.ajax({
            url: alias,
            type: "POST",
            cache: false,
            data: {"comm_name": comm_name, "comm_content": comm_content, "product_id": id, "_token": token},
            success: function (data) {
                if ($("#comm-list li").length <= 0) {
                    $("#comm-list").html('<li><div><b>' + data["comm_name"] + '</b><br><span>' + data["comm_content"] + '</span><br><small><a href="javascript:void(0)">Trả lời </a><span>' + d + '</span></small></div></li>');
                }
                else {
                    $(".field-comment ul li:eq(0)").before(
                        '<li><div><b>' + data["comm_name"] + '</b><br><span>' + data["comm_content"] + '</span><br><small><a href="javascript:void(0)">Trả lời </a><span>' + d + '</span></small></div></li>'
                    );
                }
                $(".comm_name").val("");
                $(".comm_content").val("");
            }
        });
        return false;
    });

    $(".reply").on("click", function (e) {
        var d = new Date();
        e.preventDefault();
        var id = $(this).attr("data-comid");
        var reply_name = $(".reply_name" + id).val();
        var reply_content = $(".reply_content" + id).val();
        var alias = $(".product_alias").val();
        var token = $(".token2").val();
        $.ajax({
            url: alias + "/" + id,
            type: "POST",
            cache: false,
            data: {"reply_name": reply_name, "reply_content": reply_content, "comm_id": id, "_token": token},
            success: function (data) {
                if ($(".rep-list" + id + " li").length == 0) {
                    $(".rep-list" + id).html('<li><div><b>' + data["reply_name"] + '</b><br><span>' + data["reply_content"] + '</span><br><small><a href="javascript:void(0)">Trả lời </a><span>' + d + '</span></small></div></li>');
                }
                else {
                    $(".rep-list" + id + " li:eq(0)").before('<li><div><b>' + data["reply_name"] + '</b><br><span>' + data["reply_content"] + '</span><br><small><a href="javascript:void(0)">Trả lời </a><span>' + d + '</span></small></div></li>');
                }
                $(".reply_name" + id).val("");
                $(".reply_content" + id).val("");
            }
        });
        return false;
    });
    $(".reply-block").on("click", function () {
        var id = $(this).attr("data-id");
        $(".rep-form" + id).slideToggle();
    });
    $(".keywords").on("blur", function () {
        $val = $(".keywords").val();
        if ($val == "") {
            $("#quicksearch").hide();
        }
    });
    $(".keywords").keyup(function () {
        $val = $(".keywords").val();
        if ($val == "") {
            $("#quicksearch").hide();
        }
    });
});
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=746622225473615";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));