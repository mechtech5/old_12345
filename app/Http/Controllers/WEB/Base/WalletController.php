<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\Controller;

class WalletController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }

	public function index()
	{
		
	}
}