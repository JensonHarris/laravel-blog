<?php

namespace App\Models;

class ArticleStatistic extends Model
{

    /**
     * Notes : 文章内容
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/25 13:47
     */
    public function article()
    {
        return $this->hasOne(Article::class, 'id' , 'article_id');
    }
}
