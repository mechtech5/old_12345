<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\Social\UserSocial;
use App\User;
use Illuminate\Http\Request;

class SocialController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
	}
	
  public function add()
  {
  	$receiver_id = request('receiver_id');

  	$connection = UserSocial::create([
  		'sender_id' => auth()->user()->id,
  		'receiver_id' => $receiver_id
  	]);

		$user = User::where('id', $receiver_id)->first();
		$user->request = UserSocial::find($connection->id);

  	return response()->json($user, 201);
	}
	
	public function accept()
  {
  	$req = UserSocial::find(request('req_id'));
		$req->accepted_at = now();
		$req->update();

		$user = User::where('id', request('sender_id'))->first();
		$user->request = $req;

  	return response()->json($user, 200);
	}
	
	public function decline()
  {
  	$req = UserSocial::find(request('req_id'));
		$req->delete();

		$user = User::where('id', request('sender_id'))->first();

  	return response()->json($user, 201);
  }
}
