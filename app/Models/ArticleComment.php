<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArticleComment extends Model
{
    public function comments($limit)
    {
        return DB::table('article_comments as ac')
            ->leftJoin('articles as a','ac.article_id','=','a.id')
            ->select('ac.*','a.title')
            ->paginate($limit);
    }
}
