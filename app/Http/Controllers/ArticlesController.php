<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('user')->paginate(10);
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'slug' => 'required',
            'body' => 'required'
        ]);

        $article = Article::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'slug' => $request->slug,
            'body' => $request->body,
            'featured' => $request->featured
        ]);

        return redirect(route('article.index'))->with('status', 'An article has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
       $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'slug' => 'required',
            'body' => 'required'
        ]);

        $article->title = $request->title;
        $article->excerpt = $request->excerpt;
        $article->slug = $request->slug;
        $article->body =  $request->body;
        $article->featured =  $request->featured;

        $article->update();

        return redirect(route('article.index'))->with('status', 'An article has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('article.index'))->with('status', 'An article has been deleted!');
    }
}