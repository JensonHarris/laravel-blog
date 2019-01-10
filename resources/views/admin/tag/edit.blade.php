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
