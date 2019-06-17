<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="/admin/plugins/layui/css/layui.css" rel="stylesheet">
    <link href="/admin/css/profile.css" rel="stylesheet">
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
                                    @if(!$adminUser->headimgurl)
                                        <img  id="cover" class="cover-map" src="/admin/img/avatar.png" alt="个人头像">
                                    @else
                                        <img  id="cover" class="cover-map" src="{{$adminUser->headimgurl}}" alt="个人头像">
                                    @endif
                                </div>
                                <input type="hidden" name="headimgurl" id="headimgurl"  class="layui-input" value="{{$adminUser->headimgurl}}">
                                <h3>{{$adminUser->au_realname}}</h3>
                                <h4>{{$adminUser->au_email}}</h4>
                            </div>
                            <div class="ibox-content">
                                <div class="layui-form-item">
                                    <input type="hidden" name="au_id" id="au_id"  class="layui-input" value="{{$adminUser->au_id}}">
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">登录账户</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="au_name" id="au_name" lay-verify="username" class="layui-input" value="{{$adminUser->au_name}}" disabled>
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
            <div class="col-sm-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                            <legend>简约时间线：大事记</legend>
                        </fieldset>
                        <ul class="layui-timeline">
                            @foreach ($systemNotices as $systemNotice)
                                <li class="layui-timeline-item">
                                    <i class="layui-icon layui-timeline-axis"></i>
                                    <div class="layui-timeline-content layui-text">
                                        <div class="layui-timeline-title">
                                            <span class="layui-badge">{{$systemNotice->created_at->diffForHumans()}} </span>
                                            {{$systemNotice->content}}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- 全局js -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/plugins/layui/layui.js"></script>
</body>
</html>
<script type="text/javascript" src="/admin/js/index.js"></script>
