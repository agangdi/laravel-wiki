<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\ResService;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    //
	public function get()
	{
		return ResService::ok(Book::where('deleted_at', NULL)->get());
	}

	public function detail($id)
	{
		return ResService::ok(Book::findOrFail($id)->delete());
	}

	public function del($id)
	{
		return ResService::ok(Book::FindorFail($id)->delete());
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
		try{

			$this->validate($request, [
				'name' => 'bail|required',
				'subtitle' => 'bail|required',
			]);

			$name = $request->input('name', '');
			$subtitle = $request->input('subtitle', '');

			Log::info('input', [
				'name' => $name,
				'subtitle' => $subtitle,
			]);

			if(!empty($id)) {
				$book = Book::findOrFail($id);
			} else {
				$book = new Book();
			}

			$book->name = $name;
			$book->subtitle = $subtitle;

			if($book->save()) {
				return ResService::ok([
					'id' => $book['id']
				]);
			}

			return ResService::error(-1, '书籍添加失败');

		}catch (ValidationException $e) {
			return ResService::error(500, $e->getMessage(), [], 200, $e->getMessage());
		}catch (\Exception $e) {
			Log::error($e->getMessage() . $e->getTraceAsString());
			return ResService::error(500, '书籍添加失败', [], 200, $e->getMessage());
		}
	}
}
