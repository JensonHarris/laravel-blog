@extends("admin.layout.main")
    @section('title', '权限管理')
@section("content")
  <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/permission')}}"><i class="fa fa-step-backward "></i></a>
            <b>添加权限</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
            <form class="layui-form layui-form-pane layui-col-md7 layui-col-md-offset1">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label class="layui-form-label">父级权限</label>
                    <div class="layui-input-block">
                        <select name="ap_pid" id="ap_pid" lay-verify="select">
                            <option value="" selected="">请选择权限</option>
                            <option value="0">顶级权限</option>
                            @foreach ($newPermissions as $Permission)
                                <option value="{{$Permission['ap_id']}}">{{str_repeat('━ ',$Permission['level'])}}&nbsp;{{$Permission['ap_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">权限名称</label>
                    <div class="layui-input-block">
                        <input type="text"  id="ap_name" name="ap_name" placeholder="请输入权限名..." class="layui-input" lay-verify="apName">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">控制器名</label>
                    <div class="layui-input-block">
                        <input type="text" id="ap_control" name="ap_control" placeholder="请输入控制器名..." class="layui-input" lay-verify="apControl">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">方法名</label>
                    <div class="layui-input-block">
                        <input type="text" id="ap_action" name="ap_action" placeholder="请输入方法名..." class="layui-input" lay-verify="apAction">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">URL</label>
                    <div class="layui-input-block">
                        <input type="text" id="ap_url" name="ap_url" placeholder="请输入URL..." class="layui-input" lay-verify="apUrl">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">权限描述</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入该权限描述..." class="layui-textarea" id="ap_description" name="ap_description"></textarea>
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
    <script type="text/javascript" src="/admin/ajs/auth.js"></script>
@endsection


