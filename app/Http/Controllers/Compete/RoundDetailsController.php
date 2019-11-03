<?php

namespace App\Http\Controllers\Modules\Compete;

use App\Http\Controllers\Controller;
use App\Models\Compete\Round;
use App\Models\Compete\RoundDetail;

class RoundDetailsController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function store()
  {
  	$vdata = request()->validate([
  		'round_id' => 'required',
  		'question' => 'required'
  	]);

  	$round = Round::find($vdata['round_id']);

  	$round_detail = RoundDetail::create([
  		'round_id' => $vdata['round_id'],
  		'question' => $vdata['question'],
  		'asker_id' => auth()->user()->id
  	]);

  	return redirect(route('rounds.show', $round));
  }

  public function update(RoundDetail $round_detail)
  {
    // return request()->all();
    request()->validate([
      'type' => 'required'
    ]);

    $round = Round::find($round_detail->round_id);

    if(request()->type == 'response')
    {
      $vdata = request()->validate([
        'response' => 'required'
      ]);

      $round_detail->responder_id = auth()->user()->id;
      $round_detail->response = $vdata['response'];

      $round_detail->update();

      return redirect(route('rounds.show', $round));
    }
    elseif(request()->type == 'skipped')
    {
      $round_detail->skipped = 1;
      $round_detail->update();

      return redirect(route('rounds.show', $round));
    }
    elseif(request()->type == 'eval')
    {
      $vdata = request()->validate([
        'solution' => 'required',
        'marks' => 'required'
      ]);

      $round_detail->solution = $vdata['solution'];
      $round_detail->marks = $vdata['marks'];
      $round_detail->update();

      return redirect(route('rounds.show', $round));
    }
  }
}