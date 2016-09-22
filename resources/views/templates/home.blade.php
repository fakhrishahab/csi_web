<div class="row">
	<div class="col-md-12" style="background-image:url({{ theme('images/homepage.jpg') }});background-size:100%;height:320px"></div>
</div>

<div class="row">
	@foreach($posts as $post)
		
		<div class="col-md-4">
			<!-- FOR ARTICLE TEMPLATE -->
			<!-- route('blog.post', [$post->id, $post->slug]) -->
			<!-- AND ADD /article/{id}/{slug} on database page -->
			<h2><a href="#">{{ $post->title }}</a></h2>

			<p>
				{{ $post->author->name }} on {{ $post->published_at }}
			</p>

			{!! $post->excerpt_html or $post->body_html !!}
		</div>

	@endforeach
</div>

<div class="row" style="background:#CCC;height:2000px"></div>

<div class="row" id="about">
	ini about
</div>