<?php
/**
 * Created by PhpStorm.
 * User: johnShaw
 * Date: 17/5/5
 * Time: 下午11:25
 */

namespace App\Services;


use App\User;

class WAuthService
{

	public static function encrypt($email, $password)
	{
		return password_hash(env('token_salt') . $email . $password, PASSWORD_DEFAULT) . '|' . time();
	}

	public static function verify($email, $token)
	{

		if(empty($email) || empty($token)) {
			return ResService::error(ResService::NOT_LOGIN_CODE, '尚未登录');
		}

		$user = User::where('email', $email)->where('remember_token', $token) -> first();

		return !empty($user);

	}

}