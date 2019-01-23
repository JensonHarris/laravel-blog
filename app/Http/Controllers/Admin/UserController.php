<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use App\Models\AdminRole;
use App\models\AdminRoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\User\Store;
use App\Http\Requests\Admin\User\Update;

class UserController extends Controller
{
    /**
     * Notes : 用户列表页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:31
     */
    public function index(AdminUser $adminUser)
    {
        return view('admin.user.index');
    }

    /**
     * Notes : 用户列表数据
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:31
     * @param Request $request
     * @param AdminUser $adminUser
     */
    public function jsonData(Request $request,AdminUser $adminUser)
    {
        $limit = $request->input('limit','10');
        $usersData =  $adminUser->users($limit);
        return $this->success('200',$usersData);
    }

    /**
     * Notes : 用户创建页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:31
     */
    public function create()
    {
        $roles = AdminRole::all()->toArray();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Notes : 用户创建逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:30
     * @param Store $request
     * @param AdminUser $adminUser
     */
    public function store(Store $request,AdminUser $adminUser)
    {
         $user = $request->input();
         $user['password'] = bcrypt($user['password']);

        DB::beginTransaction();
        try {
         $admins = $adminUser->create($user);
         $result = $admins->assignRole($user['ar_id']);
            DB::commit();
            return $this->success(20002);
        } catch (\Exception $e){
            DB::rollBack();
            return $this->error(40002);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Notes : 用户编辑页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:30
     * @param AdminUser $adminUser
     */
    public function edit(AdminUser $adminUser)
    {
        $roles = AdminRole::all()->toArray();
        $myRole  = collect($adminUser->roles)->pluck('ar_id');
        return view('admin.user.edit',compact('adminUser','roles','myRole'));
    }

    /**
     * Notes : 用户编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:30
     * @param Update $request
     * @param AdminUser $adminUser
     */
    public function update(Update $request,AdminUser $adminUser)
    {
        $user  = $request->except('file');
        $ar_id =  array_pull($user, 'ar_id');
        if (array_key_exists('password',$user)) {
            $user['password'] = bcrypt($user['password']);
            $user = array_except($user, ['password_c']);
        }
        DB::beginTransaction();
        try {
            $admins =  $adminUser->where(['au_id'=>$user['au_id']])->update($user);
            $delete =  AdminRoleUser::where('au_id','=',$user['au_id'])->delete();
            if ($delete){
                $roleUser = ['ar_id'=>$ar_id,'au_id'=>$user['au_id']];
                $result = AdminRoleUser::insert($roleUser);
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
     * Notes : 用户删除逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:29
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
