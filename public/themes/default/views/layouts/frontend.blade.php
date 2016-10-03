<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') &mdash; CSI</title>
	<link rel="stylesheet" href="{{ theme('css/frontend.css') }}">
</head>
<body>
	
	<nav class="navbar navbar-default navbar-fixed-top navbar-csi">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
				<a href="/" class="navbar-brand">
					<img src="{{ theme('images/logo.png') }}" alt="CSI Group">
				</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@include('partials.navigation')
				</ul>
			</div>
		</div>
	</nav>

	
		<div class="row">
			<div class="col-12">
				@yield('content')
			</div>
		</div>
	
	<script src="{{ theme('js/frontend.js') }}"></script>
	<script>
		$(document).ready(function(){
			$('.carousel').carousel();
			// $('.service-slide').carousel();
			var navbar = $('.navbar-nav > li');
			$('a', navbar).on('click', function(){
				$(this).parent().addClass('active');
				$(this).parent().siblings('li').removeClass('active');
			})
		})
	</script>
</body>
</html>