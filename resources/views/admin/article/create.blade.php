<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/admin/css/font-awesome.css" rel="stylesheet">
    <link href="/admin/css/article.css" rel="stylesheet">
    <link href="/admin/plugins/layui/css/layui.css" rel="stylesheet">
    <link href="/plugins/markdown/css/editormd.css" rel="stylesheet"/>
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
                        <div class="layui-input-block">
                        <select name="category_id" id="category_id" lay-verify="category">
                                <option value=""></option>
                            @foreach ($categorys as $category)
                                <option value="{{$category['id']}}">{{str_repeat('━ ',$category['level'])}}{{$category['name']}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章标签</label>
                        <div class="layui-input-block">
                            <select multiple="multiple" lay-filter="test" id="tag_ids" name="tag_ids" lay-verify="tag">
                                <option value=""></option>
                                @foreach ($tags as $tag)
                                    <option value="{{$tag['id']}}">{{$tag['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章作者</label>
                        <div class="layui-input-block">
                            <input type="text" name="author" id="author" placeholder="请输入文章作者..." class="layui-input" lay-verify="author">
                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" id="title" placeholder="请输入文章标题..." class="layui-input" lay-verify="title">
                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章关键词</label>
                        <div class="layui-input-block">
                            <input type="text" name="keywords" id="keywords" placeholder="请输入文章关键词..." class="layui-input" lay-verify="keywords">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章描述</label>
                        <div class="layui-input-block">
                            <textarea name="description" id="description" placeholder="请输入文章描述..." class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-col-md-offset1">文章内容</label>
                        <div id="article-editormd">
                            <textarea name="markdown"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item  layui-col-md6 layui-col-md-offset1" pane="">
                        <label class="layui-form-label">是否置顶</label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" name="is_top" id="is_top" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF">
                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
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
<script src="/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/admin/plugins/layui/layui.js"></script>
<script type="text/javascript" src="/admin/ajs/article.js"></script>
<script type="text/javascript" src="/plugins/markdown/editormd.js"></script>

<script>
    layui.config({
        base: '/admin/plugins/layui_ext/multiSelect/',
    })
    layui.use(['multiSelect'],function() {
        var $ = layui.jquery,form = layui.form,multiSelect = layui.multiSelect;
        $('#get-val').click(function() {
            var vals = [],
                texts = [];
            $('select[multiple] option:selected').each(function() {
                vals.push($(this).val());
                texts.push($(this).text());
            })
            console.dir(vals);
            console.dir(texts);
        })
        form.on('select(test)',function(data){
            console.dir(data);
        })
    });
</script>
<script type="text/javascript">
    var testEditor;
    $(function() {
        testEditor = editormd("article-editormd", {
            width        : "85%",
            height       : 750,
            syncScrolling : "single",
            toc : true,
            todoList:true,
            emoji : true,       // Support Github emoji, Twitter Emoji(Twemoji), fontAwesome, Editor.md logo emojis.
            toolbarIcons : function() {
                return [
                    "undo", "redo", "|",
                    "bold", "del", "italic", "quote", "ucwords", "uppercase", "lowercase", "|",
                    "h1", "h2", "h3", "h4", "h5", "h6", "|",
                    "list-ul", "list-ol", "hr", "|",
                    "link", "reference-link", "image", "code", "preformatted-text", 'code-block', "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
                     "watch", "preview", "clear", "|",
                    "help", 'fullscreen',
                ]
            },
            //显示主题
            placeholder  :'请在此编写文章...',
            theme        : "dark",
            previewTheme :  "default",
            editorTheme  :  "monokai",
            path         : '/plugins/markdown/lib/',
            imageUpload:true,
            imageUploadURL:'url',//图片上传地址
        });
    });
</script>




