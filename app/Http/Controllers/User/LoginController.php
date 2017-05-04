<?php

namespace App\Http\Controllers\User;

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
		$email = $request->input['email'];
		$password = $request->input['password'];
		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			return [
				'code' => 0,
				'token' => sha1('salt' . $email . $password) . time()
			];
		}

		return [
			'code' => 403
		];
	}
}
