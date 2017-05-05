<?php

namespace App\Http\Middleware;

use App\Services\ResService;
use App\Services\WAuthService;
use App\User;
use Closure;

class WAuth
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
        $email = $request->header('x-email');
        $token = $request->header('x-token');
        $user = User::where('email', $email)->first();
        if(empty($user) || WAuthService::verify($email, $user['password'], $token)) {
            return ResService::error(ResService::NOT_LOGIN_CODE, '尚未登录');
        }
        return $next($request);
    }
}
