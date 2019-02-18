<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\ArticleComment;
use App\Models\ArticleCategory;
use App\Models\ArticleStatistic;

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
     * Notes : 文章搜索
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/12 16:19
     */
    public function search(Request $request, Article $article)
    {
        $keyword =  $request->input('keyword');
        $articleIds =  $article->searchArticleGetId($keyword);
        $articles    = Article::whereIn('id',$articleIds)->orderBy('is_top', 'ASC')->orderBy('created_at', 'DESC')->paginate(10);
        return view('home.article.search',compact('articles', 'keyword'));

    }

    /**
     * Notes :  文章点赞
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/18 10:59
     */
    public function articleLike(Request $request)
    {
        $article_id =  $request->input('article_id');
        $result = ArticleStatistic::where('article_id', '=', $article_id)->increment('likes');;
        if ($result){
            $likes = ArticleStatistic::where('article_id', '=', $article_id)->first();
            return $this->success(20006,$likes);
        }
        return $this->error(40005);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, ArticleComment $articleComment)
    {
        $content  = $request->input();
        $result = $articleComment->create($content);
        if ($result){
            return $this->success(20007);
        }
        return $this->error(40005);
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
