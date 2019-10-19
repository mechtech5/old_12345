<?php

namespace App\Http\Controllers\Modules\Compete;

use App\Http\Controllers\Controller;

class RoundDetailsController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
  	$rounds = Round::all();
  	return view('compete.rounds.index', ['rounds' => $rounds]);
  }
}