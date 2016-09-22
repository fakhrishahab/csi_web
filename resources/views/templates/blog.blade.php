@foreach($posts as $post)

	<article>
		<!-- FOR ARTICLE TEMPLATE -->
		<!-- {{ route('blog.post', [$post->id, $post->slug]) }} -->
		<!-- AND ADD /article/{id}/{slug} on database page -->
		<h2> <a href="#">{{ $post->title }}</a></h2>
		<p>
			Posted by {{ $post->author->name }} on {{ $post->published_date }}
		</p>

		{!! $post->excerpt_html or $post->body_html !!}
	</article>

@endforeach

{!! $posts->render() !!}