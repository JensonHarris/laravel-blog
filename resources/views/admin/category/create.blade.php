@extends("admin.layout.main")
    @section('title', '分类管理')
@section("content")
 <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{'/admin/category'}}"><i class="fa fa-step-backward "></i></a>
            <b>添加文章分类</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类名称</label>
                        <div class="layui-input-block">
                            <input type="text" id="name" name="name" placeholder="请输入分类名称..." lay-verify="name" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">父级分类</label>
                        <div class="layui-input-block">
                            <select name="parent_id" id="parent_id" lay-verify="select">
                                <option value="" selected="">请选择父级分类</option>
                                <option value="0">顶级分类</option>
                                @foreach ($newCategorys as $newCategory)
                                <option value="{{$newCategory['id']}}">{{str_repeat('━ ',$newCategory['level'])}}{{$newCategory['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">SEO标题</label>
                        <div class="layui-input-block">
                            <input type="text" id="seo_title" name="seo_title" placeholder="请输入分类名称..." class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">SEO关键字</label>
                        <div class="layui-input-block">
                            <input type="text" id="seo_keywords" name="seo_keywords" placeholder="请输入分类名称..." class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">SEO描述</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入分类描述..." class="layui-textarea" id="seo_desc" name="seo_desc"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">设为导航</label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" id="is_nav" name="is_nav" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="add">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary" lay-submit lay-filter="">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="/admin/js/category.js"></script>
@endsection


