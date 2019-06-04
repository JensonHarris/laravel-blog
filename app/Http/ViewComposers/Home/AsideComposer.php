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
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleStatistic;
use Illuminate\Support\Facades\Cache;

class AsideComposer
{
    public function compose(View $view)
    {

        //热门文章
        $hotArticles = Cache::remember('hotArticles', 30, function(){

            $hotViews = ArticleStatistic::orderBy('views', 'DESC')->take(5)->get();

            return $hotArticle = $hotViews->map(function ($item) {
                return $item->article;
            });
        });


        //文章标签
        $articleTags = Cache::remember('articleTags', 30, function(){
            return Tag::has('articles')->select('id', 'name')->withCount('articles')->get();
        });


        //网站公告
        $siteNotices = Cache::remember('siteNotices', 30, function(){

            $categoryId = ArticleCategory::where('name', '网站公告')->first(['id']);
            if($categoryId){
                $siteNotice =  Article::where('category_id',$categoryId->id)->orderBy('is_top', 'ASC')->orderBy('created_at', 'DESC')->paginate(5);
            }else{
                $siteNotice = '';
            }

            return $siteNotice;
        });



        $view->with(['hotArticles' =>$hotArticles, 'articleTags'=>$articleTags, 'siteNotices'=>$siteNotices]);
    }
}
