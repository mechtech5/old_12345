<?php

namespace App\Http\Controllers;


class MainController extends Controller
{
	public function index()
	{
		$posts = Post::all();
    return view('welcome', [
    	'posts' => $posts
    ]);
	}
}