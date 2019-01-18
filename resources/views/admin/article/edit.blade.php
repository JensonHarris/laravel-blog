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
    <link href="/plugins/markdown/css/editormd.css" rel="stylesheet"/>
    <link href="/admin/plugins/layui/css/layui.css" rel="stylesheet">
    <style>
        #article-editormd select {
            display: inline-block;
        }
    </style>
    <style> #article-editormd {z-index: 1000;}</style>
</head>
<body class="gray-bg bg-success">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-title">
        <blockquote class="layui-elem-quote">
            <a href="{{url('/admin/article')}}" ><i class="fa fa-step-backward "></i></a>
            <b>文章编辑</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane" action="">
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章分类</label>
                        <div class="layui-input-block">
                            <select name="category_id" id="category_id" lay-verify="category" disabled>
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
                            <select multiple="multiple" lay-filter="test" id="tag_ids" name="tag_ids" disabled>
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
                            <input type="text" name="author" id="author" class="layui-input" lay-verify="author" value="{{$article->author}}">
                        </div>
                    </div>

                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章封面</label>
                        <div class="cover layui-col-md3" id="cove">
                            @if(!$article->cover_map)
                                <img  id="cover" class="cover-map" src="/admin/img/coverimg.png" alt="文章封面图">
                            @else
                                <img  id="cover" class="cover-map" src="{{$article->cover_map}}" alt="文章封面图">
                            @endif
                        </div>
                        <input type="hidden" name="cover_map" id="cover_map"  class="layui-input" value="{{$article->cover_map}}" lay-verify="cover_map">
                    </div>

                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章标题</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" id="title" class="layui-input" lay-verify="title" value="{{$article->title}}">
                        </div>
                    </div>
                    <div class="layui-form-item layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章关键词</label>
                        <div class="layui-input-block">
                            <input type="text" name="keywords" id="keywords" class="layui-input" lay-verify="keywords" value="{{$article->keywords}}">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text layui-col-md6 layui-col-md-offset1">
                        <label class="layui-form-label">文章描述</label>
                        <div class="layui-input-block">
                            <textarea name="description" id="description" placeholder="请输入文章描述..." class="layui-textarea">{{$article->description}}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label layui-col-md-offset1">文章内容</label>
                        <div id="article-editormd">
                            <textarea name="markdown" style="display:none;">
                                {{$article->keywords}}
                            </textarea>
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
<script type="text/javascript" src="/plugins/markdown/editormd.js"></script>
<script type="text/javascript" src="/admin/ajs/article.js"></script>

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
    // var tagData = [{"id":12,"name":"长者","status":0},{"id":13,"name":"工厂"},{"id":14,"name":"小学生"},{"id":15,"name":"大学生"},{"id":16,"name":"研究生"},{"id":17,"name":"教师"},{"id":18,"name":"记者"}];
    // layui.config({
    //     base : '/admin/plugins'
    // }).extend({
    //     selectN: '/layui_extends/selectN',
    //     selectM: '/layui_extends/selectM',
    // }).use(['layer','form','jquery','selectN','selectM'],function(){
    //     $ = layui.jquery;
    //     var form = layui.form
    //         ,layer = layui.layer
    //         ,selectN = layui.selectN
    //         ,selectM = layui.selectM;
    //     //多选标签-基本配置
    //     var tagIns1 = selectM({
    //         //元素容器【必填】
    //         elem: '#tag_ids1'
    //         //候选数据【必填】
    //         ,data: tagData
    //         ,max:2
    //         ,tips: '请选择文章标签'
    //         // ,width:400
    //         //添加验证
    //         ,verify:'required'
    //     });
    //     var catIns1 = selectM({
    //         //元素容器【必填】
    //         elem: '#tag_ids2'
    //         ,max:1
    //         ,tips: '请选择文章类型'
    //         //候选数据【必填】
    //         ,data: tagData
    //     });
    //
    //     //监听重置按钮
    //     $('form').find(':reset').click(function(){
    //         $('form')[0].reset();
    //         return false;
    //     });
    //     // //监听指定开关
    //     // form.on('switch(switchTest)', function(data){
    //     //     layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
    //     //         offset: '6px'
    //     //     });
    //     //     layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
    //     // });
    //
    //     //监听提交
    //     form.on('submit(InputContent)', function(data){
    //         console.log(data.field);
    //         // layer.alert(JSON.stringify(data.field), {
    //         //     title: '最终的提交信息'
    //         // });
    //         return false;
    //     });
    //
    // });
</script>
<script type="text/javascript">
    var testEditor;
    $(function() {
        testEditor = editormd("article-editormd", {
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
                    "help", 'fullscreen',
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




