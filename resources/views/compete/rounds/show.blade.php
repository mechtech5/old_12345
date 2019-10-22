@extends('layouts.app')

@push('styles')
	<style>
		body {
			font-family: 'Monaco';
		}
	</style>
@endpush

@section('content')
	<div class="container-fluid" style="background: transparent;">
		@isset($status)
			{{-- <div class="alert alert-info">{{ $status }}</div> --}}
		@endisset

		<div class="card">
			<div class="card-header">
		    Round: <b>{{ $round->title }}</b> <br>
		    Player1: <b>{{ $p1->username }}</b> <br>
		    Player2: <b>@isset($p2) {{ $p2->username }}</b> @endisset
		    <span class="float-right">Code: {{ $round->invite_code }}</span>
		  </div>

			<div class="card-body">
				<div class="row">
					<div class="col-8 offset-2 text-center">
						<form action="{{ route('round_details.store') }}" method="POST">
							@csrf
							<input type="hidden" name="round_id" value="{{ $round->id }}">
							<div class="form-group">
								<textarea class="form-control" name="question" id="" cols="30" rows="5" placeholder="Place a new question for opponent. Make sure it's a tough one :D"></textarea>
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit">
							</div>
							
						</form>
					</div>

					<div class="col-6 text-center">
						<p class="">Me</p>
						@foreach($round->details as $row)
							@if($row->asker_id != auth()->user()->id)
									<div class="card mb-5">
										<div class="card-header">{{ $row->question }}</div>
										<div class="card-body">
											@if(empty($row->response))
												<form action="{{ route('round_details.update', $row->id) }}" method="POST">
													@csrf
													@method('PATCH')
													<input type="hidden" value="response" name="type"> 
													<textarea name="response" class="form-control" id="" cols="30" rows="5"></textarea>
													<input type="submit">
												</form>
												<p>OR</p>
												<form action="{{ route('round_details.update', $row->id) }}" method="POST">
													@csrf
													@method('PATCH')
													<input type="hidden" value="skipped" name="type"> 
													<input type="submit" value="skip">
												</form>
											@elseif(!empty($row->response) && !empty($row->solution))
												<p>{{ $row->response }}</p>
												<p>Marks: {{ $row->marks }}</p>
												<p>Solution: {{ $row->solution }}</p>
											@else
												<p>{{ $row->response }}</p>
											@endif	
										</div>
									</div>
									
							@endif
						@endforeach
					</div>

					<div class="col-6 text-center">
						<p class="text-center">Opponent</p>
						@foreach($round->details as $row)
							@if($row->asker_id == auth()->user()->id)
								<div class="card mb-5">
										<div class="card-header">{{ $row->question }}</div>
										<div class="card-body">
											@if(!empty($row->response) && empty($row->marks) && empty($row->solution))
												<p>{{ $row->response }}</p>
												<form id="eval_form" action="{{ route('round_details.update', $row->id) }}" method="POST">
													@csrf
													@method('PATCH')
													<input type="hidden" value="eval" name="type"> 
													<input type="number" class="form-control" name="marks" placeholder="marks"> 
													<textarea name="solution" class="form-control" cols="30" rows="5" placeholder="solution"></textarea>
													<input type="submit">
												</form>
											@elseif(!empty($row->response) && !empty($row->marks) && !empty($row->solution))
												<p>{{ $row->response }}</p>
												<p>Marks: {{ $row->marks }}</p>
												<p>Solution: {{ $row->solution }}</p>
											@endif
										</div>
								</div>
							@endif
						@endforeach		
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection