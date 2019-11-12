<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\Social\UserSocial;
use Illuminate\Http\Request;

class SocialController extends Controller
{
  public function add()
  {
  	$receiver_id = request('receiver_id');

  	$connection = UserSocial::create([
  		'sender_id' => auth()->user()->id,
  		'receiver_id' => $receiver_id
  	]);

  	$user = User::where('id', $receiver_id)->first();

  	return response()->json($user, 201);
  }
}
