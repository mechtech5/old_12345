@extends('layouts.app')

@section('content')
	<form action="{{ route('rounds.store') }}" method="POST">
		@csrf
		<input type="text" name="title" placeholder="title">
		<input type="number" name="no_of_ques" placeholder="no_of_ques">
		<input type="number" name="marks_per_ques" placeholder="marks_per_ques">
		<input type="submit">
	</form>
@endsection