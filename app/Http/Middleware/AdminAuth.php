<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $Route = \Route::current()->getActionName();
        list($control, $action) = explode('@', $Route);
        $control = substr(strrchr($control,'\\'),1);
        $method = $request->method();
        $permission =[
            'ap_control' => $control,
            'ap_action'  => $action,
            'method'     => $method
        ];

        $adminUser = \Auth::guard('admin')->user()->roles;
        $userPermissions = $adminUser->shift()->permissions;
        $permissions = $userPermissions->map(function ($item) {
            return $item->only(['ap_control', 'ap_action', 'method']);
        })->contains($permission);

        // 如果不是管理员或者没有登录;则重定向到登录页面
        if (!$permissions) {
            dd('没有该权限');
        }
        return $next($request);
    }

}
