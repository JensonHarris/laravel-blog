<?php
/**
 * Created by PhpStorm.
 * Author: JesonC
 * Date: 2019/1/29
 * Time: 15:48
 */

namespace App\Http\ViewComposers\Home;

use Illuminate\View\View;
use App\Models\ArticleStatistic;

class AsideComposer
{
    public function compose(View $view)
    {
        $hotViews = ArticleStatistic::orderBy('views', 'DESC')->take(5)->get();

        $hotArticles = $hotViews->map(function ($item) {
            return $item->article;
        });

        $view->with('hotArticles' ,$hotArticles);
    }
}
