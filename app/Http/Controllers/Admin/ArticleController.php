<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticleComment;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArticleContent;
use App\Models\ArticleCategory;
use App\Models\ArticleStatistic;
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


    /**
     * Notes :文章类表数据
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/30 14:32
     * @param Request $request
     */
    public function jsonData(Request $request, Article $article)
    {
        $limit = $request->input('limit','10');
        $articles  = $article->articles($limit);
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
    public function store(Store $request, Article $article)
    {
        $articlesData  = $request->except('file');
        $tagIds        =  array_pull($articlesData, 'tag_ids');
        $markdown      =  array_pull($articlesData,'markdown');
        if (!isset($articlesData['editormd-image-file'])) {
            array_pull($articlesData,'editormd-image-file');
        }
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
            $statisticData =  ['article_id'=>$articleResult->id];
            $statistic = ArticleStatistic::insert($statisticData);
            DB::commit();
            return $this->success(20002);
        } catch (\Exception $e){
           return $e->getMessage();
            DB::rollBack();
            return $this->error(40002);
        }
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
        $article_tags =  $article->articleTags->pluck('id')->toArray();
        $content      =  $article->articleContent;
        return view('admin.article.edit',compact('article', 'tags', 'categorys', 'article_tags', 'content'));
    }

    /**
     * Notes : 文章编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:22
     * @param Request $request
     * @param $id
     */
    public function update(Store $request, Article $article)
    {
        $articlesData  =  $request->except('file');
        $tagIds        =  array_pull($articlesData, 'tag_ids');
        $markdown      =  array_pull($articlesData,'markdown');
        $content_id    =  array_pull($articlesData,'content_id');
        $contentDate   =  ['markdown' => $markdown];
        //更新文章
        DB::beginTransaction();
        try {
            $articleResult = $article->where(['id' => $articlesData['id']])->update($articlesData);
            $contentResult = ArticleContent::where(['id'=> $content_id])->update($contentDate);
            $delete =  ArticleTag::where('article_id', '=', $articlesData['id'])->delete();
            if ($delete){
                $tags = [];
                foreach ($tagIds as $key => $tagid) {
                    $tags[$key]['tag_id'] = $tagid;
                    $tags[$key]['article_id'] = $articlesData['id'];
                }
                $tag = ArticleTag::insert($tags);
                DB::commit();
                return $this->success(20004);
            }
            return $this->error(40004);
        } catch (\Exception $e){
//            return $e->getMessage();
            DB::rollBack();
            return $this->error(40004);
        }
    }

    /**
     * Notes : 文章删除逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:23
     * @param $id
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('id');

        DB::beginTransaction();
        try{
            //删除文章
            Article::where('id', '=', $id)->delete();
            //删除文章内容
            ArticleContent::where('article_id', '=', $id)->delete();
            //删除文章标签
            ArticleTag::where('article_id', '=', $id)->delete();
            //删除文章统计
            ArticleStatistic::where('article_id', '=', $id)->delete();
            //删除文章评论
            ArticleComment::where('article_id', '=', $id)->delete();

            DB::commit();
        }catch (\Exception $e){

            DB::rollBack();
            return $this->error(40004);
        }
        return $this->success(20003);
    }


    /**
     * Notes : 是否置顶
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/1 15:19
     */
    public function changeTopStatue(Request $request)
    {
        $article =  $request->input();
        $result =  Article::where(['id'=>$article['id']])->update($article);
        if ($result){
            return $this->success(20005);
        }
        return $this->error(40005);
    }
}
