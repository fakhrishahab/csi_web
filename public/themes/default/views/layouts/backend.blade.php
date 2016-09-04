<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') &mdash; CSI Group</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/csi/public/css/backend.css">
</head>
<body>
	<nav class="navbar navbar-static-top navbar-inverse">
		<div class="container">
			<div class="navbar-header"><a href="/" class="navbar-brand">CSI Group</a></div>
			<ul class="nav navbar-nav">
				<li><a href="#">Item 1</a></li>
				<li><a href="#">Item 2</a></li>
				<li><a href="#">Item 3</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><span class="navbar-text">Hello, Awan</span></li>
				<li><a href="{{ route('auth.logout') }}">Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>@yield('title')</h3>

				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>