@extends('layouts.backend')

@section('title', $page->exists ? 'Editing '.$page->title : 'Create New Page')

@section('content')
	
	{!! 
		Form::model($page, [
			'method' => $page->exists ? 'put' : 'post',
			'files' => true,
			'route' => $page->exists ? ['backend.pages.update', $page->id] : ['backend.pages.store', $page->id] 
		])
	!!}

	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('uri', 'URI') !!}
		{!! Form::text('uri', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}

		<p class="help-block">
			This name is used to generate links to the page.
		</p>
	</div>

	<div class="checkbox">
		<label for="">
			{!! Form::checkbox('type') !!}

			Show on self page

			<span class="help-block">
				Checking this will notice this page will be shown on the home page.
			</span>
		</label>
	</div>

	<div class="form-group row">
		<div class="col-md-12">
			{!! Form::label('template') !!}
		</div>
		<div class="col-md-4">
			{!! Form::select('template', $templates, null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-12">
			{!! Form::label('order') !!}
		</div>
		<div class="col-md-2">
			{!! Form::select('order', [
				'' => '',
				'before' => 'Before',
				'after' => 'After',
				'childOf' => 'Child Of'
			], null, ['class' => 'form-control']) !!}
		</div>
		<div class="col-md-5">
			{!! Form::select('orderPage', [
				'' => ''] + $orderPages->lists('padded_title', 'id')->toArray(), 
				null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('content', 'Body') !!}
		{!! Form::textarea('content', null, ['class'=>'form-control', 'id' => 'content']) !!}

		<!-- <div id="content">
			
		</div> -->
	</div>

	<div class="form-group">
		{!! Form::label('image', 'Featured Image') !!}
		{!! Form::file('image', null, ['class'=>'form-control']) !!}

		<div class="image-preview" style="background-image:url('{!! $app['config']['app.url'] !!}/{!! $page->image !!}')"></div>
	</div>

	<div class="checkbox">
		<label for="">
			{!! Form::checkbox('hidden') !!}

			Hide page from navigation

			<span class="help-block">
				Checking this will hide the page from the navigation. Can only be applied to pages without children.
			</span>
		</label>
	</div>

	{!! Form::submit($page->exists ? 'Save Page' : 'Create New Page', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}

	<script>
		// new SimpleMDE().render();
		$(document).ready(() => {
			var content = $('#content');

			var elm = {
				imageFeatured : $('input[name=image]')
			}

			content.summernote({
				height : 300,
				toolbar: [
			        ['style', ['bold', 'italic', 'underline', 'clear']],
			        ['font', ['strikethrough', 'superscript', 'subscript']],
			        ['fontsize', ['fontsize']],
			        ['color', ['color']],
			        ['para', ['ul', 'ol', 'paragraph']],
			        ['height', ['height']]
			    ]
			});
			// content.summernote('content', content.text());

			elm.imageFeatured.on('change', function(evt){
				previewImage($(this), evt);
			})

			function previewImage(element, evt){
				if (evt.target.files && evt.target.files[0]) {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			        	element.siblings('.image-preview').css('background-image', 'url('+e.target.result+')');
			        }

			        reader.readAsDataURL(evt.target.files[0]);
			    }
			}
		})
	</script>

@endsection