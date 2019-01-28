<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\ArticleStatistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles    =  Article::orderBy('created_at', 'DESC')->paginate(10);
        $hotArticles =  $this->hotArticles();

        return view('home.index.index',compact('articles' ,'hotArticles'));
    }

    /**
     * Notes : 热门文章推荐
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/28 11:21
     * @return mixed
     */
    public function hotArticles()
    {
        $hotViews = ArticleStatistic::orderBy('views', 'DESC')->take(5)->get();

        return  $hotArticles = $hotViews->map(function ($item) {
            return $item->article;
        });

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
