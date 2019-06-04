<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Cache::remember('articles', $this->minutes, function () {
            return Article::orderBy('is_top', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        });

        return view('home.index.index',compact('articles'));
    }


}
