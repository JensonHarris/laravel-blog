<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'tag_ids'     => 'required',
            'author'      => 'required',
            'keywords'    => 'required',
            'title'       => 'required',
        ];
    }


    /**
     * Notes : 定义中文提示
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/7 11:04
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => '请选择文章分类',
            'tag_ids.required'     => '请选择文章标签',
            'author.required'      => '请输入作者姓名',
            'keywords.required'    => '文章标题不能为空',
            'title.required'       => '文章关键词不能为空',
        ];
    }
}
