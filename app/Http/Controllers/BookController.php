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
}
