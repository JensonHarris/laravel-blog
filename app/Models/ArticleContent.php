<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{

    protected $fillable = ['article_id', 'markdown'];
}
