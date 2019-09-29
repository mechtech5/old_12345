<?php

namespace App\Http\Controllers\WEB\Base;

use App\Http\Controllers\Controller;
use App\Models\Base\Profile;
use App\User;

class ProfileController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }
	  		
	public function index()
	{
		$user = User::with('profile')->first();
		return view('base.profile.index', [
			'user' => $user
		]);
	}

	public function setup()
	{
		return view('base.profile.setup');
	}
}