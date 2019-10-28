<?php

namespace App\Http\Controllers\Modules\Ayushiblogs;

use App\Http\Controllers\Controller;
use App\Models\Article;

class MainController extends Controller
{
	public function index()
	{
		return view('ayushiblogs.index');
	}

	public function showArticle(Article $article)
	{
		return view('ayushiblogs.post', ['article' => $article]);
	}
}