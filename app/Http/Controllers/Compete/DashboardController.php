<?php

namespace App\Http\Controllers\Compete;

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
    return view('compete.dashboard.index');
  }

  public function home()
  {
  	$standby = Round::where('p1', auth()->user()->id)->where('started', 0)->where('ended', 0)->get();
  	$ongoing = Round::where('p1', auth()->user()->id)->where('started', 1)->where('ended', 0)->get();
  	$played = Round::where('p1', auth()->user()->id)->where('started', 1)->where('ended', 1)->get();

  	return view('compete.dashboard.home', [
  		'standby' => $standby,
  		'ongoing' => $ongoing,
  		'played' => $played
  	]);
  }
}