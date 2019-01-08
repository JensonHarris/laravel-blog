<?php

namespace App\Models;



class AdminRole extends Model
{
//    protected $table = "admin_roles";

    protected $primaryKey = 'ar_id';
    /*
     * 当前角色的所有权限
     */
    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class, 'admin_permission_role', 'ap_id', 'ar_id')->withPivot(['ap_id', 'ar_id']);
    }

    /*
     * 给角色授权
     */
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission);
    }

    /*
     * 删除role和permission的关联
     */
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    /*
     * 角色是否有权限
     */
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }
}