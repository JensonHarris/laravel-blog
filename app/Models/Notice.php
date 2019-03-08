<?php

namespace App\Models;

<<<<<<< HEAD
class Notice extends Model
{

    /**
     * Notes : 文章内容
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/25 13:47
     */
    public function noticeUser()
    {
        return $this->hasOne(AdminUser::class, 'au_id' , 'id');
    }
=======
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
}
