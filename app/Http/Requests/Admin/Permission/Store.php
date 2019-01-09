<?php

namespace App\Http\Requests\Admin\Permission;

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
            'ap_pid'     => 'required',
            'ap_name'    => 'required',
            'ap_control' => 'required',
            'ap_action'  => 'required',
            'ap_url'     => 'required',
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
            'ap_name'    => '权限名',
            'ap_control' => '控制器名',
            'ap_action'  => '方法名',
            'ap_url'     => 'URL',

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
            'ap_pid.required'  =>'请为该权限选择父权限',
        ];
    }

}
