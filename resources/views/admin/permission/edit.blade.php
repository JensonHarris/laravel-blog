@extends("admin.layout.main")
    @section('title', '权限管理')
@section('styles')
    <link href="/plugins/fontawesome/dist/css/fontawesome-iconpicker.min.css" rel="stylesheet">
@endsection
@section("content")
  <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/permission')}}"><i class="fa fa-step-backward "></i></a>
            <b>编辑权限</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md7 layui-col-md-offset1">
                    <div class="layui-form-item">
                        <input type="hidden" name="ap_id" id="ap_id"  class="layui-input" value="{{$adminPermission->ap_id}}">
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">父级权限</label>
                        <div class="layui-input-block">
                            <select name="ap_pid" id="ap_pid" lay-verify="select" disabled>
                                <option value="" selected="">请选择权限</option>
                                <option value="0"
                                        @if ($adminPermission->ap_pid ==0 )
                                        selected @endif>顶级权限
                                </option>
                                @foreach ($newPermissions as $Permission)
                                <option value="{{$Permission['ap_id']}}"
                                        @if ($Permission['ap_id'] == $adminPermission->ap_pid)
                                        selected @endif>{{str_repeat('━ ',$Permission['level'])}}&nbsp;{{$Permission['ap_name']}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">权限名称</label>
                        <div class="layui-input-block">
                            <input type="text"  id="ap_name" name="ap_name" class="layui-input" value="{{$adminPermission->ap_name}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">控制器名</label>
                        <div class="layui-input-block">
                            <input type="text" id="ap_control" name="ap_control" class="layui-input" value="{{$adminPermission->ap_control}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">方法名</label>
                        <div class="layui-input-block">
                            <input type="text" id="ap_action" name="ap_action" class="layui-input" value="{{$adminPermission->ap_action}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">请求方式</label>
                        <div class="layui-input-block">
                            <input type="text" id="method" name="method" class="layui-input" lay-verify="ismethod" value="{{$adminPermission->method}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">icon图标</label>
                        <div class="layui-input-block">
                            <input type="text" id="icon" name="icon" class="layui-input" lay-verify="" value="{{$adminPermission->icon}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">URL</label>
                        <div class="layui-input-block">
                            <input type="text" id="ap_url" name="ap_url" class="layui-input" value="{{$adminPermission->ap_url}}">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">权限描述</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea" id="ap_description" name="ap_description" >{{$adminPermission->ap_description}}</textarea>
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
    <script type="text/javascript" src="/admin/js/auth.js"></script>
    <script type="text/javascript" src="/plugins/fontawesome/dist/js/fontawesome-iconpicker.js"></script>
@endsection


