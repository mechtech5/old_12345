@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{ route('rounds.create') }}">Create a Round</a> | 
		<form action="{{ route('rounds.join') }}" method="POST">
			@csrf
			<input type="text" name="invite_code">
			<input type="submit">
		</form>

		<div class="card">
			<div class="card-body">
				
			</div>
		</div>
	</div>
@endsection