<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('vue-pages.home');
  }

  public function profile()
	{
		return view('vue-pages.profile');
	}

}
