@extends("admin.layout.main")
    @section('title', '权限管理')
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
                        {{ csrf_field() }}
                    <div class="layui-form-item">
                        <input type="hidden" name="ap_id" id="ap_id"  class="layui-input" value="{{$adminPermission->ap_id}}">
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">父级权限</label>
                        <div class="layui-input-block">
                            <select name="ap_pid" id="ap_pid" lay-verify="select">
                                <option value="" selected="">请选择权限</option>
                                <option value="0">顶级权限</option>
                                <option value="1">用户管理</option>
                                <option value="2">用户列表</option>
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
    <script type="text/javascript" src="/admin/ajs/auth.js"></script>


    {{--<script>--}}
    {{--layui.use(['form', 'layedit', 'laydate'], function(){--}}
        {{--var form = layui.form--}}
            {{--,layer = layui.layer--}}
            {{--,layedit = layui.layedit--}}
            {{--,laydate = layui.laydate;--}}

        {{--//日期--}}
        {{--laydate.render({--}}
            {{--elem: '#date'--}}
        {{--});--}}
        {{--laydate.render({--}}
            {{--elem: '#date1'--}}
        {{--});--}}

        {{--//创建一个编辑器--}}
        {{--var editIndex = layedit.build('LAY_demo_editor');--}}

        {{--//自定义验证规则--}}
        {{--form.verify({--}}
            {{--title: function(value){--}}
                {{--if(value.length < 5){--}}
                    {{--return '标题至少得5个字符啊';--}}
                {{--}--}}
            {{--}--}}
            {{--,pass: [/(.+){6,12}$/, '密码必须6到12位']--}}
            {{--,content: function(value){--}}
                {{--layedit.sync(editIndex);--}}
            {{--}--}}
        {{--});--}}

        {{--//监听指定开关--}}
        {{--form.on('switch(switchTest)', function(data){--}}
            {{--layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {--}}
                {{--offset: '6px'--}}
            {{--});--}}
            {{--layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)--}}
        {{--});--}}

        {{--//监听提交--}}
        {{--form.on('submit(InputContent)', function(data){--}}
            {{--layer.alert(JSON.stringify(data.field), {--}}
                {{--title: '最终的提交信息'--}}
            {{--})--}}
            {{--return false;--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
@endsection


