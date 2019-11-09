<?php

namespace App\Http\Controllers\Ayushiblogs;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Wink\WinkAuthor;
use Wink\WinkPost;
use Wink\WinkTag;

class BlogController extends Controller
{
    public function index()
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->latest('publish_date')
            ->get();
            // ->simplePaginate(12);

        $author = WinkAuthor::where('slug', 'ayushi-likhar')->first();   
        $tags = WinkTag::get()->random(3);

        return view('ayushiblogs.index', [
            'posts' => $posts,
            'latest_posts' => $posts->take(3),
            'random_posts' => $posts->random(3),
            'author' => $author,
            'tags' => $tags,
        ]);
    }

    public function show($slug)
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->latest('publish_date')
            ->get();

        $author = WinkAuthor::where('slug', 'ayushi-likhar')->first();   
        $tags = WinkTag::get()->random(3);

        $post = WinkPost::with('tags')->where('slug', $slug)->first();

        $visitor = new Visitor;
        $visitor->log();

        return view('ayushiblogs.show', [
            'post' => $post,
            'author' => $author,
            'latest_posts' => $posts->take(3),
            'random_posts' => $posts->random(3),
            'tags' => $tags,
        ]);
    }

    public function contact()
    {
        //
    }

    public function about()
    {
        //
    }

    public function network()
    {
        //
    }
}
