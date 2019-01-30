<?php

namespace App\Models;


class ArticleCategory extends Model
{
    /**
     * Notes : 分类下的所有文章
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/30 14:18
     */
    public function articles(){
        return $this->hasMany(Article::class, 'category_id');
    }
}
