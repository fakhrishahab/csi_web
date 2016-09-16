@extends('layouts.backend')

@section('title', 'List Content Home')

@section('content')

	<a href="#" class="btn btn-primary">
		Create New Content
	</a>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Headline</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($content as $data)
				<tr>
					<td>{{ $data->headline }}</td>
					<td>
						<a href="">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
					</td>
					<td>
						<a href="">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection