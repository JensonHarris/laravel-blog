$(function() {
    $('.emotion').qqFace({
        id: 'facebox',
        assign: 'comment-textarea',
        path: '/home/images/arclist/' //表情存放的路径
    });
});

$(".ps_tab a").click(function() {
    $(".ps_tab a").removeClass('active');
    $(this).addClass('active');
    if ($(this).attr('data-type') == 1) {
        $(".ps_code img").attr('src', "/home/images/pay/alipay.jpg");
    } else {
        $(".ps_code img").attr('src', "/home/images/pay/weixpay.jpg");
    }
});

$(".praise").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(".praise").attr("data-id");
    if (!$.cookie(id)){
        $.ajax({
            type: "POST",
            url: '/article/articleLike',
            dataType: "json",
            data: {article_id:id},
            error: function(msg) {
                if (msg.status == 422) {
                    var json=JSON.parse(msg.responseText);
                    json = json.errors;
                    for ( var item in json) {
                        for ( var i = 0; i < json[item].length; i++) {
                            layer.msg(json[item][i], {icon: 5});
                            return ; //遇到验证错误，就退出
                        }
                    }
                } else {
                    layer.msg('服务器连接失败', {icon: 5});
                    return ;
                }
            },
            success: function(res) {
                if (res.status) {
                    $.cookie(id, id);

                    $('#like_num').text(res.data.likes);
                    layer.msg(res.message, {icon: 1});
                } else {
                    layer.msg(res.message, {icon: 5});
                }
            }
        });
        return false;
    }else {
        layer.msg('已点赞', {icon: 5});
        return false;
    }
});

editormd.markdownToHTML("test-editormd", {
    htmlDecode: "style,script,iframe",
    emoji: true,
    taskList: true,
    tex: true, // 默认不解析
    flowChart: true, // 默认不解析
    sequenceDiagram: true // 默认不解析
});

//显示头像为昵称的首字
$('.nickname').each(function(){
    var str = $(this).text();
    var name  = str.split('');
    $(this).text(name[0]);
});

