<?php

namespace App\Http\Controllers\Ayushiblogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Wink\WinkPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(12);

        return view('ayushiblogs.index', [
            'posts' => $posts
        ]);
    }

    public function show($slug)
    {
        $post = WinkPost::with('tags')->where('slug', $slug)->first();
        return view('ayushiblogs.show', ['post' => $post]);
    }

    public function contact()
    {
        //
    }

    public function about()
    {
        //
    }

    public function topics()
    {
        //
    }
}
