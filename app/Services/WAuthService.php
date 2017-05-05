<?php
/**
 * Created by PhpStorm.
 * User: johnShaw
 * Date: 17/5/5
 * Time: 下午11:25
 */

namespace App\Services;


class WAuthService
{

	public static function encrypt($email, $password)
	{
		return password_hash(env('token_salt') . $email . $password, PASSWORD_DEFAULT) . '|' . time();
	}

	public static function verify($email, $password, $token)
	{
		$token = explode('|', $token);
		return !empty($token) && password_verify(env('token_salt') . $email . $password, $token[0]);
	}

}