@extends('layouts.app')

@section('content')
  <home-feed :logged_user="{{ json_encode(auth()->user()) }}"></home-feed>
@endsection