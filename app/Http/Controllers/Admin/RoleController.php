<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminRole;
use App\Models\AdminPermission;
use App\Models\AdminPermissionRole;
use App\Http\Requests\Admin\Role\Store;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request,AdminRole $adminRole)
    {
        $roles = $request->input();
        $permissions =  array_pull($roles, 'permissions');
        $role = $adminRole->create($roles);
        $multiplied = collect( $permissions)->map(function ($item) {
            return $item['ap_id'];
        })->toArray();

        $arr=[];
        foreach($multiplied as $k=>$item){
            $arr[$k]['ar_id'] = 2;
            $arr[$k]['ap_id']= $item;
        }
        $resulte = AdminPermissionRole::insert($arr);
        dd($roles,$permissions,$resulte,$arr);
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
         return view('admin.role.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
