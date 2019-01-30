<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminPermission;
use App\Http\Requests\Admin\Permission\Store;

class PermissionController extends Controller
{
    /**
     * Notes : 权限列表页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:24
     */
    public function index()
    {
        return view('admin.permission.index');
    }

    /**
     * Notes : 权限数据
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:24
     * @param Request $request
     */
    public function jsonData(Request $request)
    {
        $limit = $request->input('limit','10');
        $permissions  = AdminPermission::paginate($limit);
        return $this->success('200',$permissions);
    }

    /**
     * Notes : 权限创建页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:25
     * @param AdminPermission $adminPermission
     */
    public function create(AdminPermission $adminPermission)
    {
        $permissions    =  $adminPermission->all()->toArray();
        $newPermissions =  arrayLevel($permissions,'ap_id','ap_pid');
        return view('admin.permission.create',compact('newPermissions'));
    }

    /**
     * Notes : 权限创建逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:25
     * @param Store $request
     * @param AdminPermission $adminPermission
     */
    public function store(Store $request,AdminPermission $adminPermission)
    {
        $permission = $request->except('_token');
        $result = $adminPermission->create($permission);
        if (!$result){
            return $this->error(40002);
        }
        return $this->success(20002);

    }


    /**
     * Notes : 权限编辑页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:26
     * @param AdminPermission $adminPermission
     */
    public function edit(AdminPermission $adminPermission)
    {
        $permissions    =  $adminPermission->all()->toArray();
        $newPermissions =  arrayLevel($permissions,'ap_id','ap_pid');
        return view('admin.permission.edit',compact('adminPermission','newPermissions'));
    }

    /**
     * Notes : 权限编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:26
     * @param Store $request
     * @param AdminPermission $adminPermission
     */
    public function update(Store $request,AdminPermission $adminPermission)
    {
        $permission = $request->except('_token');
        $result = $adminPermission->where(['ap_id'=>$permission['ap_id']])->update($permission);
        if (!$result){
            return $this->error(40004);
        }
        return $this->success(20004);
    }

    /**
     * Notes : 权限删除逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:26
     */
    public function destroy(Request $request)
    {
        $ap_id =  $request->input('ap_id');
        $permission  = AdminPermission::find($ap_id);
        if (!$permission->subPermission->count()){
            $result = $permission->delete();
            if ($result){
                return $this->success(20003);
            }
            return $this->error(40003);
        }
        return $this->error(40013);
    }
}
