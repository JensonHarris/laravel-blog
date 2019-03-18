<?php

namespace App\Listeners;

use App\Models\History;

use App\Events\AdminAccessLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminAccessLogListener
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
     * @param  AdminAccessLog  $event
     * @return void
     */
    public function handle(AdminAccessLog $event)
    {
        if (!session('admin')){
            $admin     = \Auth::guard('admin')->user();
            session(['admin' => $admin]);
        }else{
            $admin = session('admin');
        }
        $request = $event->request;
        $requestData = [
            'user_id' => \Auth::guest('admin')? $admin->au_id : 0,
            'ip'=>ip2long($request->ip()),
            'path'=> $request->path(),
            'query'=>json_encode($request->all(), JSON_UNESCAPED_UNICODE),
            'method'=>$request->method(),
            'platform'=>$this->platform($request),
            'browser' =>$this->browser($request),
            'referer'=>$request->header('referer')
        ];
        if ($request->all()) {
          History::create($requestData);
        }
    }

    /**
     * Notes : 判断当前的操作系统
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/27 11:26
     */
    public function platform($request)
    {
        $agent = $request->header('User-Agent');
        $platform = 'Unknown';
        if (preg_match('/linux/i',$agent)){
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i',$agent)){
            $platform = 'mac';
        }elseif (preg_match('/windows|wind32/i',$agent)){
            $platform = 'windows';
        }

        return $platform;
    }

    /**
     * 判断浏览器名称和版本
     */
    function browser($request)
    {

        $agent = $request->header('User-Agent');
        $browser     = 'Unknown';

        if (preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i',$agent))
        {
            $browser     = 'Internet Explorer';
        } elseif (preg_match('/FireFox/i', $agent))
        {
            $browser     = 'FireFox';
        } elseif (preg_match('/Chrome/i', $agent))
        {
            $browser     = 'Google Chrome';
        } elseif (preg_match('/Opera/i', $agent))
        {
            $browser     = 'Opera';
        } elseif (preg_match('/Netscape/i', $agent))
        {
            $browser     = 'Netscape';
        } elseif (preg_match('/safari/i', $agent))
        {
            $browser     = 'Apple Safari';
        }

       return $browser;
    }
}
