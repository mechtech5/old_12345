@extends('layouts.app')

@section('content')
  <home-feed :logged_user="{{ json_encode(auth()->user()) }}" :posts="{{ json_encode($posts) }}"></home-feed>
@endsection