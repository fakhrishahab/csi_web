@extends('layouts.backend')

@section('title', 'Messages')

@section('content')
	
	<table class="table table-hover">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Message</th>
		</thead>

		<tbody>
			@if($messages->isEmpty())
				<tr colspan="3" align="center">
					<td>There is No Message</td>
				</tr>
			@else
				@foreach($messages as $message)
					<tr>
						<td>{{ $message->name }}</td>
						<td>{{ $message->email }}</td>
						<td>{{ $message->message }}</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	{!! $messages->render() !!}
@endsection