@extends("home.layout.main")
@section('title', 'JsonC博客')
@section("content")
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

@endsection
@section('scripts')
@endsection
