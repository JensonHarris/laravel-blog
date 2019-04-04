<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Login\Store;

class LoginController extends Controller
{
    /**
     * Notes : 后台登录页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/4 16:45
     */
    public function index()
    {
        return view('admin.login.index');
    }

    /**
     * Notes : 后台登录
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/4 16:45
     */
    public function login(Store $request)
    {
        $logData = request(['au_name','password']);
        if (true == Auth::guard('admin')->attempt($logData)){
            $admin =  Auth::guard('admin')->user();
            if ($admin->au_status){
                return $this->error(40011);
            }
                session(['admin' => $admin]);
                return $this->success(20001);
        }
        return $this->error(40001);
    }

    /**
     * Notes : 退出登录
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/4 16:45
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flush();
        return redirect('/admin/login');
    }


}
