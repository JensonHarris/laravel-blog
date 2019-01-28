<?php
/**
 * Created by PhpStorm.
 * Author: JesonC
 * Date: 2019/1/28
 * Time: 16:47
 */

namespace App\Http\ViewComposers;

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
