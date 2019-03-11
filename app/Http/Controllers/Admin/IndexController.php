<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Session;
use App\Models\AdminUser;
use App\models\AdminRoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\User\Update;
use Illuminate\Support\Facades\Artisan;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUser = session('admin');
        $adminRole = $adminUser->roles->pluck('ar_name');
        return view('admin.index.index',compact('adminUser', 'adminRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $adminUser = session('admin');
        return view('admin.index.profile',compact('adminUser'));
    }


    /**
     * Notes : 用户编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:30
     * @param Update $request
     * @param AdminUser $adminUser
     */
    public function updateUser(Update $request,AdminUser $adminUser)
    {
        $user  = $request->except('file');
        if (array_key_exists('password',$user)) {
            $user['password'] = bcrypt($user['password']);
            $user = array_except($user, ['password_c']);
        }
        $result =  $adminUser->where(['au_id'=>$user['au_id']])->update($user);
        if ($result){
            return $this->success(20004);
        }
        return $this->error(40004);
    }

    /**
     * Notes : 清理缓存
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/14 10:17
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        return redirect()->back();
    }

}
