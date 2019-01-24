<?php

namespace App\Models;


class Article extends Model
{
    public function articleTags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    public function articleContent()
    {
        return $this->hasOne(ArticleContent::class, 'article_id');
    }
}
