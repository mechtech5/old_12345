@extends('layouts.app')

@section('content')

	@php $posts = []; @endphp
  <landing-page :logged_user="{{ json_encode(auth()->user()) }}" 
  	:posts="{{ json_encode($posts) }}"></landing-page>
  	
@endsection