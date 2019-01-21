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
        return $this->belongsToMany(AdminUser::class,'admin_role_user', 'au_id','ar_id');
    }

    /*
     * 当前角色的所有权限
     */
    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class, 'admin_permission_role', 'ar_id', 'ap_id')->withPivot(['ap_id', 'ar_id']);
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
