<<<<<<< HEAD
@extends("admin.layout.main")
@section('title', '系统公告')
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
                    <a class="layui-btn layui-btn-normal addNews_btn" href="{{'/admin/notice/create'}}">添加文章分类</a>
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
    <script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs"  href="/admin/notice/@{{d.id}}/edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
    <script type="text/html" id="navDemo">
        @{{#  if(d.is_top ==0){ }}
        <button class="layui-btn layui-btn-xs layui-bg-cyan" lay-event="disabled">非置顶</button>
        @{{#  }  else { }}
        <button class="layui-btn layui-btn-xs layui-bg-blue" lay-event="start">置顶</button>
        @{{#  } }}
    </script>
    <script type="text/javascript" src="/admin/js/notice.js"></script>
@endsection

=======
1111111111111111111
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
