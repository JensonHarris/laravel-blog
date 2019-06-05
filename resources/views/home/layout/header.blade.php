<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="bjson,博客,JavaScript,PHP,laravel,数据库,mysql,ES,浏览器,thinkPHP,http,Git,搜索引擎,服务器,Linux,cookie,vue,html,PHP博客,PHP个人博客,PHP技术博客,PHP教程,数据库设计,服务器搭建,SEO优化,个人博客模板,博客模板,博客系统,技术博客,个人博客,设计模式,laravel博客">
    <meta name="description" content="bjson,博客,JavaScript,PHP,laravel,数据库,mysql,ES,浏览器,thinkPHP,http,Git,搜索引擎,服务器,Linux,cookie,vue,H5,PHP博客,PHP个人博客,PHP技术博客,PHP教程,数据库设计,服务器搭建,SEO优化,个人博客模板,博客模板,博客系统,技术博客,个人博客,设计模式,laravel博客">
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="http://lib.baomitu.com/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/home/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/home/css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico">
    <script src="http://lib.baomitu.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="/home/js/nprogress.js"></script>
    <script src="/home/js/jquery.lazyload.min.js"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?3902321fd5ebb5c29df514511ca1c300";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    @yield('styles')
</head>
<body class="user-select">
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    {{--<span class="sr-only"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                </button>
                <h1 class="logo hvr-bounce-in">
                    <a href="/" title="">
                        <img class="logo" src="/home/images/logo.png" alt="">
                    </a>
                </h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <div class="mobile-button">
                    <button type="button" class="phone navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-index  @if (!($category->id??0))
                            active @endif">
                        <a data-cont="JeosnC blog首页" href="/">首页</a>
                    </li>
                    @foreach ($navigates as $navigate)
                    <li  @if ($navigate->id == ($category->id??0))
                         class="active" @endif>
                        <a href="/article/category/{{$navigate->id}}">{{$navigate->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
