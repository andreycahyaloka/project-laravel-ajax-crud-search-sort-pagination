<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Yajra\DataTables\Datatables;
// use Session;
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
		return view('/guests/index');
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
		$rules = [
			'title' => 'required|string|min:6|max:100|unique:posts,title',
			'body' => 'required|string|min:6|max:255|unique:posts,body',
		];

		$rulesMessage = [
			'title.required' => 'Title: can not be empty.',
			'title.string' => 'Title: String only.',
			'title.min' => 'Title: Minimum is 6 characters.',
			'title.max' => 'Title: Maximum is 100 characters.',
			'title.unique' => 'Title: already exist.',

			'body.required' => 'Body: can not be empty.',
			'body.string' => 'Body: String only.',
			'body.min' => 'Body: Minimum is 6 characters.',
			'body.max' => 'Body: Maximum is 100 characters.',
			'body.unique' => 'Body: already exist.',
		];

		$validators = Validator::make($request->all(), $rules, $rulesMessage);

		if($validators->fails()) {
			return response($validators->errors(), 401);
		}

		$posts = [
			'title' => $request['title'],
			'body' => $request['body'],
		];

		return Post::create($posts);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$posts = Post::find($id);

		return $posts;
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
		$rules = [
			'title' => "required|string|min:6|max:100|unique:posts,title,$id",
			'body' => 'required|string|min:6|max:255|unique:posts,body,'.$id,
		];

		$rulesMessage = [
			'title.required' => 'Title: can not be empty.',
			'title.string' => 'Title: String only.',
			'title.min' => 'Title: Minimum is 6 characters.',
			'title.max' => 'Title: Maximum is 100 characters.',
			'title.unique' => 'Title: already exist.',

			'body.required' => 'Body: can not be empty.',
			'body.string' => 'Body: String only.',
			'body.min' => 'Body: Minimum is 6 characters.',
			'body.max' => 'Body: Maximum is 100 characters.',
			'body.unique' => 'Body: already exist.',
		];

		$validators = Validator::make($request->all(), $rules, $rulesMessage);

		if($validators->fails()) {
			return response($validators->errors(), 401);
		}

		$posts = Post:: find($id);

		$posts->title = $request['title'];
		$posts->body = $request['body'];
		$posts->update();

		return $posts;
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
		Post::destroy($id);
    }

	public function apiPost() {
		$posts = Post::all();

		return Datatables::of($posts)
			->addColumn('action', function($posts) {
				return '<a href="#" class="btn btn-outline-info btn-sm" style="width: 40px; margin: 0px 5px;"><i class="fa fa-eye"></i></a>'.
						'<a class="btn btn-outline-primary btn-sm" style="width: 40px; margin: 0px 5px;" onclick="editForm('.$posts->id.')"><i class="fa fa-edit"></i></a>'.
						'<a class="btn btn-outline-danger btn-sm" style="width: 40px; margin: 0px 5px;" onclick="deleteData('.$posts->id.')"><i class="fa fa-trash"></i></a>';
			})->make(true);
	}
}
