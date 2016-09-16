@extends('layouts.backend')

@section('title', 'Pages')

@section('content')

	<a href="{{ route('backend.pages.create') }}" class="btn btn-primary">
		Create New Page
	</a>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>URI</th>
				<th>Name</th>
				<th>Template</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			
			@if($pages->isEmpty())

				<tr>
					<td colspan="5" align="center">There are no pages.</td>
				</tr>

			@else

				@foreach($pages as $page)

					<tr class="{{ $page->hidden ? 'warning' : '' }}">
						<td>
							{!! $page->linkToPaddedTittle(route('backend.pages.edit', $page->id)) !!}
						</td>
						<td><a href="{{ url($page->uri) }}">{{ $page->pretty_uri }}</a></td>
						<td>{{ $page->name or 'None'}} </td>
						<td>{{ $page->template or 'None'}} </td>
						<td>
							<a href="{{ route('backend.pages.edit', $page->id) }}">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							@if($page->type)
							<a href="{{ route('backend.content_home.list', $page->id) }}">
								<span class="glyphicon glyphicon-th-list"></span>
							</a>
							@endif
						</td>
						<td>
							<a href="{{ route('backend.pages.confirm', $page->id) }}">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
						</td>
					</tr>

				@endforeach

			@endif

		</tbody>
	</table>

@endsection