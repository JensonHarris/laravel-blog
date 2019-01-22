<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/admin/plugins/layui/css/layui.css" rel="stylesheet">
    <style>
    .profile-user-img{
        padding: 3px;
        border: 3px solid #D2D6DE;
        border-radius: 50%;
    }
    .profile-user-img img{
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
    .profile-content{
        text-align: center;
        border: none !important;
    }
    h3{
        font-size: 21px;
    }
    h4{
        font-size: 13PX;
    }
</style>
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人头像</h5>
                    </div>
                    <div>
                        <form class="layui-form layui-form-pane">
                            <div class="ibox-content profile-content">
                                <div class="layui-upload-drag profile-user-img" id="cove">
                                    <img  id="cover" class="cover-map" src="/admin/img/avatar.png" alt="文章封面图">
                                </div>
                                <input type="hidden" name="headimgurl" id="headimgurl"  class="layui-input" value="" lay-verify="cover_map">
                                <h3>admin</h3>
                                <h4>JsonC@json.com</h4>
                            </div>
                            <div class="ibox-content">
                                <div class="layui-form-item">
                                    <input type="hidden" name="au_id" id="au_id"  class="layui-input" value="">
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">登录账户</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="au_name" id="au_name" lay-verify="username" class="layui-input" value="admin00" disabled>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">用户姓名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="au_realname" id="au_realname" lay-verify="realName" class="layui-input" value="">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">手机号码</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="au_mobile" id="au_mobile" lay-verify="phone"  class="layui-input" value="">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">用户邮箱</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="au_email" id="au_email" lay-verify="email" class="layui-input" value=>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">登录密码</label>
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
                                <div class="layui-form-item">
                                        <button class="layui-btn" lay-submit="" lay-filter="edit">保存</button>
                                        <button type="reset" class="layui-btn layui-btn-primary" lay-submit lay-filter="">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                            <legend>简约时间线：大事记</legend>
                        </fieldset>
                        <ul class="layui-timeline">
                            <li class="layui-timeline-item">
                                <i class="layui-icon layui-timeline-axis"></i>
                                <div class="layui-timeline-content layui-text">
                                    <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国最受欢迎的前端UI框架（期望）</div>
                                </div>
                            </li>
                            <li class="layui-timeline-item">
                                <i class="layui-icon layui-timeline-axis"></i>
                                <div class="layui-timeline-content layui-text">
                                    <div class="layui-timeline-title">2017年，layui 里程碑版本 2.0 发布</div>
                                </div>
                            </li>
                            <li class="layui-timeline-item">
                                <i class="layui-icon layui-timeline-axis"></i>
                                <div class="layui-timeline-content layui-text">
                                    <div class="layui-timeline-title">2016年，layui 首个版本发布</div>
                                </div>
                            </li>
                            <li class="layui-timeline-item">
                                <i class="layui-icon layui-timeline-axis"></i>
                                <div class="layui-timeline-content layui-text">
                                    <div class="layui-timeline-title">2015年，layui 孵化</div>
                                </div>
                            </li>
                            <li class="layui-timeline-item">
                                <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-timeline-axis"></i>
                                <div class="layui-timeline-content layui-text">
                                    <div class="layui-timeline-title">更久前，轮子时代。维护几个独立组件：layer等</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- 全局js -->
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script type="text/javascript" src="/admin/plugins/layui/layui.js"></script>
</body>

</html>
<script type="text/javascript" src="/admin/ajs/user.js"></script>
<script>

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
            $('#headimgurl').val(res.url);
            $('#cover ').attr('src', res.url);
        }else{
            layer.msg(res.message)
        }
    }
});
});

</script>

<script>
    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
        ,layer = layui.layer
        ,layedit = layui.layedit
        ,laydate = layui.laydate;

//日期
laydate.render({
    elem: '#date'
});
laydate.render({
    elem: '#date1'
});

//创建一个编辑器
var editIndex = layedit.build('LAY_demo_editor');

//自定义验证规则
form.verify({
    title: function(value){
        if(value.length < 5){
            return '标题至少得5个字符啊';
        }
    }
    ,pass: [
    /^[\S]{6,12}$/
    ,'密码必须6到12位，且不能出现空格'
    ]
    ,content: function(value){
        layedit.sync(editIndex);
    }
});

//监听指定开关
form.on('switch(switchTest)', function(data){
    layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
        offset: '6px'
    });
    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
});

//监听提交
form.on('submit(demo1)', function(data){
    layer.alert(JSON.stringify(data.field), {
        title: '最终的提交信息'
    })
    return false;
});

//表单初始赋值
form.val('example', {
"username": "贤心" // "name": "value"
,"password": "123456"
,"interest": 1
,"like[write]": true //复选框选中状态
,"close": true //开关状态
,"sex": "女"
,"desc": "我爱 layui"
})


});
</script>

