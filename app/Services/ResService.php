<?php

namespace App\Services;

/**
 * Created by PhpStorm.
 * User: johnShaw
 * Date: 17/5/5
 * Time: 下午9:44
 */
class ResService
{

	const NOT_LOGIN_CODE = 403;

	public static function ok($data)
	{
		$ret = [
			'code' => 0,
			'msg' => '操作成功',
			'data' => $data
		];
		return response($ret, 200);
	}

	public static function error($code=-1, $msg, $data=[], $status=200, $debugMsg='')
	{
		$ret = [
			'code' => $code,
			'msg' => $msg,
			'debug' => $debugMsg,
			'data' => $data,
		];
		return response($ret, $status);
	}

}