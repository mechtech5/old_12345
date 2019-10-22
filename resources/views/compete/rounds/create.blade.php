@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-8 offset-2">
				<div class="card">
					<div class="card-header">
						Create a Round
					</div>
					<div class="card-body">
						<form action="{{ route('rounds.store') }}" method="POST">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control" name="title" placeholder="Give a title to this round...">
							</div>
							<div class="form-group row">
								<input type="number"class="form-control col-6" name="no_of_ques" placeholder="How many questions?">
								<input type="number" class="form-control col-6" name="marks_per_ques" placeholder="Points each question">
							</div>
							<div class="form-group text-center">
								<input type="submit" class="btn btn-success">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection