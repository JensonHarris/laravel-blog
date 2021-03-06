@extends("home.layout.main")
@section('keywords', $article->keywords)
@section('title', $article->title)
@section("styles")
    <link rel="stylesheet" href="/home/css/share.min.css">
@endsection
@section("content")
    <div class="breadcrumbs">
        <div class="container">当前位置：
            <a href="/">JesonC博客</a><small>&gt;</small>
            <a href="/article/category/{{$article->articleCategory->id}}">{{$article->articleCategory->name}}</a> <small>&gt;</small>{{$article->title}}
        </div>
    </div>
<section class="container  single">
    <div class="content-wrap">
        <div class="content">
            <header class="article-header">
                <h1 class="article-title">
                    <a href="/article/{{$article->id}}" draggable="false">{{$article->title}}</a>
                </h1>
                <div class="article-meta"> <span class="item article-meta-time">
                      <time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="时间：{{$article->created_at}}">
                        <i class="far fa-clock"></i> {{$article->created_at}}
                    </time>
                    </span>
                    <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="来源：原创">
                        <i class="fas fa-globe-americas"></i> 原创
                    </span>
                    <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="栏目：{{$article->articleCategory->name}}">
                        <i class="fas fa-list"></i>{{$article->articleCategory->name}}
                        {{--<a href="program" title="" draggable="false">{{$article->articleCategory->name}}</a>--}}
                    </span>
                    <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="查看：{{$article->statistic->views}}">
                        <i class="far fa-eye"></i> 共{{$article->statistic->views}}人围观
                    </span>
                    <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论：0">
                        <i class="fas fa-comment-dots"></i> {{$article->ArticleComments->count()}} 评论
                    </span>

                </div>
            </header>
            <article class="article-content">
                <div class="art_content_div">
                    <div id="test-editormd">　　
                        <textarea style="display:none;" placeholder="markdown语言">{{$article->articleContent->markdown}}</textarea>
                    </div>
                </div>
                <div class="admired">
                    <div class="admired_div">
                        <div class="praise like_num" data-id="{{$article->id}}"> <i class="far fa-heart"></i>喜欢(<span id="like_num">{{$article->statistic->likes}}</span>)</div>
                        <div class="enjoy">
                            <div class="pay_show slidebottoms">
                                <div class="ps_con">
                                    <div class="ps_code">
                                        <img src="/home/images/pay/weixpay.jpg" draggable="false">
                                    </div>
                                    <div class="ps_tab"> <a data-type="2" class="active" draggable="false">微信</a>
                                        <a data-type="1" draggable="false">支付宝</a>

                                    </div> <span class="triangle"></span>

                                </div>
                            </div>赏
                        </div>
                        {{--<div id="share_box" style="display:none;">--}}
                            {{--<h1 class="share_title">分享到</h1>--}}
                            {{--<div class="social-share" data-initialized="true" style="text-align: center;" data-url="http://www.baidu.com?(要分享的链接)"  data-title="要分享的标题（可选）">--}}
                                {{--<a href="#" class="social-share-icon icon-weibo"></a>--}}
                                {{--<a href="#" class="social-share-icon icon-wechat"></a>--}}
                                {{--<a href="#" class="social-share-icon icon-qq"></a>--}}
                                {{--<a href="#" class="social-share-icon icon-qzone"></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="share">
                            <div class="fx_show slidebottoms">
                                <div class="ps_con like_num">
                                    <div class="row share-component social-share" data-initialized="true" style="text-align: center;" data-url="{{url()->full()}}"  data-title="{{$article->title}}">
                                        <a href="#" class="social-share-icon icon-weibo"></a>
                                        <a href="#" class="social-share-icon icon-qzone"></a>
                                        <a href="#" class="social-share-icon icon-qq"></a>
                                        <a href="#" class="social-share-icon icon-wechat" tabindex="-1"></a>

                                        <a href="#" class="social-share-icon icon-linkedin"></a>
                                        <a href="#" class="social-share-icon icon-facebook"></a>
                                        <a href="#" class="social-share-icon icon-google"></a>
                                        <a href="#" class="social-share-icon icon-twitter"></a>
                                    </div>
                                    <span class="triangle"></span>
                                </div>
                            </div>
                            <i class="fa fa-share-alt "></i><span class="share-article" >分享</span></div>
                    </div>
                </div>
                <div class="art_page">
                    <div class="art_page_prev">
                        @if(is_null($prev_article))
                            <a title="php数组分页" href="#" draggable="false">
                            </a>
                        @else
                            <a title="php数组分页" href="/article/{{$prev_article->id}}" draggable="false">
                                上一篇:{{$prev_article->title}}
                            </a>
                        @endif
                    </div>
                    <div class="art_page_next">
                        @if(is_null($next_article))
                            <a title="php数组分页" href="#" draggable="false">
                            </a>
                        @else
                            <a title="PHP到底有多糟糕？" href="/article/{{$next_article->id}}" draggable="false">
                                下一篇：{{$next_article->title}}
                            </a>
                        @endif
                    </div>
                </div>
                <p class="article-copyright hidden-xs">未经允许不得转载：<a href="/article/{{$article->id}}" draggable="false">JesonC博客</a> » <a href="/article/{{$article->id}}" draggable="false">{{$article->title}}</a>
                </p>
            </article>
            <div class="article-tags">标签：
                @foreach ($article->articleTags as $tag)
                <a href="/article/tag/{{$tag->id}}" rel="tag" target="_blank" title="{{$tag->name}}" draggable="false">{{$tag->name}}</a>
                @endforeach
            </div>

            <div class="title" id="comment">
                <h3>评论
                    <small>抢沙发</small>
                </h3>

            </div>
            <div id="respond">
                <form>
                    <div class="comment">
                        <div class="comment-title">
                            <img class="avatar" src="/home/images/touxiang.jpg" alt="" draggable="false">
                        </div>
                        <div>
                            <input class="comment_input comment_name" placeholder="姓名或昵称 (必填)" id="comment_name" maxlength="15" tabindex="1">
                            <input class="comment_input comment_email" placeholder="邮箱(必填,将保密)以便回复您" id="comment_email" maxlength="50" tabindex="2">
                            <input class="comment_input comment_url" placeholder="网站或博客 http://xxxx" id="comment_url" maxlength="50" tabindex="3">
                        </div>
                        <div class="comment-box">
                            <textarea placeholder="您的评论可以一针见血" name="comment" id="comment-textarea" class="comment-textarea" cols="100%" rows="3" tabindex="4"></textarea>
                            <div class="comment-ctrl"><span class="emotion sss"><img src="/home/images/face/14.png" width="20" height="20" alt="" draggable="false">表情</span>

                                <div class="comment-prompt"><i class="fa fa-spin fa-circle-o-notch"></i>  <span class="comment-prompt-text"></span>
                                </div>
                                <input type="hidden" value="{{$article->id}}" class="articleid">
                                <button type="button" id="comment-submit" class="comment-submit" tabindex="5" articleid="1" data-id="0">评论</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="postcomments">
                @foreach ($comments as $key=>$comment)
                    <ol class="commentlist">
                        <li class="comment-content">
                            <div class="comment-hf">
                                <div><span class="comment-f">#{{$key+1}}</span>
                                </div>
                                <div><a class="comm_hf_btn1" data-id="{{$comment->id}}">回复</a>
                                </div>
                            </div>
                            <div class="comment-avatar">
                                <span class="avatar nickname" id="nickname">{{$comment->nickname}}</span>
                            </div>
                            <div class="comment-main">
                                <p><a href="#" target="_blank">{{$comment->nickname}}</a><span class="time">({{$comment->created_at}})</span>
                                    <br>{!! $comment->content !!}</p>
                            </div>
                        </li>
                    </ol>
                @endforeach

                {{--<li class="comment-content comm_list">--}}
                    {{--<div class="comment-hf">--}}
                        {{--<div><span class="comment-f">#_1</span>--}}
                        {{--</div>--}}
                        {{--<div><a class="comm_hf_btn1" data-id="238">回复</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="comment-avatar"><span class="avatar">J</span>--}}
                    {{--</div>--}}
                    {{--<div class="comment-main">--}}
                        {{--<p><a href="https://www.liangjucai.com" target="_blank">Justin</a>: <span style="font-size: 12px;margin-left: 1px;"><label class="blog_comm_name">博主</label>回复</span><a style="font-size: 12px;margin-left: 1px;" href="https://www.liulangboy.com" target="_blank">六狼风情</a>--}}
                            {{--<span--}}
                                    {{--class="time">(2019-01-30 20:29:55)</span>--}}
                            {{--<br>欢迎</p>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="/home/js/jquery.qqFace.js"></script>
<script src="/plugins/markdown/lib/flowchart.min.js"></script>
<script src="/plugins/markdown/lib/jquery.flowchart.min.js"></script>
<script src="/plugins/markdown/lib/marked.min.js"></script>
<script src="/plugins/markdown/lib/prettify.min.js"></script>
<script src="/plugins/markdown/lib/raphael.min.js"></script>
<script src="/plugins/markdown/lib/underscore.min.js"></script>
<script src="/plugins/markdown/lib/sequence-diagram.min.js"></script>
<script src="/plugins/markdown/editormd.js"></script>
<script src="/home/js/social-share.min.js"></script>
<script src="/home/js/article.js"></script>
@endsection
