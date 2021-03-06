<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminRole;
use App\Models\AdminPermission;
use App\Models\AdminPermissionRole;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Role\Store;

class RoleController extends Controller
{
    /**
     * Notes : 角色列表页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:27
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Notes : 角色列表数据
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:27
     * @param Request $request
     */
    public function jsonData(Request $request)
    {
        $limit = $request->input('limit','10');
        $roles  = AdminRole::paginate($limit);
        return $this->success('200',$roles);
    }

    /**
     * Notes : 角色创建页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:27
     * @param Request $request
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $permissions      = AdminPermission::all(['ap_id','ap_pid','ap_name'])->toArray();
            $multiplied = collect( $permissions)->map(function ($item) {
                $item['checkArr'] = [['type'=>'0','isChecked'=>'0']];
                return $item;
            });
            $permissionsLevel = arrayLevel($multiplied,'ap_id','ap_pid');
            $permissionsTree  =  arrayToTree($permissionsLevel,'ap_id','ap_pid');
            return $this->success('200',$permissionsTree);
        } else {
            return view('admin.role.create');
        }
    }

    /**
     * Notes : 角色创建逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:27
     * @param Store $request
     * @param AdminRole $adminRole
     */
    public function store(Store $request,AdminRole $adminRole)
    {
        $roles = $request->input();
        $permissions =  array_pull($roles, 'permissions');
        DB::beginTransaction();
        try {
            $role  = $adminRole->create($roles);
            $array = [];
            foreach($permissions as $k=>$item){
                $array[$k]['ar_id'] = $role->ar_id;
                $array[$k]['ap_id'] = $item['ap_id'];
            }
            $resulte = AdminPermissionRole::insert($array);
            DB::commit();
            return $this->success(20002);
        } catch (\Exception $e){
            DB::rollBack();
            return $this->error(40002);
        }
    }


    /**
     * Notes : 角色编辑页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:28
     * @param AdminRole $adminRole
     */
    public function edit(Request $request, AdminRole $adminRole)
    {
        if ($request->ajax()) {
            $rolePermissions  = $adminRole->permissions->toArray();
            $permissions      = AdminPermission::all()->toArray();
            $aps              = array_column($rolePermissions,'ap_id');
            foreach ($permissions as $key=>&$permission ){
                if (in_array($permission['ap_id'],$aps)){
                    $permission['checkArr'] = [['type'=>'0','isChecked'=>'1']];
                }else{
                    $permission['checkArr'] = [['type'=>'0','isChecked'=>'0']];
                };
            }
            $permissionsLevel = arrayLevel($permissions,'ap_id','ap_pid');
            $permissionsTree  =  arrayToTree($permissionsLevel,'ap_id','ap_pid');
            return $this->success('200',$permissionsTree);
        } else {
            return view('admin.role.edit',compact('adminRole'));
        }
    }

    /**
     * Notes : 角色编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:28
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, AdminRole $adminRole)
    {
        $roles = $request->input();
        $permissions =  array_pull($roles, 'permissions');
        DB::beginTransaction();
        try {
            $ar_id = $roles['ar_id'];
            $role  = $adminRole->where(['ar_id'=>$ar_id])->update($roles);
            $array = [];
            foreach($permissions as $k=>$item){
                $array[$k]['ar_id'] = $ar_id;
                $array[$k]['ap_id'] = $item['ap_id'];
            }
            $delete  = AdminPermissionRole::where('ar_id','=',$ar_id)->delete();
            if ($delete){
                $result = AdminPermissionRole::insert($array);
                DB::commit();
                return $this->success(20004);
            }
            DB::rollBack();
            return $this->error(40004);
        } catch (\Exception $e){
            DB::rollBack();
            return $this->error(40004);
        }
    }

    /**
     * Notes : 角色删除逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:29
     * @param $id
     */
    public function destroy(Request $request)
    {
        $ar_id = $request->input('ar_id');
        $adminRole =  AdminRole::find($ar_id);
        if (!$adminRole->users->count()){
            $result = $adminRole->delete();
            if ($result){
                return $this->success(20003);
            }
            return $this->error(40003);
        }
        return $this->error(40023);
    }

    /**
     * Notes : 角色状态
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/31 17:25
     * @param Request $request
     */
    public function changeStatus(Request $request)
    {
        $role =  $request->input();
        $result =  AdminRole::where(['ar_id'=>$role['ar_id']])->update($role);
        if ($result){
            return $this->success(20005);
        }
        return $this->error(40005);
    }
}
