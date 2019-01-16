<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArticleComment extends Model
{
    public function comments($limit)
    {
        return DB::table('article_comments as ac')
            ->leftJoin('articles as a','ac.article_id','=','a.id')
            ->leftJoin('members as m','ac.member_id','=','m.id')
            ->select('ac.*','m.name','a.title')
            ->paginate($limit);
    }
}
