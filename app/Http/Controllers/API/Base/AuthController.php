<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth:api');
  }
}