<?php

namespace App\Http\Controllers\API\Social;

use App\Http\Controllers\Controller;
use App\Models\Social\Post;

class PostsController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
  	
  }

  public function show(Post $post)
  {
  	
  }

  public function store()
  {
  	$post = Post::firstOrCreate([
  		'user_id' => auth()->user()->id,
  		'title' => request('title'),
  		'body' => request('body')
  	]);
  }

  public function update($id)
  {
  	$post = Post::updateOrCreate(
  		['id' => $id],
  		['title' => request('title'), 'body' => request('body')]
  	);
  }

  public function destroy(Post $post)
  {
  	//
  }
}