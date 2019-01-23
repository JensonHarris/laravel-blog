<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
        //为了要知道排除谁不验证,应该获取当前路由里面的参数
        $au_id = $this->route('au_id');

        return [
            'au_name'     => ['required','min:6','max:16',
                Rule::unique('admin_users')->ignore($au_id,'au_id'),
            ],
            'au_realname' => 'required',
            'au_email'    => ['required','email',
                Rule::unique('admin_users')->ignore($au_id,'au_id'),
            ],
            'au_mobile'   => ['required',
                Rule::unique('admin_users')->ignore($au_id,'au_id'),
            ],
            'password_c'  => 'same:password'
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
}
