<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') &mdash; CSI Group</title>
	<link rel="stylesheet" type="text/css" href="{{ theme('css/backend.css') }}">

	<script src="{{ theme('js/simplemde.js') }}"></script>
</head>
<body>
	<nav class="navbar navbar-static-top navbar-inverse">
		<div class="container">
			<div class="navbar-header"><a href="/" class="navbar-brand">CSI Group</a></div>
			<ul class="nav navbar-nav">
				<li><a href="{{ route('backend.users.index') }}">Users</a></li>
				<li><a href="{{ route('backend.pages.index') }}">Pages</a></li>
				<li><a href="{{ route('backend.blog.index') }}">Blog Post</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><span class="navbar-text">Hello, {{$admin->name}}</span></li>
				<li><a href="{{ route('auth.logout') }}">Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>@yield('title')</h3>

				@if($errors->any())
					<div class="alert alert-danger">
						<strong>We found some errors!</strong>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				@if($status)

				<div class="alert alert-info">
					{{ $status }}
				</div>

				@endif

				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>