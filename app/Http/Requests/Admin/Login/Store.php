<?php

namespace App\Http\Requests\Admin\Login;

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
            'au_name'  => 'required|min:6|max:16',
            'password' => 'required|min:6|max:12',
            'code'     => 'required|captcha',
        ];
    }

    /**
     * Notes : 定义中文字段名
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/3 15:22
     * @return array
     */
    public function attributes()
    {
        return [
            'au_name'  => '登录账号',
            'password' => '登录密码',
            'code'     => '验证码'
        ];
    }

    /**
     * Notes : 定义中文提示
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/3 15:24
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
