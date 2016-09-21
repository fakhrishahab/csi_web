@extends('layouts.backend')

@section('title', $content->exists ? 'Editing '.$content->id : 'Create New Content Home')

@section('content')

	{!! 
		Form::model($content, [
			'method' => $content->exists ? 'put' : 'post',
			'files' => true,
			'route' => $content->exists ? ['backend.content_home.update', $content->id] : ['backend.content_home.store', $content->id] 
		])
	!!}

	<div class="form-group">
		{!! Form::label('headline') !!}
		{!! Form::textarea('headline', null, ['class' => 'form-control', 'id' => 'headline']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('description') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Featured Image') !!}
		{!! Form::file('image', null, ['class'=>'form-control']) !!}
	</div>

	{!! Form::submit($content->exists ? 'Save Content' : 'Create New Content Home', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}
	

<script>
	// new SimpleMDE().render();
	$(document).ready(() => {
		var headline = $('#headline');
		var description = $('#description');

		var option = {
			height : 300,
			toolbar: [
		        ['style', ['bold', 'italic', 'underline', 'clear']],
		        ['font', ['strikethrough', 'superscript', 'subscript']],
		        ['fontsize', ['fontsize']],
		        ['color', ['color']],
		        ['para', ['ul', 'ol', 'paragraph']],
		        ['height', ['height']]
		    ]
		};

		headline.summernote(option);
		description.summernote(option);

		// content.summernote('content', content.text());
	})
</script>

@endsection