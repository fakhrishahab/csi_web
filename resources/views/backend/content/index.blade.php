@extends('layouts.backend')

@section('title', 'List Content')

@section('content')

	<a href="{{ route('backend.content.create') }}" class="btn btn-primary">
		Create New Content
	</a>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>Page</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($content as $data)
				<tr>
					<td>{{ $data->title }}</td>
					<td>{{ $data->page->name }}</td>
					<td>
						<a href="{{ route('backend.content.edit', $data->id) }}">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
					</td>
					<td>
						<a href="{{ route('backend.content.confirm', $data->id) }}">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $content->render() !!}
@endsection