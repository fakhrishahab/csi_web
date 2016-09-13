@extends('layouts.backend')

@section('title', 'Dashboards backend')

@section('heading', 'Welcome to dashboard')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
				@foreach($posts as $post)
						
					<li class="list-group-item">
						<h4>
							<a href="#">{{ $post->title }}</a>
							<a href="{{ route('backend.blog.edit', $post->id) }}" class="pull-right">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</h4>
					</li>

				@endforeach
			</ul>
		</div>
		<div class="col-md-6"></div>
	</div>
@endsection