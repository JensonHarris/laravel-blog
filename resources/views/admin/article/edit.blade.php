<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/admin/css/font-awesome.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/plugins/markdown/css/editormd.css" rel="stylesheet"/>
    <link href="/admin/plugins/layui/css/layui.css" rel="stylesheet">
  <style>
    #test-editormd {
             z-index: 1000;
        }
    </style>
</head>
<body class="gray-bg bg-success">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/article')}}" ><i class="fa fa-step-backward "></i></a>
            <b>新增文章</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane" action="">
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章分类</label>
                        <div class="layui-input-block" id="tag_ids2">

                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="article_title" autocomplete="off" placeholder="请输入文章标题..." class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章作者</label>
                        <div class="layui-input-block">
                            <input type="text" name="author" autocomplete="off" placeholder="请输入文章作者..." class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章标签</label>
                        <div class="layui-input-block" id="tag_ids1">

                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章描述</label>
                        <div class="layui-input-block">
                            <textarea name="describe" placeholder="请输入文章描述..." class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-col-md-offset1">文章内容</label>
                        <div id="test-editormd">
                            <textarea name="content" style="display:none;">
[TOC]

### Themes

#### Setting

configs:

```javascript
{
    // Editor.md theme, default or dark, change at v1.5.0
    // You can also custom css class .editormd-theme-xxxx
    theme : "default | dark",

    // Preview container theme, added v1.5.0
    // You can also custom css class .editormd-preview-theme-xxxx
    previewTheme : "default | dark",

    // Added @v1.5.0 & after version this is CodeMirror (editor area) theme
    editorTheme : editormd.editorThemes['theme-name']
}
```

functions:

```javascript
editor.setTheme('theme-name');
editor.setEditorTheme('theme-name');
editor.setPreviewTheme('theme-name');
```

#### Default theme

- Editor.md theme : `default`
- Preview area theme : `default`
- Editor area theme : `default`

> Recommend `dark` theme.

#### Recommend editor area themes

- ambiance
- eclipse
- mdn-like
- mbo
- monokai
- neat
- pastel-on-dark

#### Editor area themes

- default
- 3024-day
- 3024-night
- ambiance
- ambiance-mobile
- base16-dark
- base16-light
- blackboard
- cobalt
- eclipse
- elegant
- erlang-dark
- lesser-dark
- mbo
- mdn-like
- midnight
- monokai
- neat
- neo
- night
- paraiso-dark
- paraiso-light
- pastel-on-dark
- rubyblue
- solarized
- the-matrix
- tomorrow-night-eighties
- twilight
- vibrant-ink
- xq-dark
- xq-light
                            </textarea>
                        </div>
                    </div>
                    <div class="layui-form-item  layui-col-md6 layui-col-md-offset1" pane="">
                        <label class="layui-form-label">是否发布</label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" name="issue" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="InputContent">保存</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/plugins/markdown/editormd.js"></script>
<script>
    var tagData = [{"id":12,"name":"长者","status":0},{"id":13,"name":"工厂"},{"id":14,"name":"小学生"},{"id":15,"name":"大学生"},{"id":16,"name":"研究生"},{"id":17,"name":"教师"},{"id":18,"name":"记者"}];
    layui.config({
        base : '/admin/plugins'
    }).extend({
        selectN: '/layui_extends/selectN',
        selectM: '/layui_extends/selectM',
    }).use(['layer','form','jquery','selectN','selectM'],function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer
            ,selectN = layui.selectN
            ,selectM = layui.selectM;
        //多选标签-基本配置
        var tagIns1 = selectM({
            //元素容器【必填】
            elem: '#tag_ids1'
            //候选数据【必填】
            ,data: tagData
            ,max:2
            ,tips: '请选择文章标签'
            // ,width:400
            //添加验证
            ,verify:'required'
        });
        var catIns1 = selectM({
            //元素容器【必填】
            elem: '#tag_ids2'
            ,max:1
            ,tips: '请选择文章类型'
            //候选数据【必填】
            ,data: tagData
        });

        //监听重置按钮
        $('form').find(':reset').click(function(){
            $('form')[0].reset();
            return false;
        });
        // //监听指定开关
        // form.on('switch(switchTest)', function(data){
        //     layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
        //         offset: '6px'
        //     });
        //     layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        // });

        //监听提交
        form.on('submit(InputContent)', function(data){
            console.log(data.field);
            // layer.alert(JSON.stringify(data.field), {
            //     title: '最终的提交信息'
            // });
            return false;
        });

    });
</script>
<script type="text/javascript">
    var testEditor;
    $(function() {
        testEditor = editormd("test-editormd", {
            width        : "85%",
            height       : 750,
            toc : true,
            todoList:true,
            emoji : true,       // Support Github emoji, Twitter Emoji(Twemoji), fontAwesome, Editor.md logo emojis.
            taskList : true,
            tex: true,                   // 开启科学公式TeX语言支持，默认关闭
            flowChart: true,             // 开启流程图支持，默认关闭
            sequenceDiagram: true,       // 开启时序/序列图支持，默认关闭,
            imageUpload:true,
            imageUploadURL:'url',//图片上传地址
            // Editor.md theme, default or dark, change at v1.5.0
            toolbarIcons : function() {
                return [
                    "undo", "redo", "|",
                    "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|",
                    "h1", "h2", "h3", "h4", "h5", "h6", "|",
                    "list-ul", "list-ol", "hr", "|",
                    "link", "reference-link", "image", "code",'code-block', "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                     "watch", "preview", "clear", "|",
                    "help"
                ]
            },
            //显示主题
            theme        : "dark",
            previewTheme :  "default",
            editorTheme  :  "monokai",
            path         : '/plugins/markdown/lib/'
        });
    });
</script>




