<?php

namespace App\Http\Requests\Admin\Role;

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
            'ar_name'  => 'required',
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
            'ar_name'  => '用户角色名',
        ];
    }
}
