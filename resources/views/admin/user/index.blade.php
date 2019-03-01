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
                {{--<div class="layui-inline">--}}
                    {{--<a class="layui-btn layui-btn-danger layui-btn-normal delAll_btn">批量删除</a>--}}
                {{--</div>--}}
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
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs"  href="/admin/user/@{{d.au_id}}/edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script type="text/html" id="stateDemo">
    @{{#  if(d.au_status ==0){ }}
    <button class="layui-btn layui-btn-xs layui-bg-cyan" lay-event="disabled">禁用</button>
    @{{#  }  else { }}
    <button class="layui-btn layui-btn-xs layui-bg-blue" lay-event="start">启用</button>
    @{{#  } }}
</script>
<script type="text/javascript" src="/admin/js/user.js"></script>
@endsection
