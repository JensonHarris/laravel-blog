<?php
/**
 * Created by PhpStorm.
 * Author: JesonC
 * Date: 2019/2/1
 * Time: 16:55
 */

namespace App\Http\ViewComposers\Home;

use Illuminate\View\View;
use App\Models\ArticleCategory;

class HeaderComposer
{
    public function compose(View $view)
    {
        $navigates = ArticleCategory::where('parent_id', '=', 0)->get();
        $view->with('navigates' ,$navigates);
    }
}

