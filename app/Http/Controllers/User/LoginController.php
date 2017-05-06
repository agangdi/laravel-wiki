<?php

namespace App\Http\Controllers\User;

use App\Services\ResService;
use App\Services\WAuthService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
	public function __invoke(Request $request)
	{
		$this->validate($request, [
			'email' => 'bail|required|email',
			'password' => 'required',
		]);

		$email = $request->input('email', '');
		$password = $request->input('password', '');

		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			$data = [
				'token' => WAuthService::encrypt($email, $password)
			];
			$user = User::where('email', $email)->first();
			$user->remember_token = $data['token'];
			$user->save();
			return ResService::ok($data);
		}

		return ResService::error(-1, '登录失败');

	}
}
