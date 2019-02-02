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

    /**
     * Notes : 获取分类及其子分类
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/2 15:26
     */
    public function getCategories($id){
        return $this->where('id', '=', $id)->orWhere('parent_id', '=', $id)->select('id')->pluck('id');
    }
}
