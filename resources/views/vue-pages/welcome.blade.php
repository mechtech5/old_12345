@extends('layouts.app')

@section('content')

	@php $posts = []; @endphp
  <feed-component :logged_user="{{ json_encode(auth()->user()) }}" 
  	:posts="{{ json_encode($posts) }}"></feed-component>
  	
@endsection