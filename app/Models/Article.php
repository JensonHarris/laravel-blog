<?php

namespace App\Models;


class Article extends Model
{
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

}
