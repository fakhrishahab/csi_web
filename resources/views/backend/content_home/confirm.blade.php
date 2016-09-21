@extends('layouts.backend')

@section('title', 'Confirm Delete Content '.$content->id)

@section('content')

	{!! Form::open([
		'method' => 'delete',
		'route' => ['backend.content_home.destroy', $content->id]
	]) !!}

	<div class="alert alert-danger">
		<strong>Warning</strong> You are about to delete a content. This action cannot be undone. Are you sure you want to continue? 
	</div>

	{!! Form::submit('Yes, delete this content!', ['class' => 'btn btn-danger']) !!}

	<a href="{{ route('backend.pages.index') }}" class="btn btn-primary"><strong>No, get me out of here!</strong></a>

	{!! Form::close() !!}

@endsection