@extends('layouts.app')

@section('content')

	<div class="container-fluid">
	  <profile-component :logged_user="{{ json_encode(auth()->user()) }}" 
  	></profile-component>
	</div>

@endsection