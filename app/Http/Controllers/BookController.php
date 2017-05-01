<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //
	public function get(Request $request, $id=null)
	{
		$this->validate($request, [
			'id' => 'bail|numeric',
		]);
		var_dump($id);
	}

	public function search(Request $request, $name)
	{
		$input = $request->all();
		return $input;
	}
}
