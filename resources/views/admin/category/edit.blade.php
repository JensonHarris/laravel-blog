@extends("admin.layout.main")
    @section('title', '分类管理')
@section("content")
 <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{'/admin/category'}}"><i class="fa fa-step-backward "></i></a>
            <b>编辑文章分类</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                 <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                     <div class="layui-form-item">
                            <input type="hidden" name="id" id="id"  class="layui-input" value="{{$articleCategory->id}}">
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类名称</label>
                        <div class="layui-input-block">
                            <input type="text" id="name" name="name" lay-verify="name" class="layui-input" value="{{$articleCategory->name}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">父级分类</label>
                        <div class="layui-input-block">
                            <select name="parent_id" id="parent_id" lay-verify="select" disabled>
                                <option value="" selected="">请选择父级分类</option>
                                <option value="0"  @if ($articleCategory->parent_id ==0 )
                                selected @endif>顶级分类</option>
                                @foreach ($newCategorys as $newCategory)
                                <option value="{{$newCategory['id']}}" @if ($newCategory['id'] == $articleCategory->parent_id)
                                selected @endif>{{str_repeat('━ ',$newCategory['level'])}}{{$newCategory['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">SEO标题</label>
                        <div class="layui-input-block">
                            <input type="text" id="seo_title" name="seo_title" class="layui-input" value="{{$articleCategory->seo_title}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">SEO关键字</label>
                        <div class="layui-input-block">
                            <input type="text" id="seo_keywords" name="seo_keywords" class="layui-input" value="{{$articleCategory->seo_keywords}}" >
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">SEO描述</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea" id="seo_desc" name="seo_desc">{{$articleCategory->seo_desc}}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">设为导航</label>
                        <div class="layui-input-block">
                            <input type="checkbox" id="is_nav" name="is_nav" lay-skin="switch" lay-filter="switchTest" lay-text="是|否" @if(!$articleCategory->is_nav) checked="" @endif>
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
    <script type="text/javascript" src="/admin/js/category.js"></script>
@endsection


