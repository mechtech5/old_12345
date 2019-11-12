<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    // return $users = DB::table('users')
    //     ->where('users.id', '!=', auth()->user()->id)
    //     ->join('user_social', function ($join) {
    //         $join->on('users.id', '=', 'user_social.sender_id')
    //           ->orOn('users.id', '=', 'user_social.receiver_id');
    //     })
    //     ->select('users.*', 'user_social.sender_id', 'user_social.receiver_id', 'user_social.accepted')
    //     ->get();

    //  return $users = DB::table('users')
    //         ->leftJoin('user_social', 'users.id', '=', 'user_social.sender_id')
    //         ->orOn('user_social', 'users.id', '=', 'user_social.receiver_id');
    //         ->get();

    $user_id = auth()->user()->id;

    $users = User::where('id', '!=', $user_id)->get();
    $requests = DB::table('user_social')->where('sender_id', $user_id)->orWhere('receiver_id', $user_id)->get();


    return view('vue-pages.home', compact('users', 'requests'));
  }

  public function profile()
	{
		return view('vue-pages.profile');
	}

}
