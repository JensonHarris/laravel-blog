<?php

namespace App\Models;



class AdminPermission extends Model
{


    protected $primaryKey = 'ap_id';
    /*
     * 权限属于哪些角色
     */
    public function roles()
    {
        return $this->belongsToMany(AdminRole::class, 'admin_permission_role', 'ar_id', 'ap_id')->withPivot(['ap_id', 'ar_id']);
    }


    /**
     * Notes : 该权限的子权限
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/30 10:29
     */
    public function subPermission(){
        return $this->hasMany(AdminPermission::class, 'ap_pid','ap_id');
    }
}
