<?php

namespace App\Http\Controllers\Compete;

use App\Http\Controllers\Controller;
use App\Models\Compete\Round;
use App\User;

class RoundsController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function join()
  {
  	$vdata = request()->validate([
  		'invite_code' => 'required'
  	]);

  	$round = Round::where('invite_code', $vdata['invite_code'])
  		->where('started', 0)->where('ended', 0)->first();
      
  	if($round && $round->p1 != auth()->user()->id)
  	{
	  	$round->p2 = auth()->user()->id;
			$round->update();
  	}

  	return redirect(route('rounds.show', $round));
  }

  public function index()
  {
  	$rounds = Round::all();
  	return view('compete.rounds.index', ['rounds' => $rounds]);
  }

  public function create()
  {
  	return view('compete.rounds.create');
  }

  public function store()
  {
    $vdata = request()->validate([
      'title' => 'required',
      'no_of_ques' => 'required',
      'marks_per_ques' => 'required'
    ]);

    $round = Round::create([
      'p1' => auth()->user()->id,
      'title' => $vdata['title'],
      'no_of_ques' => $vdata['no_of_ques'],
      'marks_per_ques' => $vdata['marks_per_ques'],
      'invite_code' => substr(sha1(time()), 0, 10)
    ]);

    return redirect(route('rounds.show', $round));
  }

  public function show($id)
  {
    $round = Round::with('details')->where('id', $id)->first();
  	$user_id = auth()->user()->id;
  	$p1 = User::find($round->p1);
  	$p2 = User::find($round->p2);
  	if($round->p1 == $user_id)
  	{
  		return view('compete.rounds.show', [
  			'round' => $round,
  			'p1' => $p1,
  			'p2' => $p2
  		])->with('status', 'Welcome - Player 1');
  	}
  	elseif($round->p2 == $user_id)
  	{
  		return view('compete.rounds.show', [
  			'round' => $round,
  			'p1' => $p1,
  			'p2' => $p2
  		])->with('status', 'Welcome - Player 2');
  	}
  	else
  	{
  		return redirect(route('compete.dashboard.index'))->with('status', 'Invalid User!');
  	}
  }
}