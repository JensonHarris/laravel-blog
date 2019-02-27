<?php

namespace App\Http\Middleware;

use Closure;
use App\Events\AdminAccessLog;

class AdminAccess
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
        event(new AdminAccessLog($request));
        return $next($request);
    }
}
