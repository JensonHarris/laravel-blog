<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AdminLogin
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
        // 如果不是管理员或者没有登录;则重定向到登录页面
        if (!session('admin')) {
            return redirect('admin/login');
        }
        return $next($request);
    }
}
