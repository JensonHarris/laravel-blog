@extends("admin.layout.main")
       @section('title', '标签管理')
@section("content")
  <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{'/admin/tag'}}"><i class="fa fa-step-backward "></i></a>
            <b>编辑标签</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                    <div class="layui-form-item">
                        <input type="hidden" name="id" id="id"  class="layui-input" value="{{$tag->id}}">
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">标签名称</label>
                        <div class="layui-input-block">
                            <input type="text" id="name" name="name" lay-verify="name" class="layui-input" value="{{$tag->name}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="edit">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary" lay-submit lay-filter="">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="/admin/ajs/tag.js"></script>
@endsection
