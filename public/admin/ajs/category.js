layui.use(['form'], function(){
    var form = layui.form
    //监听提交
    form.on('submit(add)', function(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (data.field.is_nav=='on'){
            data.field.is_nav = 0;
        }else{
            data.field.is_nav = 1;
        }
        $.ajax({
            type: "POST",
            url: '/admin/category',
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
                            window.location.href="/admin/category";
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         if (data.field.is_nav=='on'){
            data.field.is_nav = 0;
        }else{
            data.field.is_nav = 1;
        }
        var url = '/admin/category/update/'+data.field.id;
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
                            window.location.href="/admin/category";
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
                return "请为该分类选择父分类";
            }
        },
        name:function(value, item){ //value：表单的值、item：表单的DOM对象
            if( /^\s*$/g.test(value)){
                return '分类名不能为空';
            }
        },
    });
});


layui.use('table', function(){
    var table = layui.table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    table.render({
        elem: '#test'
        ,url:'/admin/category/jsonData'
        ,toolbar: '#toolbarDemo'
        ,title: '权限数据表'
        ,cols: [[
            {type: 'checkbox', fixed: 'left'}
            ,{field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
            ,{field:'name', title:'分类名称'}
            ,{field:'seo_title', title:'SEO标题'}
            ,{field:'seo_keywords', title:'SEO关键字'}
            ,{field:'seo_desc', title:'SEO描述'}
            ,{field:'is_nav', title:'是否为导航'}
            ,{field:'created_at', title:'添加时间',width:200, sort: true}
            ,{fixed: 'right', title:'操作', toolbar: '#barDemo'}


        ]]
        ,page: true
        ,response: {
            statusCode: 200 //重新规定成功的状态码为 200，table 组件默认为 0
        }
        ,parseData: function(res){ //将原始数据解析成 table 组件所规定的数据
            return {
                "code" : res.code, //解析接口状态
                "msg"  : res.message, //解析提示文本
                "count":res.data.total, //解析数据长度
                "data" : res.data.data //解析数据列表
            };
        }
    });

    //监听行工具事件
    table.on('tool(test)', function(obj){
        var data = obj.data;
        if(obj.event === 'del'){
            layer.confirm('你确定要删除该分类吗？',{icon: 3, title:'删除分类'}, function(index){
                $.ajax({
                    type: "POST",
                    url: '/admin/category/destroy',
                    dataType: "json",
                    data: {id: data.id},
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
                                    obj.del();
                                }
                            });
                        } else {
                            layer.msg(res.message, {icon: 5});
                        }
                    }
                });
                return false;
            });
        }
    });
});
