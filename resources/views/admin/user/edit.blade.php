@extends("admin.layout.main")
    @section('title', '用户管理')
@section("content")
   <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/user')}}"><i class="fa fa-step-backward "></i></a>
            <b>编辑管理员</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                    {{ csrf_field() }}
                    <div class="layui-form-item">
                            <input type="hidden" name="au_id" id="au_id"  class="layui-input" value="{{$adminUser->au_id}}">
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属用户组</label>
                        <div class="layui-input-block">
                            <select name="ar_id" id="ar_id" lay-verify="group">
                                <option value="" selected="">请选择权限</option>
                                <option value="0">顶级权限</option>
                                <option value="1">用户管理</option>
                                <option value="2">用户列表</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">登录账户</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_name" id="au_name" lay-verify="username" class="layui-input" value="{{$adminUser->au_name}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户姓名</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_realname" id="au_realname" lay-verify="realName" class="layui-input" value="{{$adminUser->au_realname}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号码</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_mobile" id="au_mobile" lay-verify="phone"  class="layui-input" value="{{$adminUser->au_mobile}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="au_email" id="au_email" lay-verify="email" class="layui-input" value="{{$adminUser->au_email}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">用户密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password" id="password" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">确认密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password_c" id="password_c" lay-verify="repass" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否禁用</label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" name="au_status" lay-skin="switch" lay-filter="switchTest" lay-text="启用|禁用">
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
    <script type="text/javascript" src="/admin/ajs/user.js"></script>

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
        {{--form.on('submit(demo1)', function(data){--}}
            {{--layer.alert(JSON.stringify(data.field), {--}}
                {{--title: '最终的提交信息'--}}
            {{--})--}}
            {{--return false;--}}
        {{--});--}}

        {{--//表单初始赋值--}}
        {{--form.val('example', {--}}
            {{--"username": "贤心" // "name": "value"--}}
            {{--,"password": "123456"--}}
            {{--,"interest": 1--}}
            {{--,"like[write]": true //复选框选中状态--}}
            {{--,"close": true //开关状态--}}
            {{--,"sex": "女"--}}
            {{--,"desc": "我爱 layui"--}}
        {{--})--}}


    {{--});--}}
{{--</script>--}}
@endsection



