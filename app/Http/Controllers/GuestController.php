<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Session;
use Validator;
// use Response;
// use Illuminate\Support\Facades\Input;
// use App\Http\Requests;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
		$posts = Post::
			orderBy('title', 'asc')
			->paginate(10);

		// diedump (dump and die)
		// dd($data);

		return view('/guests/index')
			->withPosts($posts);
    }

	public function indexAjax() {
		try {
			return Post::
				orderBy('title', 'asc')
				->get();
		}
		catch(Exception $e) {
			return 'false';
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

	public function storeAjax(Request $request) {
		// $this->validate($request, [
		// 	'title' => 'required|string|min:6|max:100|unique:posts,title',
		// 	'body' => 'required|string|min:6|max:255|unique:posts,body',
		// ]);

		$rules = [
			'titleCreate' => 'required|string|min:6|max:100|unique:posts,title',
			'bodyCreate' => 'required|string|min:6|max:255|unique:posts,body',
		];

		$rulesMessage = [
			'titleCreate.required' => 'Title: can not be empty.',
			'titleCreate.string' => 'Title: String only.',
			'titleCreate.min' => 'Title: Minimum is 6 characters.',
			'titleCreate.max' => 'Title: Maximum is 100 characters.',
			'titleCreate.unique' => 'Title: already exist.',

			'bodyCreate.required' => 'Body: can not be empty.',
			'bodyCreate.string' => 'Body: String only.',
			'bodyCreate.min' => 'Body: Minimum is 6 characters.',
			'bodyCreate.max' => 'Body: Maximum is 100 characters.',
			'bodyCreate.unique' => 'Body: already exist.',
		];

		$validators = Validator::make($request->all(), $rules, $rulesMessage);

		if($validators->fails()) {
			return response($validators->errors(), 401);
		}

		try {
			$posts = new Post();

			$posts->title = $request->titleCreate;
			$posts->body = $request->bodyCreate;

			$posts->save();

			return 'true';
		}
		catch(Exception $e) {
			return 'false';
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

	public function showAjax($id) {
		// 
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

	public function editAjax($id) {
		try{ 
			return Post::find($id);
		}
		catch(Exception $e) {
			return 'false';
		}
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

	public function updateAjax(Request $request, $id) {
		$rules = [
			'titleEdit' => "required|string|min:6|max:100|unique:posts,title,$id",
			'bodyEdit' => 'required|string|min:6|max:255|unique:posts,body,'.$id,
		];

		$rulesMessage = [
			'titleEdit.required' => 'Title: can not be empty.',
			'titleEdit.string' => 'Title: String only.',
			'titleEdit.min' => 'Title: Minimum is 6 characters.',
			'titleEdit.max' => 'Title: Maximum is 100 characters.',
			'titleEdit.unique' => 'Title: already exist.',

			'bodyEdit.required' => 'Body: can not be empty.',
			'bodyEdit.string' => 'Body: String only.',
			'bodyEdit.min' => 'Body: Minimum is 6 characters.',
			'bodyEdit.max' => 'Body: Maximum is 100 characters.',
			'bodyEdit.unique' => 'Body: already exist.',
		];

		$validators = Validator::make($request->all(), $rules, $rulesMessage);

		if($validators->fails()) {
			return response($validators->errors(), 401);
		}

		try {
			$posts = Post::find($id);

			$posts->title = $request->titleEdit;
			$posts->body = $request->bodyEdit;

			$posts->save();

			return 'true';
		}
		catch(Exception $e) {
			return 'false';
		}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	public function deleteAjax($id) {
		try{ 
			return Post::find($id);
		}
		catch(Exception $e) {
			return 'false';
		}
	}

	public function destroyAjax($id) {
		try {
			Post::destroy($id);
			return 'true';
		}
		catch(Exception $e) {
			return 'false';
		}
	}
}
