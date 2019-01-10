<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticleCategory;
use App\Http\Requests\Admin\Category\Store;

class CategoryController extends Controller
{
    /**
     * Notes : 文章分类列表
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:08
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Notes : 文章分类创建页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:08
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Notes : 文章分类创建逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:08
     * @param Store $request
     * @param ArticleCategory $articleCategory
     */
    public function store(Store $request,ArticleCategory $articleCategory)
    {
        $category = $request->input();
        $result   = $articleCategory->create($category);
        if (!$result){
            return $this->error(40002);
        }
        return $this->success(20002);
    }

    /**
     * Notes : 文章分类编辑页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:09
     * @param ArticleCategory $articleCategory
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('admin.category.edit',compact('articleCategory'));
    }

    /**
     * Notes : 文章分类编辑逻辑
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:09
     * @param Store $request
     * @param ArticleCategory $articleCategory
     */
    public function update(Store $request,ArticleCategory $articleCategory)
    {
        $category = $request->input();
        $result   = $articleCategory->where(['id'=>$category['id']])->update($category);
        if (!$result){
            return $this->error(40004);
        }
        return $this->success(20004);
    }

    /**
     * Notes : 删除文章分类
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:09
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
