
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>角色管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
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
            <b>编辑角色</b>
        </blockquote>
    </div>
    <div class="ibox float-e-margins">
        <div class="ibox-content ">
            <div class="layui-row">
                <form class="layui-form layui-form-pane layui-col-md6 layui-col-md-offset1">
                    <input type="hidden" name="ar_id" id="ar_id"  class="layui-input" value="{{$adminRole->ar_id}}">
                    <div class="layui-form-item">
                        <label class="layui-form-label">角色名称</label>
                        <div class="layui-input-block">
                            <input type="text" name="ar_name" id="ar_name" value="{{$adminRole->ar_name}}" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">角色描述</label>
                        <div class="layui-input-block">
                            <textarea name="ar_description" id="ar_description" class="layui-textarea">{{$adminRole->ar_description}}</textarea>
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
                                <ul id="menubarTree" class="dtree" data-id="0"></ul>
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
                            <button class="layui-btn" lay-submit="" lay-filter="edit">保存</button>
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
<script type="text/javascript" src="/admin/ajs/roleedit.js"></script>
