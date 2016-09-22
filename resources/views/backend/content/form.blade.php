@extends('layouts.backend')

@section('title', $content->exists ? 'Editing '.$content->id : 'Create New Content Home')

@section('content')

	{!! 
		Form::model($content, [
			'method' => $content->exists ? 'put' : 'post',
			'files' => true,
			'route' => $content->exists ? ['backend.content.update', $content->id] : ['backend.content.store', $content->id] 
		])
	!!}
	
	<div class="form-group">
		<div class="row">
			<div class="col-md-12">
				{!! Form::label('page') !!}	
			</div>
			
			<div class="col-md-4">
				{!! Form::select('page_id', $pages, null, ['class' => 'form-control']) !!}	
			</div>
		</div>
	</div>	

	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		  	Select/Upload Picture
		</button>	
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				</div>
				<div class="modal-body">
					<!-- <div class="row">
						<div class="col-md-3">
							Option
						</div>
						<div class="col-md-6">
							Image List
						</div>
						<div class="col-md-3">
							Preview
						</div>
					</div> -->
					<div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#select" aria-controls="select" role="tab" data-toggle="tab">Select Image From Gallery</a>
							</li>
							<li role="presentation">
								<a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">Upload New Image</a>
							</li>
						</ul>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="select">
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											{!! Form::label('image', 'Choose Image') !!}
											{!! Form::file('path', null, ['class'=>'form-control', 'id' => 'new-image']) !!}	
										</div>
										<div class="form-group">
											<button type="button" class="btn btn-primary" id="btn-new-upload">
											  	Upload Picture
											</button>
										</div>
									</div>
									<div class="col-md-3">
										<!-- <div class="form-group">
											{!! Form::label('Image Path', 'Choose Image') !!}
											{!! Form::text('imagePath', null, ['class'=>'form-control', 'id' => 'image-path']) !!}	
										</div> -->
									</div>
								</div>
								
							</div>
							<div role="tabpanel" class="tab-pane" id="upload">
								<div class="col-md-9">
									<div class="row" id="gallery-wrapper">
									
									</div>	
								</div>
								<div class="col-md-3">
									<img src="" class="img-responsive" id="img-preview">
									<div class="form-group">
										{!! Form::label('image-path', 'Image Path') !!}
										{!! Form::text('img-link', null, ['class'=>'form-control', 'id' => 'img-link']) !!}	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>

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
		var offset = 0, limit = 20;

		var option = {
			height : 300,
			toolbar: [
		        ['style', ['bold', 'italic', 'underline', 'clear']],
		        ['font', ['strikethrough', 'superscript', 'subscript']],
		        ['fontsize', ['fontsize']],
		        ['color', ['color']],
		        ['para', ['ul', 'ol', 'paragraph']],
		        ['height', ['height']],
		        ['insert', ['picture']],
		        ['misc', ['codeview']]
		    ]
		};

		headline.summernote(option);
		description.summernote(option);

		// content.summernote('content', content.text());
		var photo_file;
		var elm = {
			'newImage' : $('input[name=path]'),
			'btnUpload' : $('#btn-new-upload'),
			'galleryWrapper' : $('#gallery-wrapper'),
			'imgPreview' : $('#img-preview'),
			'imgLink' : $('#img-link')
		};

		elm.newImage.on('change', function(event){
			console.log(event);
			photo_file = event.target.files
		});	
		elm.btnUpload.on('click', function(){
			if(photo_file){
				var formData = new FormData();

				formData.append('path', photo_file[0]);

				$.ajax({
					type : 'post',
					url : 'http://localhost/csi/gallery/upload',
					data : formData,
					contentType : false,
					processData : false,
					success: function(resp){
						console.log('sukses');
						getGallery();
					},
					error : function(err){
						console.log('error ', err);
					}
				})
			}
		})
		console.log(window.location)
		getGallery();
		function getGallery(){
			elm.galleryWrapper.empty();

			$.ajax({
				type : 'get',
				url : 'http://localhost/csi/gallery?offset='+offset+'&limit='+limit,
				success : function(resp){
					resp.map(function(key){
						elm.galleryWrapper.append(`
							<div class="col-md-3 image-data" data-path=`+key.path+` style="height : 100px; text-align: center; padding : 10px; box-sizing : border-box">
								<div style="border: 1px solid #CCC; height : 100px">
									<img src=`+ "../../" +key.path +` class="img-responsive" style="height :100%!important; display:inline-block!important"/>
								</div>
							</div>
						`);
					})

					$('.image-data').on('click', function(){
						console.log($(this).data('path'));
						elm.imgPreview.attr('src', "../../"+$(this).data('path'));
						elm.imgLink.val(window.location.origin+'/'+$(this).data('path'))
					})
				},
				error : function(err){
					console.log('error ', err);
				}
			})
		}
	})


</script>

@endsection