<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
       'user_id', 'ip', 'path', 'query', 'method', 'platform', 'browser', 'referer'
    ];
}
