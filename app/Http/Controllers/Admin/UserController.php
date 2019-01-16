<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use App\Models\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\User\Store;
use App\Http\Requests\Admin\User\Update;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.user.index');
    }

    public function jsonData(Request $request,AdminUser $adminUser){
        $limit = $request->input('limit','10');
        $usersData =  $adminUser->users($limit);
        return $this->success('200',$usersData);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = AdminRole::all()->toArray();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request,AdminUser $adminUser)
    {
         $user = $request->except('_token');
         $user['password'] = bcrypt($user['password']);
         $admins = $adminUser->create($user);
         $reslut = $admins->assignRole($user['ar_id']);

        dd($admins,$reslut);
        dd($data,$user);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $adminUser)
    {
//        $data = $adminUser->roles;
//        dump($data);
        return view('admin.user.edit',compact('adminUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,AdminUser $adminUser)
    {
        $user  = $request->except('_token');
        $ar_id =  array_pull($user, 'ar_id');
        if (array_key_exists('password',$user)) {
            $user['password'] = bcrypt($user['password']);
            $user = array_except($user, ['password_c']);
        }
        $data =  $adminUser->where(['au_id'=>$user['au_id']])->update($user);
        dd($ar_id,$user,$data);
    }

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
