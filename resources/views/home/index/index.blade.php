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
  <link rel="shortcut icon" href="/favicon.ico">
  <script src="/home/js/jquery-2.1.4.min.js"></script>
  <script src="/home/js/nprogress.js"></script>
  <script src="/home/js/jquery.lazyload.min.js"></script>
</head>

<body class="user-select">
<header class="header">
  <nav class="navbar navbar-default" id="navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span>  <span class="icon-bar"></span>  <span class="icon-bar"></span>  <span class="icon-bar"></span>
        </button>
        <h1 class="logo hvr-bounce-in"><a href="" title=""><img src="/home/images/logo.png" alt=""></a></h1>

      </div>
      <div class="collapse navbar-collapse" id="header-navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-index active"><a data-cont="异清轩首页" href="index.html">首页</a>
          </li>
          <li><a href="category.html">PHP</a>
          </li>
          <li><a href="category.html">前端</a>
          </li>
          <li><a href="category.html">服务器</a>
          </li>
          <li><a href="category.html">数据库</a>
          </li>
          <li><a href="category.html">程序员</a>
          </li>
          <li><a href="category.html">资源分享</a>
          </li>
        </ul>
        <form class="navbar-form visible-xs" action="/Search" method="post">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off"> <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span>
          </div>
        </form>
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
        <a class="left carousel-control middle" href="#focusslide" role="button" data-slide="prev" rel="nofollow">
         <i class="fas fa-angle-left fa-lg"></i>
          <span class="sr-only">上一个</span>
        </a>
        <a class="right carousel-control middle" href="#focusslide" role="button" data-slide="next" rel="nofollow">
          <i class="fas fa-angle-right fa-lg"></i>
          <span class="sr-only">下一个</span>
        </a>
      </div>
      <article class="excerpt-minic excerpt-minic-index">
        <h2><span class="red">【今日推荐】</span><a href="" title="">从下载看我们该如何做事</a></h2>

        <p class="note">一次我下载几部电影，发现如果同时下载多部要等上几个小时，然后我把最想看的做个先后排序，去设置同时只能下载一部，结果是不到一杯茶功夫我就能看到最想看的电影。 这就像我们一段时间内想干成很多事情，是同时干还是有选择有顺序的干，结果很不一样。同时...</p>
      </article>
      <div class="title">
        <h3>最新发布</h3>

      </div>
      @foreach ($articles as $article)
      <article class="excerpt">
        <a class="focus" href="/article/{{$article->id}}" target="_blank">
          <img class="thumb" src="{{$article->cover_map}}">
        </a>
        <header>
          <a class="cat" href="#" target="_blank">{{$article->articleCategory->name}}<i></i></a>
          <h2>
            <a href="/article/{{$article->id}}" target="_blank">{{$article->title}}</a>
          </h2>
        </header>
        <p class="meta">
          <span class="views">
            <i class="fas fa-user-secret"></i>&nbsp;
             {{$article->author}}
          </span>
          <time class="time">
            <i class="far fa-clock"></i>
            {{$article->created_at}}
          </time>
          <span class="views">
            <i class="fas fa-eye"></i>
            共 {{$article->statistic->views}}人围观
          </span>
          <a class="comment" href="article.html#comment">
           <i class="fas fa-comment-alt"></i> 0个不明物体
          </a>
        </p>
        <p class="note">
          {!! str_limit($article->description, 200, '...') !!}
        </p>
      </article>
      @endforeach
      <nav class="pagination">
        {{ $articles->links() }}
        <ul>
          <li><span>共  {{ $articles->lastPage() }} 页</span>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <aside class="sidebar">
    <div class="fixed">
      <div class="widget widget-tabs">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a>
          </li>
          <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a>
          </li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane notice active" id="notice">
            <ul>
              <li>
                <time datetime="2016-01-04">01-04</time> <a href="" target="_blank">欢迎访问异清轩博客</a>
              </li>
              <li>
                <time datetime="2016-01-04">01-04</time> <a target="_blank" href="">在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</a>
              </li>
              <li>
                <time datetime="2016-01-04">01-04</time> <a target="_blank" href="">在这个小工具中最多可以调用五条</a>
              </li>
            </ul>
          </div>
          <div role="tabpanel" class="tab-pane contact" id="contact">
            <h2>Email:<br />
              <a href="mailto:admin@ylsat.com" data-toggle="tooltip" data-placement="bottom" title="admin@ylsat.com">
                jesonc99@163.com
              </a>
            </h2>
          </div>
        </div>
      </div>
      <div class="widget widget_search">
        <form class="navbar-form" action="/Search" method="post">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off"> <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <div class="widget widget_sentence">
      <h3>每日一句</h3>
      <div class="widget-sentence-content">
        <h4>2016年01月05日星期二</h4>
        <p>Do not let what you cannot do interfere with what you can do.
          <br />别让你不能做的事妨碍到你能做的事。（John Wooden）
        </p>
      </div>
    </div>

    <div class="widget widget_sentence">
      <h3>热门标签</h3>
      <div class="widget-sentence-content">
       iiiiiiiiiii
      </div>
    </div>

    <div class="widget widget_hot">
      <h3>热门文章</h3>
      <ul>
        @foreach ($hotArticles as $hotArticle)
        <li>
          <a href="/article/{{$hotArticle->id}}">
            <span class="thumbnail">
              <img class="thumb"  src="{{$hotArticle->cover_map}}">
            </span>
            <span class="text">{{$hotArticle->title}}</span>
            <span class="muted">
              <i class="far fa-clock"></i>{{$hotArticle->created_at->toDateString()}}
            </span>
            <span class="muted"><i class="fas fa-eye"></i> {{$hotArticle->statistic->views}}
            </span>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
  </aside>
</section>
<footer class="footer">
  <div class="container">
    <p>© 2018 <a href="">bjson.cn</a>   <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备18048113</a>
    </p>
  </div>
</footer>
<script src="/home/js/bootstrap.min.js"></script>
<script src="/home/js/jquery.ias.js"></script>
<script src="/home/js/scripts.js"></script>
</body>
</html>
