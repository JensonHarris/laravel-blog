<?php

namespace App\Http\Requests\Admin\Category;

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
            'name'      => 'required',
            'parent_id' => 'required',
        ];
    }


    /**
     * Notes : 定义中文字段名
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/7 11:04
     * @return array
     */
    public function attributes()
    {
        return [
            'name'    => '文章分类名',
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
            'parent_id.required'  =>'请为该分类选择父分类',
        ];
    }
}
