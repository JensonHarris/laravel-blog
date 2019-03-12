<?php
/**
 * Created by PhpStorm.
 * Author: JesonC
 * Date: 2019/1/29
 * Time: 15:48
 */

namespace App\Http\ViewComposers\Home;

use Illuminate\View\View;
use App\Models\Tag;
use App\Models\ArticleStatistic;


class AsideComposer
{
    public function compose(View $view)
    {
        //热门文章
        $hotViews = ArticleStatistic::orderBy('views', 'DESC')->take(5)->get();

        $hotArticles = $hotViews->map(function ($item) {
            return $item->article;
        });

        //文章标签
        $articleTags = Tag::has('articles')->select('id', 'name')->withCount('articles')->get();

        //网站公告
//        $siteNotices = ArticleCategory::where('parent_id', '=', 0)->where('is_nav', '=', 0)->get();

        $view->with(['hotArticles' =>$hotArticles, 'articleTags'=>$articleTags]);
    }
}
