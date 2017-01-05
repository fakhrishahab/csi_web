<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='shortcut icon' type='image/x-icon' href='public/images/favicon.ico' />
	{{-- <link rel="icon" type="image/png" href="public/images/favicon.ico"> --}}

	<title>@yield('title') &mdash; CSI</title>
	<link rel="stylesheet" href="{{ theme('css/frontend.css') }}">
</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">
	
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
	<script src="{{ theme('js/SmoothScroll.js') }}"></script>
	<script src="{{ theme('js/owl.carousel.js') }}"></script>
	<script>
		var SITE_PATH = document.location.href;
		
		$(document).ready(function(){
			$('a[href*="#"]:not([href="#"]):not(.carousel-control)').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					
					if (target.length) {
						$('html, body').animate({
							scrollTop: target.offset().top
						}, 1000);
						return false;
					}
				}
			});

			$('.carousel').carousel();
			// $('.service-slide').carousel();
			var navbar = $('.navbar-nav > li');
			$('a', navbar).on('click', function(){
				$(this).parent().addClass('active');
				$(this).parent().siblings('li').removeClass('active');
			})

			var owl = $('#owl-demo');

			owl.owlCarousel({
				autoPlay: 3000,
				items : 5,
				itemsDesktop : [1500,5],
				itemsDesktopSmall : [1000,3],
      			itemsMobile : [800,2],
    			// itemsCustom : [[1500,5], [1400,4], [1000, 3], [800, 2]],
      			lazyLoad: true,
    			itemsScaleUp:true
			});


			var element = {
				inputSubscribe : $('#email-subscribe'),
				btnSubscribe : $('.btn-subscribe'),
				btnSendMessage : $('.btn-send-message'),

				inputName: $('input[name=contact-name-input]'),
				inputEmail: $('input[name=contact-email-input]'),
				inputMessage: $('textarea[name=contact-message-input]')
			};

			element.btnSubscribe.on('click', function(){
				var $btn = $(this).button('loading')
				$.ajax({
					url: SITE_PATH+'subscribe/create',
					type: 'post',
					data : {
						'email' : element.inputSubscribe.val()
					},
					success: function(result){
						console.log(result);
						$btn.button('reset')
						element.inputSubscribe.val('');
					},
					error : function(resp){
						console.log(resp)
						$btn.button('reset')
					}
				})
			});

			element.btnSendMessage.on('click', function(){
				var $btn = $(this).button('loading')
				$.ajax({
					url : SITE_PATH+'contact/create',
					type: 'post',
					data : {
						'name' : element.inputName.val(),
						'email' : element.inputEmail.val(),
						'message' : element.inputMessage.val()
					},
					success : function(result){
						console.log(result)
						$btn.button('reset')

						element.inputName.val('');
						element.inputEmail.val('');
						element.inputMessage.val('');
					},
					error : function(resp){
						console.log(resp)
						$btn.button('reset')
					}
				})
			})
		})

		$(window).on('scroll', function(){
			if($(this).scrollTop() >= 500){
				$('.navbar-csi').addClass('active');
			}else{
				$('.navbar-csi').removeClass('active');
			}
			// console.log($(this).scrollTop())
		})
	</script>
</body>
</html>