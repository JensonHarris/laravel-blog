@extends("admin.layout.main")
    @section('title', '文章管理')
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
                    <a class="layui-btn layui-btn-normal addNews_btn" href="{{url('/admin/article/create')}}" >添加文章</a>
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
    <a class="layui-btn layui-btn-xs"  href="{{url('/admin/article/6/edit')}}">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;

        table.render({
            elem: '#test'
            ,url:'/data/article_data.json'
            ,toolbar: '#toolbarDemo'
            ,title: '文章数据表'
            ,cols: [[
                {type: 'checkbox', fixed: 'left'}
                ,{field:'article_id', title:'ID', width:80, fixed: 'left', unresize: true, sort: true}
                ,{field:'category', title:'文章类别', width:150}
                ,{field:'article_title', title:'文章标题'}
                ,{field:'article_img', title:'封面图', width: 150, templet:'#articleImg'}
                ,{field:'praise', title:'点赞数', width: 120 , sort: true}
                ,{field:'page_views', title:'阅读量', width:120, sort: true}
                ,{field:'status', title:'状态', width:120,templet:'#articleStatus'}
                ,{field:'author', title:'作者', width:150}
                ,{field:'pubdate', title:'发布时间', width:200, sort: true}
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
<script type="text/html" id="articleStatus">
    @{{#  if(d.status ==0){ }}
        未发布
    @{{#  } else { }}
        已发布
    @{{#  } }}
</script>
<script type="text/html" id="articleImg">
    <img src="@{{ d.article_img}}">
</script>
@endsection
