
layui.use('table', function(){
    var table = layui.table;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    table.render({
        elem: '#test'
        ,url:'/admin/role/jsonData'
        ,toolbar: '#toolbarDemo'
        ,title: '权限数据表'
        ,cols: [[
            {type: 'checkbox', fixed: 'left'}
            ,{field:'ar_id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
            ,{field:'ar_name', title:'角色名称'}
            ,{field:'ar_description', title:'角色描述' }
            ,{field:'ar_status', title:'角色状态'}
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

    //头工具栏事件
    table.on('toolbar(test)', function(obj){
        var checkStatus = table.checkStatus(obj.config.id);
        switch(obj.event){
            case 'getCheckData':
                var data = checkStatus.data;
                layer.alert(JSON.stringify(data));
                break;
            case 'getCheckLength':
                var data = checkStatus.data;
                layer.msg('选中了：'+ data.length + ' 个');
                break;
            case 'isAll':
                layer.msg(checkStatus.isAll ? '全选': '未全选');
                break;
        };
    });

    //监听行工具事件
    table.on('tool(test)', function(obj){
        var data = obj.data;
        //console.log(obj)
        if(obj.event === 'del'){
            layer.confirm('真的删除行么', function(index){
                obj.del();
                layer.close(index);
            });
        } else if(obj.event === 'edit'){
            console.log(obj.data);

        }
    });
});
