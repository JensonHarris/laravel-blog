
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CCSHOP后台</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/admin/css/font-awesome.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/layui_ext/dtree/dtree.css">
    <link rel="stylesheet" type="text/css" href="/admin/plugins/layui_ext/dtree/font/dtreefont.css">
</head>

<body class="gray-bg bg-success">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{'/admin/role'}}"><i class="fa fa-step-backward "></i></a>
            <b>新增角色</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">

                    <div class="layui-form-item">
                        <label class="layui-form-label">角色名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="ar_name" id="ar_name" placeholder="请输入角色名称" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">角色描述</label>
                        <div class="layui-input-block">
                            <textarea placeholder="请输入角色描述..." name="ar_description" id="ar_description" class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">权限分配</label>
                        <div class="layui-input-block">
                            <div style="overflow: auto;" id="toolbarDiv">
                                <div class="dtree-toolbar layui-nav" id="dtree_toolbar_menubarTree2" style="left: 62px; top: 15px;">
                                    <div class="layui-nav-item">
                                        <dl class="layui-nav-child layui-anim layui-anim-fadein layui-show">
                                            <dd>
                                                <a dtree-id="menubarTree2" d-menu="moveDown">
                                                    <i class="dtreefont dtree-icon-move-down"></i> 展开节点
                                                </a>
                                            </dd>
                                            <dd>
                                                <a dtree-id="menubarTree2" d-menu="moveUp">
                                                    <i class="dtreefont dtree-icon-move-up"></i> 收缩节点
                                                </a>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <ul id="menubarTree2" class="dtree" data-id="0"></ul>
                                {{--<button id='getall'>获取所有节点</button>--}}
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">是否禁用</label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" name="ar_status" lay-skin="switch" lay-filter="switchTest" lay-text="启用|禁用">
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
</div>
</body>
</html>
<script type="text/javascript" src="/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/admin/ajs/role.js"></script>

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
{{--<script>--}}


    {{--layui.config({--}}
        {{--base: '/admin/plugins/layui_ext/dtree/' //配置 layui 第三方扩展组件存放的基础目录--}}
    {{--}).extend({--}}
        {{--dtree: 'dtree' //定义该组件模块名--}}
    {{--}).use(['element', 'layer', 'dtree'], function() {--}}
        {{--var layer = layui.layer,--}}
            {{--dtree = layui.dtree,--}}
            {{--$ = layui.$;--}}
        {{--var DemoTree = dtree.render({--}}
            {{--elem: "#menubarTree2",--}}
            {{--url: "/data/role.json",--}}
            {{--// data: data,--}}
            {{--checkbar: true,--}}
            {{--initLevel: 1,--}}
            {{--menubar: true,--}}
            {{--response:{--}}
                {{--treeId: 'ap_id',--}}
                {{--parentId: "ap_pid",--}}
                {{--title:'ap_name'--}}
            {{--},--}}
            {{--menubarTips: {--}}
                {{--toolbar: ["moveDown", "moveUp"],--}}
                {{--group: []--}}
            {{--},--}}
            {{--toolbar: true,--}}
            {{--toolbarScroll: "#toolbarDiv",--}}
            {{--toolbarShow: [], // 工具栏自带的按钮制空--}}
            {{--dot: false--}}
        {{--});--}}

        {{--//单击节点 监听事件--}}
        {{--dtree.on("chooseDone('menubarTree2')", function(param) {--}}
            {{--var params = dtree.getCheckbarNodesParam("menubarTree2");--}}
            {{--layer.msg(JSON.stringify(params));--}}
        {{--});--}}
        {{--//点击获取所有选中的节点数据--}}
        {{--$("#getall").click(function() {--}}
            {{--var params = dtree.getCheckbarNodesParam("menubarTree2");--}}
            {{--layer.msg(JSON.stringify(params));--}}
        {{--})--}}

    {{--});--}}
{{--</script>--}}


