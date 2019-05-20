layui.use('table', function(){
    var table = layui.table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    table.render({
        elem: '#test'
        ,url:'/admin/article/jsonData'
        ,toolbar: '#toolbarDemo'
        ,title: '文章数据表'
        ,cols: [[
            // {type: 'checkbox', fixed: 'left'},
            {field:'id', title:'ID', width:80, unresize: true, sort: true}
            ,{field:'name', title:'文章类别', width:150}
            ,{field:'title', title:'文章标题'}
            ,{field:'cover_map', title:'封面图', width: 150, align:'center', templet:'#articleImg'}
            ,{field:'likes', title:'点赞数', width: 120 , sort: true}
            ,{field:'views', title:'阅读量', width:120, sort: true}
            ,{field:'is_top', title:'状态', align:'center', width:120, templet:'#articleStatus'}
            ,{field:'author', title:'作者', width:150}
            ,{field:'created_at', title:'发布时间', width:200, sort: true}
            ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
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
        ,done:function (res, cuur, count) {
            $(".layui-table-cell").css({
               "height":"auto"
            });
        }
    });


    //监听行工具事件
    table.on('tool(test)', function(obj){
         var data = obj.data;
        //禁用用户
        if(obj.event === 'disabled'){
            layer.confirm('你确定要取消置顶吗？', {icon: 3, title:'取消置顶'}, function(index){
                $.ajax({
                    type: "POST",
                    url: '/admin/article/changeTopStatue',
                    dataType: "json",
                    data: {id: data.id,is_top:1},
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
                return false;
            });
        }

        //启用用户
        if(obj.event === 'start') {
            layer.confirm('你确定要置顶吗？', {icon: 3, title: '文章置顶'}, function (index) {
                $.ajax({
                    type: "POST",
                    url: '/admin/article/changeTopStatue',
                    dataType: "json",
                    data: {id: data.id, is_top: 0},
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
                                    window.location.href="/admin/article";
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
            layer.confirm('你确定要删除该文章吗？', {icon: 3, title:'删除文章'}, function(index){
                $.ajax({
                    type: "POST",
                    url: '/admin/article/destroy',
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
