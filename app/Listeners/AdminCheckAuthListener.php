<?php

namespace App\Listeners;

use App\Events\AdminCheckAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminCheckAuthListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AdminCheckAuth  $event
     * @return void
     */
    public function handle(AdminCheckAuth $event)
    {


        $request = $event->request;
        $Route = \Route::current()->getActionName();
        list($control, $action) = explode('@', $Route);
        $control = substr(strrchr($control,'\\'),1);
        $method = $request->method();
        $permission =[
            'ap_control' => $control,
            'ap_action'  => $action,
            'method'     => $method
        ];

        $adminUser = Auth::guard('admin')->user()->roles;
        $userPermissions = $adminUser->get(0)->permissions;
        $permissions = $userPermissions->map(function ($item) {
            return $item->only(['ap_control', 'ap_action', 'method']);
        })->contains($permission);
         //如果不是管理员或者没有登录;则重定向到登录页面
//        if (!$permissions) {
//            dd('没有该权限');
//        }
    }
}
