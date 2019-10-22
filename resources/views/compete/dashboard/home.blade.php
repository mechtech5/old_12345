@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-3">
				<a href="{{ route('rounds.create') }}" class="btn btn-outline-primary">Create a Round</a>
			</div>
			
			<div class="col-12">
				<p class="text-center">OR</p>
			</div>
			

			<div class="col-6 offset-3">
				<form action="{{ route('rounds.join') }}" method="post" class="row mb-2">
	        @csrf
	        <div class="col-10 pr-0"><input type="text" name="invite_code" placeholder="Enter Invite Code" class="form-control"></div>
	        <div class="col-2 text-right pl-0">
	          <button class="btn btn-outline-primary form-control" type="submit">Join</button>
	        </div>
	      </form>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-12">
				<h4 class="text-center">My Gameplay</h4>
			</div>
			
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