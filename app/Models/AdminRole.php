<?php

namespace App\Models;

class AdminRole extends Model
{

    protected $primaryKey = 'ar_id';

    /**
     * 角色用户
     */
    public function users()
    {
        return $this->belongsToMany(AdminUser::class,'admin_role_user', 'ar_id','au_id');
    }

    /*
     * 当前角色的所有权限
     */
    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class, 'admin_permission_role', 'ar_id', 'ap_id')->withPivot(['ap_id', 'ar_id']);
    }

}
