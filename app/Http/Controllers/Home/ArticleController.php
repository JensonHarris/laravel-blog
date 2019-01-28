<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\ArticleContent;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $id =  $article->id;
        // 上一篇文章
        $prev_article = $this->getPrevArticle($id);
        // 下一篇文章
        $next_article = $this->getNextArticle($id);

        return view('home.article.index',compact('article', 'prev_article', 'next_article'));
    }


    /**
     * Notes : 上一篇文章
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/28 14:34
     * @param $id
     */
    protected function getPrevArticle($id)
    {
        return Article::find(Article::where('id', '<', $id)->max('id'));
    }

    /**
     * Notes : 下一篇文章
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/28 14:34
     * @param $id
     */
    protected function getNextArticle($id)
    {
        return Article::find(Article::where('id', '>', $id)->min('id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('home.article.search');
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
