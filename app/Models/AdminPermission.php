<?php

namespace App\Models;



class AdminPermission extends Model
{

//    protected $table = "admin_permissions";

    protected $primaryKey = 'ap_id';
    /*
     * 权限属于哪些角色
     */
    public function roles()
    {
        return $this->belongsToMany(AdminRole::class, 'admin_permission_role', 'ar_id', 'ap_id')->withPivot(['ap_id', 'ar_id']);
    }
}
