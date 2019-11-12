@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <home-component :logged_user="{{ json_encode(auth()->user()) }}"
    	:users="{{ json_encode($users) }}"
  		></home-component>
  </div>
</div>
@endsection
