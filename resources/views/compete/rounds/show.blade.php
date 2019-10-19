@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		@isset($status)
			<div class="alert alert-info">{{ $status }}</div>
		@endisset

		<div class="card">
			<div class="card-header">
		    {{ $round->title }} | {{ $p1->username }} vs {{ $p2->username }} |
		    <span class="float-right">{{ $round->invite_code }}</span>
		  </div>
			<div class="card-body">
				<div class="row">
					<div class="col-8 offset-2 text-center">
						<form action="{{ route('round_details.store') }}" method="POST">
							@csrf
							<textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
							<input type="submit">
						</form>
					</div>
					<div class="col-6 text-center">
						<p class="">Me</p>
						@foreach($round->details as $row)
							@if($row->creator_id != auth()->user()->id)
								@if(empty($row->response))
									<div class="card">
										<div class="card-header">{{ $row->question }}</div>
										<div class="card-body">
											<form action="">
												<textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
												<input type="submit">
											</form>
										</div>
									</div>
								@else
									<p>{{ $row->response }}</p>
								@endif
							@endif
						@endforeach
					</div>
					<div class="col-6 text-center">
						<p class="text-center">Opponent</p>
						@foreach($round->details as $row)
							@if($row->creator_id == auth()->user()->id)
								@if(empty($row->response))
									<div class="card">
										<div class="card-header">{{ $row->question }}</div>
										<div class="card-body">
											<form action="">
												<textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
												<input type="submit">
											</form>
										</div>
									</div>
								@else
									<p>{{ $row->response }}</p>
								@endif
							@endif
						@endforeach		
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection