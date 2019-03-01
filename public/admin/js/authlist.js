
layui.use('table', function(){
    var table = layui.table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    table.render({
        elem: '#test'
        ,url:'/admin/permission/jsonData'
        ,toolbar: '#toolbarDemo'
        ,title: '权限数据表'
        ,cols: [[
            // {type: 'checkbox', fixed: 'left'}
            {field:'ap_id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
            ,{field:'ap_name', title:'权限名'}
            ,{field:'icon', title:'图标', width:60, toolbar: '#iconfont'}
            ,{field:'ap_control', title:'控制器' }
            ,{field:'ap_action', title:'方法'}
            ,{field:'ap_url', title:'URL'}
            ,{field:'method', title:'请求方式'}
            ,{field:'created_at', title:'添加时间', width:200, sort: true}
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
            layer.confirm('你确定要删除该权限吗？', {icon: 3, title:'删除权限'}, function(index){
                $.ajax({
                    type: "POST",
                    url: '/admin/permission/destroy',
                    dataType: "json",
                    data: {ap_id: data.ap_id},
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
