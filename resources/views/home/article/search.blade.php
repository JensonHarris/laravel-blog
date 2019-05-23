@extends("home.layout.main")
@section('title', 'JesonC博客')
@section("content")
    <section class="container">
        <div class="content-wrap">
            <div class="content">
                <div class="jumbotron">
                    <h1>欢迎访问落葉憂傷博客</h1>
                    <p>在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</p>
                </div>
                <div class="catleader">
                    <form class="bs-example bs-example-form" role="form" action="/search" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" name="keyword" value="{{$keyword}}">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" name="search" type="submit">
                                        Go!
                                    </button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="title">
                <span style="margin-top: 35px;margin-bottom: 5px;color: #818488ee;">
                    共搜索到关于
                    <span class="search">{{$keyword}}</span>的
                    <span class="search">{{$articles->total()}}</span>
                    条记录：
                </span>
                </div>

                @foreach ($articles as $article)
                    <article class="excerpt">
                        <a class="focus" href="/article/{{$article->id}}" target="_blank" onclick = "pageViews({{$article->id}})">
                            <img class="thumb" src="{{$article->cover_map}}">
                        </a>

                        <header>
                            <a class="cat" href="/article/category/{{$article->articleCategory->id}}" target="_blank">
                                {{$article->articleCategory->name}}<i></i>
                            </a>
                            <h2>
                                <a href="/article/{{$article->id}}" target="_blank">{{$article->title}}</a>
                            </h2>
                            @if(!$article->is_top )
                                <img src="/home/images/top.png" class="sticky" >
                            @endif
                        </header>
                        <p class="meta">
                            <time class="time">
                                <i class="far fa-clock"></i>
                                {{$article->created_at->toDateString()}}
                            </time>
                            <span class="views">
            <i class="fas fa-user-secret"></i>&nbsp;
                                {{$article->author}}
          </span>
                            <span class="views">
            <i class="fas fa-eye"></i>
           阅读(<span>{{$article->statistic->views}}</span>)
          </span>
                            <a class="comment" href="javascript:;">
                                <i class="fas fa-comment-dots"></i>
                                评论(<span>{{$article->ArticleComments->count()}}</span>)
                            </a>
                            <a href="javascript:;"  class="post-like" >
                                <i class="far fa-thumbs-up"></i>赞(<span>{{$article->statistic->likes}}</span>)
                            </a>
                        </p>
                        <p class="note">
                            {!! str_limit($article->description, 200, '...') !!}
                        </p>
                    </article>
                    @endforeach
                    </article>
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

