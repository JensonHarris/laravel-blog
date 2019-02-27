<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use Searchable;


    /**
     * Notes : 定义索引的type
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/26 17:29
     * @return string
     */
    public function searchableAs()
    {
        return 'articles';
    }


    /**
     * Notes : 定义搜索字段
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/26 17:30
     * @return
     */
    public function toSearchableArray()
    {
        return [
            'title'       => $this->title,
            'author'      => $this->author,
            'description' => $this->description,
            'markdown'    =>$this->articleContent
        ];
    }
    /**
     * Notes : 文章所有的标签
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/25 13:47
     */
    public function articleTags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    /**
     * Notes : 文章分类
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/25 13:47
     */
    public function articleCategory()
    {
        return $this->hasOne(ArticleCategory::class, 'id','category_id');
    }

    /**
     * Notes : 文章内容
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/25 13:47
     */
    public function articleContent()
    {
        return $this->hasOne(ArticleContent::class, 'article_id');
    }

     /**
     * Notes : 文章内容统计
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/26 15:47
     */
    public function statistic()
    {
        return $this->hasOne(ArticleStatistic::class, 'article_id');
    }

    /**
     * Notes : 文章列表数据
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/1 10:37
     * @return mixed
     */
    public function articles($limit)
    {
        return DB::table('articles as ar')
            ->leftJoin('article_categories as ac', 'ar.category_id','=', 'ac.id')
            ->leftJoin('article_statistics as as', 'ar.id','=', 'as.article_id')
            ->select('ar.*', 'ac.name', 'as.views', 'as.likes')
            ->paginate($limit);
    }

    /**
     * Notes :  文章搜索
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/14 9:38
     * @param $keyword
     * @return mixed
     *
     */
    public function searchArticleGetId($keyword)
    {
         //如果全文搜索出错则降级使用 sql like
        try{
            $id = Article::search($keyword)->keys();
        } catch (\Exception $e) {
            $id = DB::table('articles as ar')
                ->leftJoin('article_contents as ac', 'ar.id', '=', 'ac.article_id')
                ->orWhere('ar.title', 'LIKE', "%$keyword%")
                ->orWhere('ar.author', 'LIKE', "%$keyword%")
                ->orWhere('ar.description', 'LIKE', "%$keyword%")
                ->orWhere('ac.markdown', 'LIKE', "%$keyword%")
                ->pluck('ar.id');
        }
        return $id;
    }

}
