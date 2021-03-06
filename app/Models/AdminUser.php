<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use Notifiable;


    protected $primaryKey = 'au_id';
    /**
     * orm模型中加入字段白名单（用于数据增删改过滤）
     * @var array
     */
    protected $fillable = [
        'au_name', 'au_realname', 'au_mobile', 'au_email', 'au_status', 'password',
    ];

    /**
     * orm模型中加入字段白名单（用于数据查过滤）
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    * 一个用户有哪些角色
    */
    public function roles()
    {
        return $this->belongsToMany(AdminRole::class, 'admin_role_user', 'au_id', 'ar_id');
    }

    /**
     * Notes : 用户分页列表
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/28 10:56
     * @param $limit
     */
    public function users($limit)
    {
        return DB::table('admin_users')
            ->leftJoin('admin_role_user','admin_users.au_id','=','admin_role_user.au_id')
            ->leftJoin('admin_roles','admin_roles.ar_id','=','admin_role_user.ar_id')
            ->paginate($limit);
    }

    /*
     * 是否有某个角色
     */
    public function isInRoles($roles)
    {
        return !! $roles->intersect($this->roles)->count();
    }

    /*
     * 是否有权限
     */
    public function hasPermission($permission)
    {
        return $this->isInRoles($permission->roles);
    }

    /*
     * 给用户分配角色
     */
    public function assignRole($roleId)
    {
        $role = AdminRole::where('ar_id', $roleId)->first();
        return $this->roles()->save($role);
    }

    /*
     * 删除user和role的关联
     */
    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }



}
