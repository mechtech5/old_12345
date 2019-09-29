@extends('layouts.app')

@section('content')
	@if(!$user->profile)
		<div class="text-center">
			<a href="/profile/setup" class="btn btn-primary">Generate Profile</a>
		</div>
	@else
	<div class="container">
		<div class="card">
			<div class="card-body">
				<p>{{ $user->name }}</p>
				<small>{{ $user->profile->username }}</small>
			</div>
		</div>
	</div>
	@endif
@endsection