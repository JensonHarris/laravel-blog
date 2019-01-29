<?php
/**
 * Created by PhpStorm.
 * Author: JesonC
 * Date: 2019/1/29
 * Time: 15:44
 */

namespace App\Http\ViewComposers\Home;

use Illuminate\View\View;
use App\Models\ArticleCategory;

class HeaderComposers
{
    public function compose(View $view)
    {
        $navigates = ArticleCategory::all();
        $view->with('navigates' ,$navigates);
    }
}
