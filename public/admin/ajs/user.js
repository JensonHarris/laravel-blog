layui.use(['form'], function(){
    var form = layui.form
    //监听提交
    form.on('submit(add)', function(data){
        if (data.field.au_status=='on'){
            data.field.au_status = 0;
        }else{
            data.field.au_status = 1;
        }
        $.ajax({
            type: "POST",
            url: '/admin/user',
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
        return false; //阻
    });

    //监听提交
    form.on('submit(edit)', function(data){
        if (data.field.au_status=='on'){
            data.field.au_status = 0;
        }else{
            data.field.au_status = 1;
        }

        if (data.field.password ==''){
            delete data.field.password;
            delete data.field.password_c;
        }
        var url = '/admin/user/update/'+data.field.au_id;
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
                            window.location.href="/admin/index";
                        }
                    });
                } else {
                    layer.msg(res.message, {icon: 5});
                }
            }
        });
        return false; //阻
    });

    //自定义验证规则
    form.verify({
        group:function (value) {
            if (value == "") {
                return "请选择为该用户选择角色";
            }
        },
        username: function(value, item){ //value：表单的值、item：表单的DOM对象
            if( /^\s*$/g.test(value)){
                return '账号不能为空';
            }
            if(!new RegExp("^[a-zA-Z0-9_-]{6,16}$").test(value)){
                return '账号格式不正确';
            }
        },
        realName:function(value, item){ //value：表单的值、item：表单的DOM对象
            if( /^\s*$/g.test(value)){
                return '用户姓名不能为空';
            }
        }
        ,pass: [
            /^[\S]{6,16}$/
            ,'密码必须6到12位，且不能出现空格'
        ]
        ,repass: function(value, item){
            var password_c = $('#password').val();
            if(value != password_c){
                return '两次输入的密码不一致!';
            }
        }
        ,phone: function(value, item) { //value：表单的值、item：表单的DOM对象
            if( /^\s*$/g.test(value)){
                return '手机号不能为空';
            }
            if(!new RegExp("^(13[0-9]|14[579]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\\d{8}$").test(value)){
                return '请输入正确的手机号';
            }
        }
        ,email: [
            /^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$|^1[3|4|5|7|8]\d{9}$/,
            '请输入正确的邮箱'
        ]
    });




});
