@extends("admin.layout.main")
    @section('title', '用户管理')
@section("content")
    <div class="ibox-title">
        <blockquote class="layui-elem-quote quoteBox">
            <form class="layui-form">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" class="layui-input searchVal" placeholder="请输入搜索的内容">
                    </div>
                    <a class="layui-btn search_btn" data-type="reload">搜索</a>
                </div>
                <div class="layui-inline">
                    <a class="layui-btn layui-btn-normal addNews_btn" href="{{'/admin/user/create'}}">添加管理员</a>
                </div>
                <div class="layui-inline">
                    <a class="layui-btn layui-btn-danger layui-btn-normal delAll_btn">批量删除</a>
                </div>
            </form>
        </blockquote>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <table class="layui-hide" id="test" lay-filter="test" ></table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
        <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
        <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
    </div>
</script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs"  href="{{'/admin/user/1/edit'}}">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="stateDemo">
    <button type="button" class="btn btn-danger btn-xs">禁用</button>
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;

        table.render({
            elem: '#test'
            ,url:'/data/data.json'
            ,toolbar: '#toolbarDemo'
            ,title: '用户数据表'
            ,cols: [[
                {type: 'checkbox', fixed: 'left'}
                ,{field:'id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
                ,{field:'username', title:'用户名', width:120}
                ,{field:'email', title:'邮箱', width:150, templet: function(res){
                        return '<em>'+ res.email +'</em>'
                    }}
                ,{field:'sex', title:'性别', width:80, sort: true}
                ,{field:'logins', title:'用户组', width:100}
                ,{field:'logins', title:'姓名', width:100}
                ,{field:'logins', title:'联系方式', width:100}
                ,{field:'logins', title:'登录次数', width:100}
                ,{field:'logins', title:'状态',toolbar: '#stateDemo', width:100}
                ,{field:'logins', title:'最后登录IP', width:100}
                ,{field:'joinTime', title:'注册时间',width:200, sort: true}
                ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
            ]]
            ,page: true
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
                layer.prompt({
                    formType: 2
                    ,value: data.email
                }, function(value, index){
                    obj.update({
                        email: value
                    });
                    layer.close(index);
                });
            }
        });
    });
</script>
@endsection
