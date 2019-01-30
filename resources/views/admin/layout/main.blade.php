<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">--}}
    {{--<meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">--}}
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link href="/admin/plugins/layui/css/layui.css" rel="stylesheet">
    <link href="/admin/css/style.css?v=4.1.0" rel="stylesheet">
     @yield('styles')
</head>
<body class="gray-bg bg-success">
<div class="wrapper wrapper-content animated fadeInRight">
    @yield("content")
</div>
</body>
</html>
<script src="/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/admin/js/content.js?v=1.0.0"></script>
<script src="/admin/plugins/layui/layui.js" charset="utf-8"></script>
@yield('scripts')
