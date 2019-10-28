@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{ route('article.create') }}" class="btn btn-primary">Create New</a>
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
						<td>{{$article->user->name}}</td>
						<td>{{$article->title}}</td>
						<td>
							<a href="{{ route('article.show', $article->id) }}">View</a>
							<a href="{{ route('article.edit', $article->id) }}">Edit</a>
							<a href="#" onclick="event.preventDefault(); 
								if(confirm('Are your sure?')){
									getElementById('delete-form-{{$article->id}}').submit();
								}">Delete</a>
							<form id="delete-form-{{$article->id}}"  action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: none">
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