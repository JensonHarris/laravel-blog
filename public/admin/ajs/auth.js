layui.use(['form'], function(){
    var form = layui.form
    //监听提交
    form.on('submit(add)', function(data){
        $.ajax({
            type: "POST",
            url: '/admin/permission',
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
                            window.location.href="/admin/permission";
                        }
                    });
                } else {
                    layer.msg(res.message, {icon: 5});
                }
            }
        });
        return false; //阻
    });

    //监听提交
    form.on('submit(edit)', function(data){
        var url = '/admin/permission/update/'+data.field.ap_id;
        $.ajax({
            type: "POST",
            url: url,
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
                            window.location.href="/admin/permission";
                        }
                    });
                } else {
                    layer.msg(res.message, {icon: 5});
                }
            }
        });
        return false;
    });

    //自定义验证规则
    form.verify({
        select:function (value) {
            if (value == "") {
                return "请为该权限选择父权限";
            }
        },
        apName:function(value, item){
            if( /^\s*$/g.test(value)){
                return '权限名不能为空';
            }
        },
        apControl:function(value, item){
            if( /^\s*$/g.test(value)){
                return '控制器名不能为空';
            }
        },
        apAction:function(value, item){
            if( /^\s*$/g.test(value)){
                return '方法名不能为空';
            }
        },
        ismethod:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请求方法不能为空';
            }
        },
        apUrl:function(value, item){
            if( /^\s*$/g.test(value)){
                return 'URL不能为空';
            }
        },
    });




});
