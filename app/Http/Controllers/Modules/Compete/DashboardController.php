<?php

namespace App\Http\Controllers\Modules\Compete;

use App\Http\Controllers\Controller;
use App\Models\Compete\Round;

class DashboardController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
  	$standby = Round::where('p1', auth()->user()->id)->where('started', 0)->where('ended', 0)->get();
  	$ongoing = Round::where('p1', auth()->user()->id)->where('started', 1)->where('ended', 0)->get();
  	$played = Round::where('p1', auth()->user()->id)->where('started', 1)->where('ended', 1)->get();

  	return view('compete.dashboard.index', [
  		'standby' => $standby,
  		'ongoing' => $ongoing,
  		'played' => $played
  	]);
  }
}