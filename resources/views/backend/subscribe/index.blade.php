@extends('layouts.backend')

@section('title', 'Subscribe')

@section('content')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			@if($subscribes->isEmpty())
				<tr>
					<td colspan="2" align="center">There is no subscribe yet</td>
				</tr>
			@else
				@foreach($subscribes as $subscribe)
					<tr>
						<td> {{ $subscribe->id }}</td>
						<td>{{ $subscribe->email }}</td>	
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>

	{!! $subscribes->render() !!}
@endsection