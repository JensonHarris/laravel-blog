<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\ArticleCategory;
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
     * Notes : 分类文章
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/2 14:39
     */
    public function categoryArticles($id, ArticleCategory $articleCategory)
    {
        $category   =  $articleCategory->find($id);
        $categoryIds = $articleCategory->getCategories($id);
        $articles    = Article::whereIn('category_id',$categoryIds)->orderBy('is_top', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        return view('home.article.category',compact('articles', 'category'));
    }

    /**
     * Notes : 标签文章
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/2 15:52
     */
    public function tagArticles(Tag $tag)
    {
        $articles  = $tag->articles()->orderBy('is_top', 'ASC')->orderBy('created_at', 'DESC')->paginate();

        return view('home.article.tag',compact('articles', 'tag'));
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
