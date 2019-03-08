@extends("admin.layout.main")
@section('title', '分类管理')
@section("content")
    <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{'/admin/notice'}}"><i class="fa fa-step-backward "></i></a>
            <b>编辑系统公告</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                    <div class="layui-form-item">
                        <input type="hidden" id="id" name="id" value="{{$notice->id}}" class="layui-input" >
                    </div>
                    <div class="layui-form-item">
                        <input type="hidden" id="au_id" name="au_id" value="{{$notice->au_id}}" class="layui-input" >
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">发布者</label>
                        <div class="layui-input-block">
                            <input type="text"  value="{{$adminUser->au_name}}" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">公告类型</label>
                        <div class="layui-input-block">
                            <select name="type" id="type" lay-verify="select_type">
                                <option value="" selected="">请选择父级分类</option>
                                <option value="0" @if ($notice->type ==0 )
                                selected @endif>后台</option>
                                <option value="1" @if ($notice->type ==1 )
                                selected @endif>前台</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">公告等级</label>
                        <div class="layui-input-block">
                            <select name="level" id="level" lay-verify="select_level">
                                <option value="" selected="">请选择等级</option>
                                <option value="0"  @if ($notice->level ==0 )
                                selected @endif>普通</option>
                                <option value="1" @if ($notice->level ==1 )
                                selected @endif>一级</option>
                                <option value="2" @if ($notice->level ==2 )
                                selected @endif>二级</option>
                                <option value="3" @if ($notice->level ==3 )
                                selected @endif>三级</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">公告内容</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入分类描述..." class="layui-textarea" id="content" name="content" lay-verify="content">{{$notice->content}}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否置顶 </label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" id="is_top" name="is_top" lay-skin="switch" lay-filter="switchTest" lay-text="是|否">
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
    <script type="text/javascript" src="/admin/js/notice.js"></script>
@endsection


