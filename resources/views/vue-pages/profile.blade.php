@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
	  <profile-component :logged_user="{{ json_encode(auth()->user()) }}" 
	  	></profile-component>
  </div>
</div>
@endsection