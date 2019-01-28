<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>异清轩博客文章页面</title>
    <link href="/plugins/markdown/css/editormd.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/home/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/home/css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" href="/home/images/icon/icon.png">
    <link rel="shortcut icon" href="/favicon.ico">
    <script src="/home/js/jquery-2.1.4.min.js"></script>
    <script src="/home/js/nprogress.js"></script>
    <script src="/home/js/jquery.lazyload.min.js"></script>
</head>

<body class="user-select single">
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span>
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
                        <i class="fas fa-list"></i>
                        <a href="program" title="" draggable="false">{{$article->articleCategory->name}}</a>
                    </span>
                    <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="查看：{{$article->statistic->views}}">
                        <i class="far fa-eye"></i> 共{{$article->statistic->views}}人围观
                    </span>
                    <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论：0">
                        <i class="fas fa-comment-alt"></i> 0个不明物体
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
                        <div class="praise"> <i class="far fa-heart"></i>喜欢(<span id="like_num">0</span>)</div>
                        <div class="enjoy">
                            <div class="pay_show slidebottoms">
                                <div class="ps_con">
                                    <div class="ps_code">
                                        <img src="https://www.liangjucai.com/wx_skm.png" draggable="false">
                                    </div>
                                    <div class="ps_tab"> <a data-type="2" class="active" draggable="false">微信</a>
                                        <a data-type="1" draggable="false">支付宝</a>

                                    </div> <span class="triangle"></span>

                                </div>
                            </div>赏</div>
                        <div class="share">
                            <div class="fx_show slidebottoms">
                                <div class="ps_con">
                                    <div class="row share-component social-share" id="share-2">
                                        <a class="social-share-icon icon-qzone" href=" " target="_blank"></a>
                                        <a class="social-share-icon icon-qq" href="" target="_blank"></a>
                                        <a class="social-share-icon icon-weibo" href="" target="_blank"></a>
                                        <a class="social-share-icon icon-wechat" href="javascript:;" tabindex="-1">
                                            {{--<div class="wechat-qrcode">--}}
                                                {{--<h4>微信扫一扫：分享</h4>--}}
                                                {{--<div class="qrcode">--}}
                                                    {{--<img src="">--}}
                                                {{--</div>--}}
                                                {{--<div class="help">--}}
                                                    {{--<p>微信点“+”，扫一扫</p>--}}
                                                    {{--<p>右上角“...”分享到朋友圈</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </a>
                                    </div> <span class="triangle"></span>

                                </div>
                            </div> <i class="fa fa-share-alt"></i>分享</div>
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
                <p class="article-copyright hidden-xs">未经允许不得转载：<a href="https://www.liangjucai.com/article/340" draggable="false">JesonC博客</a> » <a href="https://www.liangjucai.com/article/340" draggable="false">{{$article->title}}</a>
                </p>
            </article>
            <div class="article-tags">标签：
                @foreach ($article->articleTags as $tag)
                <a href="/tagsList/{{$tag->id}}" rel="tag" target="_blank" title="{{$tag->name}}" draggable="false">{{$tag->name}}</a>
                @endforeach
            </div>
            <div class="relates">
                <div class="title">
                    <h3>好文推荐</h3>
                </div>
                <ul>
                    <li>
                        <a href="https://www.liangjucai.com/article/142" target="_blank" title="程序员为什么不爱炫富？" draggable="false">程序员为什么不爱炫富？</a>
                    </li>
                    <li>
                        <a href="https://www.liangjucai.com/article/255" target="_blank" title="生活，不会亏待努力奋斗的人" draggable="false">生活，不会亏待努力奋斗的人</a>
                    </li>
                </ul>
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
                            <img class="avatar" src="https://www.liangjucai.com/Index//home/images/touxiang.jpg" alt="" draggable="false">
                        </div>
                        <div>
                            <input class="comment_input comment_name" placeholder="姓名或昵称 (必填)" id="comment_name" maxlength="15" tabindex="1">
                            <input class="comment_input comment_email" placeholder="邮箱(必填,将保密)以便回复您" id="comment_email" maxlength="50" tabindex="2">
                            <input class="comment_input comment_url" placeholder="网站或博客 http://xxxx" id="comment_url" maxlength="50" tabindex="3">
                        </div>
                        <div class="comment-box">
                            <textarea placeholder="您的评论可以一针见血" name="comment" id="comment-textarea" class="comment-textarea" cols="100%" rows="3" tabindex="4"></textarea>
                            <div class="comment-ctrl"><span class="emotion sss"><img src="https://www.liangjucai.com/Index//home/images/face/5.png" width="20" height="20" alt="" draggable="false">表情</span>

                                <div class="comment-prompt"><i class="fa fa-spin fa-circle-o-notch"></i>  <span class="comment-prompt-text"></span>
                                </div>
                                <input type="hidden" value="1" class="articleid">
                                <button type="button" name="comment-submit" class="comment-submit" tabindex="5" articleid="1" data-id="0">评论</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="postcomments"></div>
        </div>
    </div>
    <aside class="sidebar">
        <div class="fixed">
            <div class="widget widget_sentence">
                <h3>个人简介</h3>

                <div class="widget-sentence-content">
                    <div class="lyb_info_img">
                        <img src="/home/images/jesonC.jpg" draggable="false">
                    </div>
                    <div class="lyb_info_name"> <span>JensonC</span>

                    </div>
                    <div class="lyb_info_info"> <span>——————   个人简介   ——————</span>

                    </div>
                    <div class="lyb_info_content">
                        <div class="conte_title"> <span class="conte_title1">姓名:</span>  <span>程铖</span>

                        </div>
                        <div class="conte_title"> <span class="conte_title1">职业:</span>  <span>PHP开发工程师</span>

                        </div>
                        <div class="conte_title"> <span class="conte_title1">现居:</span>  <span>广州市•天河区</span>

                        </div>
                        <div class="conte_title"> <span class="conte_title1">描述:</span>  <span>一个没有PHP天赋的PHP程序员。</span>

                        </div>
                    </div>
                    <div class="lyb_info_info"> <span>——————     联系我     ——————</span>

                    </div>
                    <div class="lyb_info_content">
                        <div class="lyb_info_ewx">
                            <img src="/home/images/weixin.jpg" draggable="false">
                        </div>
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
                    <br />别让你不能做的事妨碍到你能做的事。（John Wooden）</p>
            </div>
        </div>
        <div class="widget widget_hot">
            <h3>热门文章</h3>

            <ul>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a>
                </li>
                <li><a href=""><span class="thumbnail"><img class="thumb" data-original="/home/images/excerpt.jpg" src="/home/images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a>
                </li>
            </ul>
        </div>
    </aside>
</section>
<footer class="footer">
    <div class="container">
        <p>© 2016 <a href="">ylsat.com</a>   <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">豫ICP备20151109-1</a>   <a href="sitemap.xml" target="_blank" class="sitemap">网站地图</a>
        </p>
    </div>
    <div id="gotop">
        <a class="gotop"></a>
    </div>
</footer>
<script src="/home/js/bootstrap.min.js"></script>
<script src="/home/js/jquery.ias.js"></script>
<script src="/home/js/scripts.js"></script>
<script src="/home/js/jquery.qqFace.js"></script>
<script type="text/javascript">
    $(function() {
        $('.emotion').qqFace({
            id: 'facebox',
            assign: 'comment-textarea',
            path: '/home/images/arclist/' //表情存放的路径
        });
    });

    $(".ps_tab a").click(function() {
        $(".ps_tab a").removeClass('active');
        $(this).addClass('active');
        if ($(this).attr('data-type') == 1) {
            $(".ps_code img").attr('src', "https://www.liangjucai.com/zfb_skm.png");
        } else {
            $(".ps_code img").attr('src', "https://www.liangjucai.com/wx_skm.png");
        }
    });

    $(".praise").click(function() {
        $.post("https://www.liangjucai.com/articleLike", {
            'id': "340"
        }, function(res) {
            if (res.code == 200) {
                layer.msg('大爷:) 点赞成功~', {
                    time: 1200
                });
                $("#like_num").html(parseInt($("#like_num").html()) + 1);
            } else {
                layer.msg('大爷:(  ' + res.message, {
                    time: 1200
                });
            }
        }, 'json');
    });
</script>
</body>

</html>
<script src="/plugins/markdown/lib/flowchart.min.js"></script>
<script src="/plugins/markdown/lib/jquery.flowchart.min.js"></script>
<script src="/plugins/markdown/lib/marked.min.js"></script>
<script src="/plugins/markdown/lib/prettify.min.js"></script>
<script src="/plugins/markdown/lib/raphael.min.js"></script>
<script src="/plugins/markdown/lib/underscore.min.js"></script>
<script src="/plugins/markdown/lib/sequence-diagram.min.js"></script>
<script src="/plugins/markdown/editormd.js"></script>
<script>
    editormd.markdownToHTML("test-editormd", {
        htmlDecode: "style,script,iframe",
        emoji: true,
        taskList: true,
        tex: true, // 默认不解析
        flowChart: true, // 默认不解析
        sequenceDiagram: true // 默认不解析
    });
</script>
