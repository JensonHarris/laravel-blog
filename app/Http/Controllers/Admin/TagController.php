<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Tag\Store;

class TagController extends Controller
{
    /**
     * Notes : 标签列表页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:05
     */
    public function index()
    {
        return view('admin.tag.index');
    }

    public function jsonData(Request $request)
    {
        $limit = $request->input('limit','10');
        $tags  = Tag::paginate($limit);
        return $this->success('200',$tags);
    }
    /**
     * Notes : 创建标签页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:05
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Notes : 标签创建逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:06
     * @param Store $request
     * @param Tag $tag
     */
    public function store(Store $request,Tag $tag)
    {
        $lab = $request->input();
        $result   = $tag->create($lab);
        if (!$result){
            return $this->error(40002);
        }
        return $this->success(20002);
    }


    /**
     * Notes : 标签编辑页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:06
     * @param Tag $tag
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Notes : 标签编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:07
     * @param Store $request
     * @param Tag $tag
     */
    public function update(Store $request,Tag $tag)
    {
        $lab = $request->input();
        $result   = $tag->where(['id'=>$lab['id']])->update($lab);
        if (!$result){
            return $this->error(40004);
        }
        return $this->success(20004);
    }

    /**
     * Notes : 便签删除
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:07
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
