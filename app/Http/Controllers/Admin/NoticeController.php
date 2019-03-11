<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Notice\Store;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminUser = session('admin');
        return view('admin.notice.create', compact('adminUser'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Notice $notice)
    {
        $notices = $request->input();
        $result   = $notice->create($notices);
        if (!$result){
            return $this->error(40002);
        }
        return $this->success(20002);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        $adminUser = session('admin');
        return view('admin.notice.edit', compact('adminUser', 'notice'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request, Notice $notice)
    {
        $notices = $request->input();
        $result   = $notice->where(['id'=>$notices['id']])->update($notices);
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
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $notice = Notice::find($id);
        $result = $notice->delete();
        if ($result) {
            return $this->success(20003);
        }
        return $this->error(40003);
    }
}
