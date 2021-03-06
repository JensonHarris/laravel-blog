layui.use(['form'], function(){
    var form = layui.form
    //监听提交
    form.on('submit(add)', function(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (data.field.is_top=='on'){
            data.field.is_top = 0;
        }else{
            data.field.is_top = 1;
        }
        var vals = [];
        $('select[multiple] option:selected').each(function() {
            vals.push($(this).val());
        });
        data.field.tag_ids = vals;
        $.ajax({
            type: "POST",
            url: '/admin/article',
            dataType: "json",
            data: data.field,
            error: function(msg) {
                if (msg.status == 422) {
                    var json=JSON.parse(msg.responseText);
                    json = json.errors;
                    for ( var item in json) {
                        for ( var i = 0; i < json[item].length; i++) {
                            layer.msg(json[item][i], {icon: 5});
                            return ; //遇到验证错误，就退出
                        }
                    }
                } else {
                    layer.msg('服务器连接失败', {icon: 5});
                    return ;
                }
            },
            success: function(res) {
                if (res.status) {
                    layer.msg(res.message, {
                        icon: 1,//提示的样式
                        time: 2000, //2秒关闭
                        end:function(){
                            window.location.href="/admin/article";
                        }
                    });
                } else {
                    layer.msg(res.message, {icon: 5});
                }
            }
        });
        return false; //阻
    });

     //监听提交
    form.on('submit(edit)', function(data){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (data.field.is_top=='on'){
            data.field.is_top = 0;
        }else{
            data.field.is_top = 1;
        }
        var vals = [];
        $('select[multiple] option:selected').each(function() {
            vals.push($(this).val());
        });
        data.field.tag_ids = vals;

        var url = '/admin/article/update/'+data.field.id;
        console.log(data.field);
        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: data.field,
            error: function(msg) {
                if (msg.status == 422) {
                    var json=JSON.parse(msg.responseText);
                    json = json.errors;
                    for ( var item in json) {
                        for ( var i = 0; i < json[item].length; i++) {
                            layer.msg(json[item][i], {icon: 5});
                            return ; //遇到验证错误，就退出
                        }
                    }
                } else {
                    layer.msg('服务器连接失败', {icon: 5});
                    return ;
                }
            },
            success: function(res) {
                if (res.status) {
                    layer.msg(res.message, {
                        icon: 1,//提示的样式
                        time: 2000, //2秒关闭
                        end:function(){
                            window.location.href="/admin/article";
                        }
                    });
                } else {
                    layer.msg(res.message, {icon: 5});
                }
            }
        });
        return false; //阻
    });


    //自定义验证规则
    form.verify({
        category:function (value) {
            if (value == "") {
                return "请选择文章分类";
            }
        },
        tag:function (value) {
            if (value == "") {
                return "请选择文章标签";
            }
        },
        author:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请输入文章作者';
            }
        },
        title:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请输入文章标题';
            }
        },
        keywords:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请输入文章关键词';
            }
        },
        cover_map:function(value, item){
            if( /^\s*$/g.test(value)){
                return '请上传文章封面图';
            }
        },
    });
});


//多选框
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

//Markdown文本编辑器
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
                "link", "reference-link", "image", "code", 'code-block', "table", "datetime", "emoji", "html-entities", "pagebreak", "|",
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
        imageUploadURL:'/admin/upload',//图片上传地址
    });
});

//文章封面图上传
layui.use('upload', function(){
    var $ = layui.jquery
        ,upload = layui.upload;
    //拖拽上传
    upload.render({
        elem: '#cove'
        ,exts: 'jpg|png|jpeg|gif'
        ,headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
        ,url: '/admin/upload/cover'
        ,done: function(res){
            if (res.succese = 1){
                $('#cover_map').val(res.url);
                $('#cover ').attr('src', res.url);
            }else{
                layer.msg(res.message)
            }
        }
    });
});
