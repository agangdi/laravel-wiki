<?php

namespace App\Http\Controllers\User;

use App\Services\ResService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\ValidationException;

class RegController extends Controller
{
	/**
	 * @desc __invoke
	 *   注册一个用户
	 * @param Request $request
	 * @return array
	 */
	public function __invoke(Request $request)
	{
		try{

			$this->validate($request, [
				'name' => 'bail|required',
				'email' => 'bail|required|email',
				'password' => 'required',
			]);

			$name = $request->input('name', '');
			$email = $request->input('email', '');
			$password = $request->input('password', '');

			// todo 判断用户是否已存在

			$user = User::create([
				'name' => $name,
				'email' => $email,
				'password' => bcrypt($password),
			]);

			if(isset($user['id']) && $user['id'] > 0) {
				return ResService::ok([
					'id' => $user['id']
				]);
			}

			return ResService::error(-1, '用户添加失败');

		}catch (ValidationException $e) {
			return ResService::error(500, $e->getMessage(), [], 200, $e->getMessage());
		}catch (\Exception $e) {
			return ResService::error(500, '用户添加失败');
		}

	}
}
