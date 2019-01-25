<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>异清轩博客</title>
    <link rel="stylesheet" type="text/css" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/home/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/home/css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" href="/home/images/icon/icon.png">
    <link rel="shortcut icon" href="/favicon.ico">
</head>
<body class="user-select">
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 class="logo hvr-bounce-in">
                    <a href="" title="">
                        <img src="/home/images/logo.png" alt="">
                    </a>
                </h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-index active">
                        <a data-cont="异清轩首页" href="index.html">首页</a>
                    </li>
                    <li>
                        <a href="category.html">PHP</a>
                    </li>
                    <li>
                        <a href="category.html">前端</a>
                    </li>
                    <li>
                        <a href="category.html">服务器</a>
                    </li>
                    <li>
                        <a href="category.html">数据库</a>
                    </li>
                    <li>
                        <a href="category.html">程序员</a>
                    </li>
                    <li>
                        <a href="category.html">资源分享</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="container">
    <div class="content-wrap">
        <div class="content">
            <div class="jumbotron">
                <h1>欢迎访问异清轩博客</h1>

                <p>在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</p>
            </div>
            <div id="focusslide" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#focusslide" data-slide-to="0" class="active"></li>
                    <li data-target="#focusslide" data-slide-to="1"></li>
                    <li data-target="#focusslide" data-slide-to="2"></li>
                    <li data-target="#focusslide" data-slide-to="3"></li>
                    <li data-target="#focusslide" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="" target="_blank">
                            <img src="/home/images/banner/banner_01.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="item">
                        <a href="" target="_blank">
                            <img src="/home/images/banner/banner_02.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="item">
                        <a href="" target="_blank">
                            <img src="/home/images/banner/banner_03.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="item active">
                        <a href="" target="_blank">
                            <img src="/home/images/banner/banner_04.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="item">
                        <a href="" target="_blank">
                            <img src="/home/images/banner/banner_05.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
                <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>  <span class="sr-only">上一个</span>

                </a>
                <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>  <span class="sr-only">下一个</span>

                </a>
            </div>
            <article class="excerpt-minic excerpt-minic-index">
                <h2><span class="red">【今日推荐】</span><a href="" title="">从下载看我们该如何做事</a></h2>

                <p class="note">一次我下载几部电影，发现如果同时下载多部要等上几个小时，然后我把最想看的做个先后排序，去设置同时只能下载一部，结果是不到一杯茶功夫我就能看到最想看的电影。 这就像我们一段时间内想干成很多事情，是同时干还是有选择有顺序的干，结果很不一样。同时...</p>
            </article>
            <div class="title">
                <h3>最新发布</h3>

            </div>
            <article class="excerpt excerpt-1">
                <a class="focus" href="/article" title="">
                    <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                </a>
                <header><a class="cat" href="program">后端程序<i></i></a>

                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>

                </header>
                <p class="meta">
                    <time class="time"><i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39</time> <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共120人围观</span>  <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a>

                </p>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ...</p>
            </article>
            <article class="excerpt excerpt-2">
                <a class="focus" href="/article" title="">
                    <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                </a>
                <header>
                    <a class="cat" href="program">后端程序<i></i></a>
                    <h2>
                        <a href="article.html" title="">php如何判断一个日期的格式是否正确</a>
                    </h2>
                </header>
                <p class="meta">
                    <time class="time">
                        <i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39
                    </time>
                    <span class="views">
                        <i class="glyphicon glyphicon-eye-open"></i> 共120人围观
                    </span>
                    <a class="comment" href="article.html#comment">
                        <i class="glyphicon glyphicon-comment"></i> 0个不明物体
                    </a>
                </p>
                <p class="note">
                    可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来验证这个日期的格式是否是正确的。所以要验证日期格式 ...
                </p>
            </article>
            <article class="excerpt excerpt-5">
                <a class="focus" href="/article" title="">
                    <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                </a>
                <header>
                    <a class="cat" href="program">后端程序<i></i></a>
                    <h2><a href="article.html" title="">php如何判断一个日期的格式是否正确</a></h2>
                </header>
                <p class="meta">
                    <time class="time">
                        <i class="glyphicon glyphicon-time"></i> 2016-1-4 10:29:39
                    </time>
                    <span class="views">
                        <i class="glyphicon glyphicon-eye-open"></i> 共120人围观
                    </span>
                    <a class="comment" href="article.html#comment">
                        <i class="glyphicon glyphicon-comment"></i> 0个不明物体
                    </a>
                </p>
                <p class="note">可以用strtotime()把日期（$date）转成时间戳，再用date()按需要验证的格式转成一个日期，来跟$date比较是否相同来
                </p>
            </article>
            <nav class="pagination" style="display: none;">
                <ul>
                    <li class="prev-page"></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="?page=2">2</a></li>
                    <li class="next-page"><a href="?page=2">下一页</a></li>
                    <li><span>共 2 页</span></li>
                </ul>
            </nav>
        </div>
    </div>
    <aside class="sidebar">
        <div class="fixed">
            <div class="widget widget-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a>
                    </li>
                    <li role="presentation">
                        <a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane notice active" id="notice">
                        <ul>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a href="" target="_blank">欢迎访问异清轩博客</a>
                            </li>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a target="_blank" href="">在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</a>
                            </li>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a target="_blank" href="">在这个小工具中最多可以调用五条</a>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane centre" id="centre">
                        <h4>需要登录才能进入会员中心</h4>
                        <p>
                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary">立即登录</a>
                            <a href="javascript:;" class="btn btn-default">现在注册</a>
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane contact" id="contact">
                        <h2>Email:<br />
                            <a href="mailto:admin@ylsat.com" data-toggle="tooltip" data-placement="bottom" >jesonc99@163.com</a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="widget widget_search">
                <form class="navbar-form" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
                        </span>
                    </div>
                </form>
            </div>文章标签</div>
        <div class="widget widget_sentence">
            <h3>每日一句</h3>
            <div class="widget-sentence-content">
                <h4>2016年01月05日星期二</h4>
                <p>Do not let what you cannot do interfere with what you can do.
                    <br />别让你不能做的事妨碍到你能做的事。（John Wooden）
                </p>
            </div>
        </div>
        <div class="widget widget_hot">
            <h3>热门文章</h3>
            <ul>
                <li>
                    <a href="">
                        <span class="thumbnail">
                            <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                        </span>
                        <span class="text">php如何判断一个日期的格式是否正确</span>
                        <span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span>
                        <span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="thumbnail">
                            <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                        </span>
                        <span class="text">php如何判断一个日期的格式是否正确</span>
                        <span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span>
                        <span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="thumbnail">
                            <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                        </span>
                        <span class="text">php如何判断一个日期的格式是否正确</span>
                        <span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span>
                        <span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="thumbnail">
                            <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                        </span>
                        <span class="text">php如何判断一个日期的格式是否正确</span>
                        <span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span>
                        <span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="thumbnail">
                            <img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt="">
                        </span>
                        <span class="text">php如何判断一个日期的格式是否正确</span>
                        <span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span>
                        <span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</section>
<footer class="footer">
    <div class="container">
        <p>© 2016 <a href="">ylsat.com</a>
            <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备18048113</a>
            <a href="sitemap.xml" target="_blank" class="sitemap">网站地图</a>
        </p>
    </div>
</footer>
<script src="/home/js/bootstrap.min.js"></script>
<script src="/home/js/jquery.ias.js"></script>
<script src="/home/js/scripts.js"></script>
<script src="/home/js/jquery-2.1.4.min.js"></script>
<script src="/home/js/nprogress.js"></script>
<script src="/home/js/jquery.lazyload.min.js"></script>
</body>

</html>