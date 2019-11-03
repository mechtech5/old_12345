@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{ route('ayushiblogs.article.create') }}" class="btn btn-primary">Create New</a>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Author</th>
					<th>Title</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($articles as $article)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>{{$article->user->username}}</td>
						<td>{{$article->title}}</td>
						<td>
							<a href="{{ route('ayushiblogs.article.show', $article->id) }}">View</a>
							<a href="{{ route('ayushiblogs.article.edit', $article->id) }}">Edit</a>
							<a href="#" onclick="event.preventDefault(); 
								if(confirm('Are your sure?')){
									getElementById('delete-form-{{$article->id}}').submit();
								}">Delete</a>
							<form id="delete-form-{{$article->id}}"  action="{{ route('ayushiblogs.article.destroy', $article->id) }}" method="POST" style="display: none">
								@csrf
								@method('DELETE')
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection