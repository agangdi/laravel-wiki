<?php

namespace App\Http\Controllers\Book;

use App\Book;
use App\Chapter;
use App\Services\ResService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ChapterController extends Controller
{

	public function index(Request $request, $id)
	{
		$book = Book::findOrFail($id);
		if(empty($book)) {
			return ResService::error(-1, '书籍不存在');
		}
		return ResService::ok(Chapter::where('book_id', $id)->get());
	}

	public function detail(Request $request, $id)
	{
		return ResService::ok(Chapter::findOrFail($id));
	}

	public function post(Request $request, $id=null)
	{
		try{

			$this->validate($request, [
				'con' => 'bail|required',
				'title' => 'bail|required',
				'bookId' => 'bail|required|integer'
			]);

			$bookId = $request->input('bookId', 0);
			$book = Book::findOrFail($bookId);

			if(empty($book)) {
				return ResService::error(-1, '书籍不存在');
			}

			if(!empty($id)) {
				$chapter = Chapter::findOrFail($id);
			} else {
				$chapter = new Chapter();
			}

			$chapter->con = $request->input('con', '');
			$chapter->pid = $request->input('pid', 0);
			$chapter->prev = $request->input('prev', 0);
			$chapter->next = $request->input('next', 0);
			$chapter->title = $request->input('title', 0);
			$chapter->book_id = $bookId;

			if($chapter->save()) {
				return ResService::ok([
					'id' => $chapter['id']
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
