<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminPermission;
use App\Http\Requests\Admin\Permission\Store;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            return view('admin.permission.index');

    }

    public function jsonData(Request $request){
        $limit = $request->input('limit','10');
        $permissions  = AdminPermission::paginate($limit);
        return $this->success('200',$permissions);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AdminPermission $adminPermission)
    {
        $permissions    =  $adminPermission->all()->toArray();
        $newPermissions =  arrayLevel($permissions,'ap_id','ap_pid');
        return view('admin.permission.create',compact('newPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
    public function edit(AdminPermission $adminPermission)
    {
        return view('admin.permission.edit',compact('adminPermission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
