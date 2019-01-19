<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/admin/plugins/layui/css/layui.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>个人头像</h5>
                    </div>
                    <div>
                        <div class="ibox-content profile-content">
                            <div class="layui-upload-drag" id="test10">
                                <i class="layui-icon"></i>
                                <p>点击上传，或将文件拖拽到此处</p>
                            </div>
                        </div>
                        <!-- <hr class="layui-bg-red"> -->
                        <br>
                        <div class="ibox-content profile-content">
                            <div>
                                <div class="feed-activity-list">
                                    <div class="feed-element">
                                        <span class="layui-badge">name </span>
                                    </div>
                                    <div class="feed-element">
                                        <span class="layui-badge">phone</span>
                                    </div>
                                    <div class="feed-element">
                                        <span class="layui-badge">email </span>
                                    </div>
                                     <div class="feed-element">
                                        <span class="layui-badge">phone</span>
                                    </div>
                                    <div class="feed-element">
                                        <span class="layui-badge">email </span>
                                    </div>
                                </div>
                            </div>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> 发送消息</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> 赞助</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
    layui.use('upload', function(){
        var $ = layui.jquery
        ,upload = layui.upload;
//拖拽上传
upload.render({
    elem: '#test10'
    ,url: '/upload/'
    ,done: function(res){
        console.log(res)
    }
});
});
</script>