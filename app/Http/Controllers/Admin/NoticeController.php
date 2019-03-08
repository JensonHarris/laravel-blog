<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Notice;
use App\Http\Requests\Admin\Notice\Store;
=======
use App\Http\Controllers\Controller;
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notice.index');
    }

<<<<<<< HEAD

    /**
     * Notes : 文章分类列表数据
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:24
     * @param Request $request
     */
    public function jsonData(Request $request)
    {
        $limit = $request->input('limit','10');
        $notices  = Notice::paginate($limit);
        return $this->success('200',$notices);
    }
=======
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        $adminUser = \Auth::guard('admin')->user();
        return view('admin.notice.create', compact('adminUser'));
=======
        //
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function store(Store $request, Notice $notice)
    {
        $notices = $request->input();
//        dd($notices);
        $result   = $notice->create($notices);
        if (!$result){
            return $this->error(40002);
        }
        return $this->success(20002);
=======
    public function store(Request $request)
    {
        //
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
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
<<<<<<< HEAD
    public function edit(Notice $notice)
    {
        $adminUser = \Auth::guard('admin')->user();
        return view('admin.notice.edit', compact('adminUser', 'notice'));
=======
    public function edit($id)
    {
        //
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Store $request, Notice $notice)
    {
        $notices = $request->input();
        $result   = $notice->where(['id'=>$notices['id']])->update($notices);
        if (!$result){
            return $this->error(40004);
        }
        return $this->success(20004);
=======
    public function update(Request $request, $id)
    {
        //
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $notice = Notice::find($id);
        $result = $notice->delete();
        if ($result) {
            return $this->success(20003);
        }
        return $this->error(40003);
=======
    public function destroy($id)
    {
        //
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
    }
}
