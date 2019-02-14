<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title>JesonC blog后台</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close">
                <i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="{{$adminUser->headimgurl}}" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">{{$adminUser->au_name}}</strong></span>
                                <span class="text-muted text-xs block">{{$adminRole[0]}}<b class="caret text-primary"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                {{--<li><a class="J_menuItem" href="form_avatar.html">修改头像</a>--}}
                                {{--</li>--}}
                                <li><a class="J_menuItem" href="/admin/profile">个人资料</a>
                                </li>
                                {{--<li><a class="J_menuItem" href="contacts.html">联系我们</a>--}}
                                {{--</li>--}}
                                {{--<li><a class="J_menuItem" href="mailbox.html">信箱</a>--}}
                                {{--</li>--}}
                                <li class="divider"></li>
                                <li><a href="{{url('/admin/logout')}}">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    <li>
                        <a class="J_menuItem" href="{{url('/admin/charts')}}">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">后台首页</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-lock"></i>
                            <span class="nav-label">权限管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{url('/admin/permission')}}">
                                    <i class="fa fa-key"></i>
                                    <span class="nav-label">权限列表</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-user-circle" ></i>
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{url('/admin/user')}}">
                                    <i class="fas fa-user-lock"></i>
                                    <span class="nav-label"> 管理员列表</span>
                                </a>
                            </li>
                            <li>
                                <a  class="J_menuItem" href="{{'/admin/role'}}">
                                    <i class="fas fa-user-secret"></i>
                                    <span class="nav-label">角色列表</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="fa fa-user"></i>--}}
                            {{--<span class="nav-label">会员管理</span>--}}
                            {{--<span class="fa arrow"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a class="J_menuItem" href="{{'/admin/member'}}">--}}
                                    {{--<i class="fa fa-user"></i>--}}
                                    {{--<span class="nav-label">会员列表</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li>
                        <a href="#">
                            <i class="fa fa-th-large"></i>
                            <span class="nav-label">分类管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{'/admin/category'}}">
                                    <i class="fa fa-th-list"></i>
                                    <span>分类列表</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-tags" ></i>
                            <span class="nav-label">标签管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{'/admin/tag'}}" >
                                    <i class="fa fa-tag"></i>
                                    <span>标签列表</span>
                                </a>
                            </li>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span class="nav-label">文章管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="{{url('/admin/article')}}" >
                                <i class="fas fa-book-open"></i>
                                <span>文章列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-comments" ></i>
                        <span class="nav-label">评论管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="{{'/admin/comment'}}">
                                <i class="fa fa-edit"></i>
                                <span>评论列表</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cog fa-spin"></i>
                        <span class="nav-label">日志管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="../systems/list.html">
                                系统列表
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="{{url('/admin/charts')}}">
                                订单统计
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cog fa-spin"></i>
                        <span class="nav-label">系统设置</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="../systems/list.html">
                                系统列表
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="../users/fromtest.html">
                                订单统计
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="/admin/clear">
                            <i class="fa fa-spin fa-sync-alt"></i>清除缓存
                        </a>
                    </li>
                    <li>
                        <a href="/">
                            <i class="fa fa-home"></i>前台
                        </a>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a class="right-sidebar-toggle" aria-expanded="false">
                            <i class="fa fa-tasks"></i> 主题
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="{{url('/admin/charts')}}">后台首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>
                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="{{url('/admin/logout')}}" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <!--首页部分-->
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="{{url('/admin/charts')}}"frameborder="0" data-id="{{url('/admin/charts')}}" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right">&copy; 2018-2019 <a href="#">Jeson'C blog</a>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar">
        <div class="sidebar-container">
            <ul class="nav nav-tabs navs-3">
                <li class="active">
                    <a data-toggle="tab" href="#tab-1">
                        <i class="fa fa-gear"></i> 主题
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="skin-setttings">
                        <div class="title">主题设置</div>
                        <div class="setings-item">
                            <span>收起左侧菜单</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                    <label class="onoffswitch-label" for="collapsemenu">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>固定顶部</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                    <label class="onoffswitch-label" for="fixednavbar">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                                固定宽度
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                    <label class="onoffswitch-label" for="boxedlayout">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="title">皮肤选择</div>
                        <div class="setings-item default-skin nb">
                            <span class="skin-name ">
                                <a href="#" class="s-skin-0">
                                    默认皮肤
                                </a>
                            </span>
                        </div>
                        <div class="setings-item blue-skin nb">
                            <span class="skin-name ">
                                <a href="#" class="s-skin-1">
                                    蓝色主题
                                </a>
                            </span>
                        </div>
                        <div class="setings-item yellow-skin nb">
                            <span class="skin-name ">
                                <a href="#" class="s-skin-3">
                                    黄色/紫色主题
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--右侧边栏结束-->
</div>
</body>
</html>
<!-- 全局js -->
<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/admin/js/plugins/layer/layer.min.js"></script>
<!-- 自定义js -->
<script src="/admin/js/hplus.js?v=4.1.0"></script>
<script type="text/javascript" src="/admin/js/contabs.js"></script>
<script>
</script>
