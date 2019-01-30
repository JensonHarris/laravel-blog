<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
     * Notes : 文章分类列表数据
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/16 14:24
     * @param Request $request
     */
    public function jsonData(Request $request)
    {
        $limit = $request->input('limit','10');
        $category  = ArticleCategory::paginate($limit);
        return $this->success('200',$category);
    }
    /**
     * Notes : 文章分类创建页
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/10 11:08
     */
    public function create(ArticleCategory $articleCategory)
    {
        $category =  $articleCategory->all()->toArray();
        $newCategorys = arrayLevel($category,'id','parent_id');
        return view('admin.category.create',compact('newCategorys'));
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
        $category =  $articleCategory->all()->toArray();
        $newCategorys = arrayLevel($category,'id','parent_id');
        return view('admin.category.edit',compact('articleCategory','newCategorys'));
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
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $category = ArticleCategory::find($id);
        if (!$category->articles->count()){
            $result = $category->delete();
            if ($result){
                return $this->success(20003);
            }
            return $this->error(40003);
        }
        return $this->error(40043);
    }
}
