<?php namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
//use Illuminate\Http\Request;
use Input; 
use Request;

class PostsController extends Controller {
	
	public function __construct()
	{
		$this->middleware('auth',['except'=>'index']);	
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$posts = Post::all();
		return view('posts.index',compact('posts'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreatePostRequest $request)
	{
		//
		//Dont forget to validate variables with the request method
		$post = new Post;
		$post->title = Input::get('title');
		$post->artist = Input::get('artist');
		$post->body = Input::get('body');
		
		Post::create($request->all());
		
		//get info on image if posted
		if(Input::hasFile('thumbnail'))
		{
			$file = Input::file('thumbnail');
			//get name of image
			$name = time() . '-' . $file->getClientOriginalName();
			$file = $file->move(public_path().'/images/',$name );
			$post->thumbnail = $name;
			
			/*
			THE FOLLOWING ARE ALL THE OPTIONS YOU HAVE ACCESS TO:
			return [
				'path' => $file->getRealPath(),
				'size' => $file->getSize(),
				//'mime' => $file->getMimeType(), not working
				'name' => $file->getClientOriginalName(),
				'extension' =>$file->getClientOriginalExtension()
			];
			*/
		}// end of if statment
		else {
			$post->thumbnail = 'blank_avatar.jpg';
		}
		$post->save();
		return redirect('posts');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$post = Post::find($id);
		return view('posts.show',compact('post'));
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$post = Post::find($id);
		return view('posts.edit',compact('post'));
		
	}

	/**
	 * Update the specified resource in storage.
	 *In
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\CreatePostRequest $request,$id)
	{
		//
		$postUpdate = Request::all();
		$post = Post::find($id);
		$post->update($postUpdate);
		$post->save();
		return redirect('posts');
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		Post::find($id)->delete();
		return redirect('posts');
		
	}

}
