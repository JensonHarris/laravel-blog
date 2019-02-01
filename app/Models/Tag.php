<?php

namespace App\Models;

class Tag extends Model
{

    /**
     * 标签文章
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_tags', 'tag_id','article_id');
    }


}
