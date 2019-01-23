<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminRole;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArticleContent;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Article\Store;

class ArticleController extends Controller
{
    /**
     * Notes : 文章列表页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:19
     */
    public function index()
    {
        return view('admin.article.index');
    }


    public function jsonData(Request $request)
    {
        $limit = $request->input('limit','10');
        $articles  = Article::paginate($limit);
        return $this->success('200',$articles);
    }
    /**
     * Notes : 文章创建页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:20
     */
    public function create()
    {
        $tags      = Tag::all();
        $categoryData = ArticleCategory::all();
        $categorys    =  arrayLevel($categoryData,'id','parent_id');
        return view('admin.article.create',compact('tags','categorys'));
    }

    /**
     * Notes : 文章创建逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:22
     * @param Store $request
     * @param Article $article
     */
    public function store(Store $request,Article $article)
    {
        $articlesData  = $request->except('file');
        $tagIds        =  array_pull($articlesData, 'tag_ids');
        $markdown      =  array_pull($articlesData,'markdown');
        DB::beginTransaction();
        try {
            $articleResult = $article->create($articlesData);

            $contentDate = [
                'article_id' => $articleResult->id,
                'markdown' => $markdown
            ];
            $content = ArticleContent::create($contentDate);

            $tags = [];
            foreach ($tagIds as $key => $tagid) {
                $tags[$key]['tag_id'] = $tagid;
                $tags[$key]['article_id'] = $articleResult->id;
            }
            $tag = ArticleTag::insert($tags);
            DB::commit();
            return $this->success(20002);
        } catch (\Exception $e){
            DB::rollBack();
            return   $e->getMessage();
            return $this->error(40002);
        }
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
     * Notes : 文章编辑页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:22
     * @param Article $article
     */
    public function edit(Article $article)
    {
        $tags      = Tag::all();
        $categoryData = ArticleCategory::all();
        $categorys    =  arrayLevel($categoryData,'id','parent_id');
        $article_tags =  $article->articleTags->toArray();
        return view('admin.article.edit',compact('article','tags','categorys','article_tags'));
    }

    /**
     * Notes : 文章编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:22
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Notes : 文章删除逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:23
     * @param $id
     */
    public function destroy($id)
    {
        //
    }

}
