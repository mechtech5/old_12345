@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{ route('rounds.create') }}">Create a Round</a> | 
		<form action="{{ route('rounds.join') }}" method="POST">
			@csrf
			<input type="text" name="invite_code">
			<input type="submit">
		</form>

		<div class="row">
			<div class="col-4">
				<div class="card">
					<div class="card-header">Standby Rounds</div>
					<div class="card-body">
						@foreach($standby as $row)
							<a href="{{ route('rounds.show', $row->id) }}">{{ $row->title }}</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-header">Ongoing Rounds</div>
					<div class="card-body">
						@foreach($ongoing as $row)
							<a href="{{ route('rounds.show', $row->id) }}">{{ $row->title }}</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-header">Played Rounds</div>
					<div class="card-body">
						@foreach($played as $row)
							<a href="{{ route('rounds.show', $row->id) }}">{{ $row->title }}</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection