layui.use('table', function(){
    var table = layui.table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    table.render({
        elem: '#test'
        ,url:'/admin/comment/jsonData'
        ,toolbar: '#toolbarDemo'
        ,title: '权限数据表'
        ,cols: [[
            {field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
            ,{field:'content', title:'评论内容', }
            ,{field:'title', title:'评论文章'}
            ,{field:'nickname', title:'用户', width:100}
            ,{field:'status', title:'状态', width:120, templet:'#commentStatus'}
            ,{field:'created_at', title:'评论时间', width:200, sort: true}
            ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
        ]]
        ,page: true
        ,response: {
            statusCode: 200
        }
        ,parseData: function(res){
            return {
                "code" : res.code,
                "msg"  : res.message,
                "count": res.data.total,
                "data" : res.data.data
            };
        }
    });


    //监听行工具事件
    table.on('tool(test)', function(obj){
        var data = obj.data;
        //禁用用户
        if(obj.event === 'disabled'){
            layer.confirm('你确定要撤销留言吗？', {icon: 3, title:'撤销显示'}, function(index){
                $.ajax({
                    type: "POST",
                    url: '/admin/comment/changeStatus',
                    dataType: "json",
                    data: {id: data.id,status:1},
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
                                    window.location.href="/admin/comment";
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

        //启用用户
        if(obj.event === 'start') {
            layer.confirm('你确定要发布留言吗？', {icon: 3, title: '留言发布'}, function (index) {
                $.ajax({
                    type: "POST",
                    url: '/admin/comment/changeStatus',
                    dataType: "json",
                    data: {id: data.id, status: 0},
                    error: function (msg) {
                        if (msg.status == 422) {
                            var json = JSON.parse(msg.responseText);
                            json = json.errors;
                            for (var item in json) {
                                for (var i = 0; i < json[item].length; i++) {
                                    layer.msg(json[item][i], {icon: 5});
                                    return; //遇到验证错误，就退出
                                }
                            }
                        } else {
                            layer.msg('服务器连接失败', {icon: 5});
                            return;
                        }
                    },
                    success: function (res) {
                        if (res.status) {
                            layer.msg(res.message, {
                                icon: 1,//提示的样式
                                time: 2000, //2秒关闭
                                end: function () {
                                    window.location.href="/admin/comment";
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

        if(obj.event === 'del'){
            layer.confirm('你确定要删除该评论吗？', {icon: 3, title:'删除评论'}, function(index){
                $.ajax({
                    type: "POST",
                    url: '/admin/comment/destroy',
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

