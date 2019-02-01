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

        <div class="widget widget_ui_tags">
            <h3>热门标签</h3>
            <div class="items">
                <a href="https://blog.quietguoguo.com/tag/cundaima" style="background:#ff5473; opacity: 0.6;">纯代码 (49)</a>
                <a href="https://blog.quietguoguo.com/tag/%e6%98%93%e7%bb%8f" style="background:#ff5473; opacity: 0.6;">易经 (32)</a>
                <a href="https://blog.quietguoguo.com/tag/%e5%9b%bd%e5%ad%a6" style="background:#3366FF; opacity: 0.6;">国学 (32)</a>
                <a href="https://blog.quietguoguo.com/tag/wordpress-plugins" style="background:#df27ea; opacity: 0.6;">WordPress插件 (19)</a>
                <a href="https://blog.quietguoguo.com/tag/topic-modification" style="background:#8e7daa; opacity: 0.6;">主题修改 (19)</a>
                <a href="https://blog.quietguoguo.com/tag/wordpress%e5%ad%a6%e4%b9%a0" style="background:#31ac76; opacity: 0.6;">WordPress学习 (15)</a><a href="https://blog.quietguoguo.com/tag/css" style="background:#f85200; opacity: 0.6;">CSS (13)</a>
                <a href="https://blog.quietguoguo.com/tag/javascript" style="background:#f99f13; opacity: 0.6;">JavaScript (13)</a>
                <a href="https://blog.quietguoguo.com/tag/php" style="background:#31a6a0; opacity: 0.6;">PHP (12)</a>
                <a href="https://blog.quietguoguo.com/tag/dux" style="background:#df27ea; opacity: 0.6;">DUX (12)</a>
                <a href="https://blog.quietguoguo.com/tag/u-s-a" style="background:#f85200; opacity: 0.6;">美国 (10)</a>
                <a href="https://blog.quietguoguo.com/tag/wordpress%e5%87%bd%e6%95%b0" style="background:#27ea80; opacity: 0.6;">WordPress函数 (10)</a>
               </div>
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
