layui.use('form', function(){
    var form = layui.form;
    //各种基于事件的操作，下面会有进一步介绍
    form.on('submit(*)', function(data){
        $.ajax({
            type: "post",
            url: '/admin/login',
            dataType: "json",
            data: data.field,
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
                    layer.msg(res.message, {
                        icon: 1,//提示的样式
                        time: 2000, //2秒关闭
                        end:function(){
                            window.location.href="/admin/index";
                        }
                    });
                } else {
                    layer.msg(res.message, {icon: 5});
                }
            }
        });
        return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    });
    form.verify({
        username: function(value, item){ //value：表单的值、item：表单的DOM对象
            if(!new RegExp("^[a-zA-Z0-9_-]{6,16}$").test(value)){
                return '账号格式不正确';
            }
        }
        ,pass: [
            /^[\S]{6,16}$/
            ,'密码必须6到12位，且不能出现空格'
        ]
        ,code: [
            /^[\S]{5}$/
            ,'请填写完整的验证码'
        ]
    });
});

layui.use(['jquery','layer'],function(){
   'use strict';
	var $ = layui.jquery
	   ,layer=layui.layer;

    $(window).on('resize',function(){
        var w = $(window).width();
        var h = $(window).height();
        $('.larry-canvas').width(w).height(h);
    }).resize();

    $(function(){
        $("#canvas").jParticle({
            background: "#141414",
            color: "#E5E5E5"
        });
    });

});
