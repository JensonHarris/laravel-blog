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
use Illuminate\Support\Facades\Cache;

class HeaderComposer
{
    public function compose(View $view)
    {

        $navigates = Cache::remember('navigates', 30, function(){
            return ArticleCategory::where('parent_id', '=', 0)->where('is_nav', '=', 0)
                ->select('id', 'name')->get();
        });

        $view->with('navigates' ,$navigates);
    }
}

