layui.use(['form'], function(){
    var form = layui.form
    //监听提交
    form.on('submit(add)', function(data){
        console.log(data.field);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (data.field.is_top=='on'){
            data.field.is_top = 0;
        }else{
            data.field.is_top = 1;
        }
        var vals = [];
        $('select[multiple] option:selected').each(function() {
            vals.push($(this).val());
        });
        data.field.tag_ids = vals;
        $.ajax({
            type: "POST",
            url: '/admin/article',
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
                            window.location.href="/admin/article";
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
        var url = '/admin/article/update/'+data.field.id;
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
        category:function (value) {
            if (value == "") {
                return "请选择文章分类";
            }
        },
        tag:function (value) {
            if (value == "") {
                return "请选择文章标签";
            }
        },
        author:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请输入文章作者';
            }
        },
        title:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请输入文章标题';
            }
        },
        keywords:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请输入文章关键词';
            }
        },
    });
});
