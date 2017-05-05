<?php

namespace App\Http\Middleware;

use Closure;

class CheckCORS
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

        // 设置请求有效时间，减少预请求次数：https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Access_control_CORS
        //    header("Access-Control-Max-Age: 86400");

        return $next($request);
    }
}
