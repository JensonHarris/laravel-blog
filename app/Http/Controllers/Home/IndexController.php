<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles    =  Article::orderBy('is_top', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);

        return view('home.index.index',compact('articles'));
    }


}
