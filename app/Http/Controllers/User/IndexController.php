<?php
/**
 * Created by PhpStorm.
 * User: johnShaw
 * Date: 17/5/5
 * Time: 下午10:10
 */

namespace App\Http\Controllers\User;

use App\Services\ResService;
use App\User;
use Illuminate\Http\Request;


class IndexController
{
	//
	public function __invoke(Request $request)
	{
		return ResService::ok(User::all());
	}
}