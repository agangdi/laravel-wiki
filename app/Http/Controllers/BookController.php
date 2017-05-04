<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //
	public function get(Request $request, $id=null)
	{
		return view('books.index');
	}

	public function search(Request $request, $name)
	{
		$input = $request->all();
		return $input;
	}

	/**
	 * @desc post
	 * @param Request $request
	 * @param null $id
	 *  null create, int edit
	 */
	public function post(Request $request, $id=null)
	{
		return [
			'code' => 403
		];
		$input = $request->all();
		return array_merge($input, ['id' => $id]);
	}
}
