<?php

namespace App\Http\Controllers\Admin;

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
        $adminUser = Auth::guard('admin')->user();
        $adminRole = $adminUser->roles->pluck('ar_name');
//        dd($adminRole);
        return view('admin.index.index',compact('adminUser', 'adminRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $adminUser = Auth::guard('admin')->user();
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
