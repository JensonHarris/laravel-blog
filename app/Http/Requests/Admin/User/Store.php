<?php

namespace App\Http\Requests\Admin\User;

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
            'ar_id'       => 'required',
            'au_name'     => 'required|min:6|max:16|unique:admin_users',
            'au_realname' => 'required',
            'au_email'    => 'required|email|unique:admin_users',
            'au_mobile'   => 'required|unique:admin_users',
            'password'    => 'required|min:6|max:16',
            'password_c'  => 'required|same:password'
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
            'au_name'     => '登录账号',
            'au_realname' => '管理员姓名',
            'au_email'    => '管理员邮箱',
            'au_mobile'   => '管理员手机号',
            'password'    => '登录密码',
            'password_c'  => '确认密码'

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
            'ar_id.required'  =>'请选择为该用户选择角色',
        ];
    }
}
