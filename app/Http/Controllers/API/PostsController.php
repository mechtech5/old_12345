<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Social\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
  	return response()->json(Post::all(), 200);
  }

  public function show(Post $post)
  {
  	return response()->json($post, 200);
  }

  public function store()
  {
  	$post = Post::firstOrCreate([
  		'user_id' => auth()->user()->id,
  		'title' => request('title'),
  		'body' => request('body'),
  		// 'media' => request('media')
  	]);

  	return response()->json($post, 201);
  }

  public function update($id)
  {
  	$post = Post::updateOrCreate(
  		['id' => $id],
  		['title' => request('title'), 'body' => request('body')]
  	);

  	return response()->json($post, 200);
  }

  public function destroy(Post $post)
  {
  	//
  }
}