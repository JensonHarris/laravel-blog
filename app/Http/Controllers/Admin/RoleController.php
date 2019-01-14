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
    public function edit(AdminRole $adminRole)
    {
         return view('admin.role.edit',compact('adminRole'));
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
