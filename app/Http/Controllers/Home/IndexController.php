<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->get('page',1);

        $articles = Cache::remember('articles-page'.$page, $this->minutes, function () {
            return Article::orderBy('is_top', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        });

        return view('home.index.index',compact('articles'));
    }


}
