
 <section id="home">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators"> 
			@foreach($home as $key => $home_content)
				@if($key==0)
					<li data-target="#carousel-example-generic" data-slide-to={{ $key }} class="active"></li>	
				@else
					<li data-target="#carousel-example-generic" data-slide-to={{ $key }}></li>	
				@endif
			@endforeach
			<!-- <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
		</ol>

		<div class="carousel-inner" role="listbox">
			@foreach($home as $key => $home_content)
				@if($key==0)
					<div class="item carousel-caption-home active" style="background-image:url({{ $home_content->background }})">
				@else
					<div class="item carousel-caption-home" style="background-image:url({{ $home_content->background }})">
				@endif
			
				<!-- <img src={{ $home_content->background }} alt=""> -->
				<div class="carousel-caption carousel-caption-home__wrapper">
					@if($key==0)
						<div class="carousel-caption-home__headline__main">
					@else
						<div class="carousel-caption-home__headline">
					@endif
						{!! $home_content->headline !!}	
					</div>
					<div class="carousel-caption-home__description">
						{!! $home_content->description !!}
					</div>
				</div>

				<div class="pattern-corner"></div>
			</div>
			@endforeach
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	</div>
</section>

<section class=""><div class="row divider"></div></section>

<section id="about-us" style="background:url({{ $about_page[0]->image }})" class="about-wrapper">
	<div class="carousel slide" id="carousel-about"  data-ride="carousel">
		<ol class="carousel-indicators"> 
			@foreach($about as $key => $about_content)
				@if($key==0)
					<li data-target="#carousel-about" data-slide-to={{ $key }} class="active"></li>	
				@else
					<li data-target="#carousel-about" data-slide-to={{ $key }}></li>	
				@endif
			@endforeach
		</ol>

		<div class="carousel-inner about-carousel-inner" role="listbox">
			@foreach($about as $key => $about_content)	
				@if($key != 1)		
					@if($key==0)
					<div class="item about-carousel-inner__wrapper active">
					@else
					<div class="item about-carousel-inner__wrapper">
					@endif
						<div class="about-carousel-inner__image">
							<img src="{!! $about_content->image !!}"  alt="">
						</div>
						<div class="about-carousel-inner__desc">
							<div class="about-carousel-inner__title">{!! $about_content->headline !!}	</div>
							{!! $about_content->description !!}	
						</div>
						
					</div>
				@else
					<div class="item about-carousel-inner__wrapper pull-top">
						<div class="about-carousel-inner__desc">
							<p class="about-carousel-inner__title">{!! $about_content->headline !!}	</p>
						</div>
					</div>
				@endif
				
			@endforeach
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-about" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-about" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	</div>
	<div class="pattern-corner"></div>
</section>

<section class=""><div class="row divider"></div></section>

<section id="key-people" class="keypeople-wrapper">
	<div id="carousel-keypeople" class="carousel slide" data-ride="carousel" >
		<ol class="carousel-indicators">
		@foreach($keypeople as $key => $keypeople_content)
			@if($key == 0)
			<li data-target="#carousel-keypeople" data-slide-to={{ $key }} class="active"></li>
			@else
			<li data-target="#carousel-keypeople" data-slide-to={{ $key }}></li>
			@endif
		@endforeach
		</ol>

		<div class="carousel-inner keypeople-carousel-inner" role="listbox">
		@foreach($keypeople as $key=> $keypeople_content)
			@if($key==0)
			<div class="item keypeople-carousel-inner__wrapper active" style="background-image:url({{ $keypeople_content->background }})">
			@else
			<div class="item keypeople-carousel-inner__wrapper" style="background-image:url({{ $keypeople_content->background }})">
			@endif
				
				<div class="keypeople-carousel-inner__content">
					<div class="keypeople-carousel-inner__image">
						<div class="keypeople-image-circle" style="background-image:url({!! $keypeople_content->image !!})"></div>
						<!-- <img src="{!! $app['config']['app.url'] !!}/{!! $keypeople_content->image !!}"  alt=""> -->
					</div>
					<div class="keypeople-carousel-inner__desc">
						<div class="keypeople-carousel-inner__title">{!! $keypeople_content->title !!}, <span>{!! $keypeople_content->headline !!}</span> </div>
						{!! $keypeople_content->description !!}	
					</div>
				</div>
				<div class="pattern-corner"></div>
			</div>
		@endforeach
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-keypeople" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-keypeople" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	</div>
</section>

<section class=""><div class="row divider"></div></section>

<section id="service" style="background:url({{ $service_page[0]->image }});"  class="service-wrapper">
	<div id="carousel-service" class="carousel slide" data-ride="carousel"  style="height:600px">
		<ol class="carousel-indicators carousel-indicators-service"> 
			@foreach($service as $key => $service_content)

				@if($key==0)
					<img class="carousel-service-indicators active" src="{!! $service_content->image !!}" data-target="#carousel-service" data-slide-to={{ $key }} >
				@else
					<img class="carousel-service-indicators " src="{!! $service_content->image !!}" data-target="#carousel-service" data-slide-to={{ $key }} >
				@endif
				
				
			@endforeach
			<!-- <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
		</ol>

		<div class="carousel-inner service-carousel-inner" role="listbox">
			@foreach($service as $key => $service_content)
				@if($key==0)
				<div class="item service-carousel-inner__wrapper active">
				@else
				<div class="item service-carousel-inner__wrapper">
				@endif
					<div class="service-carousel-inner__image">
						<img src="{!! $service_content->image !!}"  alt="">
					</div>
					<div class="service-carousel-inner__desc">
						<p class="service-carousel-inner__title">{!! $service_content->title !!}</p>
						{!! $service_content->headline !!}	
					</div>
				</div>
			@endforeach
		</div>
		
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-service" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-service" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	</div>
	<div class="pattern-corner"></div>
</section>

<section class=""><div class="row divider"></div></section>

<section id="testimoni" class="testimoni-wrapper" style="background-image:url({{ $testimoni_page[0]->image }})">
	<div id="carousel-testimoni" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			@foreach($testimoni as $key => $testimoni_content)
				@if($key==0)
				<li data-target="#carousel-testimoni" data-slide-to={{ $key }} class="active"></li>
				@else
				<li data-target="#carousel-testimoni" data-slide-to={{ $key }}></li>
				@endif
			@endforeach
		</ol>

		<div class="carousel-inner testimoni-carousel-inner" role="listbox">
			@foreach($testimoni as $key => $testimoni_content)
				@if($key==0)
				<div class="item testimoni-carousel-inner__wrapper active">
				@else
				<div class="item testimoni-carousel-inner__wrapper">
				@endif
					<div class="testimoni-carousel-inner__content">
						<div class="testimoni-carousel-inner__image">
							<div class="keypeople-image-circle" style="background-image:url({!! $testimoni_content->image !!})"></div>
							<!-- <img src="{!! $app['config']['app.url'] !!}/{!! $keypeople_content->image !!}"  alt=""> -->
						</div>
						<div class="testimoni-carousel-inner__desc">
							<div class="testimoni-carousel-inner__title">{!! $testimoni_content->title !!}, <span>{!! $testimoni_content->headline !!}</span> </div>
							{!! $testimoni_content->description !!}	
						</div>
					</div>
				</div>	
			@endforeach
				
		</div>
	</div>
	<div class="pattern-corner"></div>
</section>

<section class=""><div class="row divider"></div></section>

<section id="our-client" class="client-wrapper" style="background-image:url({{ $client_page[0]->image }})">
	<div class="client-wrapper__content owl-carousel owl-theme"  id="owl-demo">
		@foreach($client as $key => $client_content)
		<div class="item">
			<img src="{!! $client_content->image !!}" alt="">
		</div>
			
		@endforeach	

		
	</div>
	<div class="pattern-corner"></div>
</section>

<section class=""><div class="row divider"></div></section>

<section id="contact-us" class="contactus-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-4 contactus-left">
				<div class="contactus-left__image">
					<img src="{!! $info[0]->image !!}" alt="">
				</div>

				<div class="contactus-left__wrapper-text">
					<div class="contactus-left__title">{!! $info[0]->name !!}</div>
					<div class="contactus-left__address">{!! $info[0]->address !!}</div>

					<div class="contactus-left__phone"><span>P:</span> {!! $info[0]->phone !!}</div>
					<div class="contactus-left__fax"><span>F:</span> {!! $info[0]->fax !!}</div>
				</div>
			</div>
			<div class="col-md-4 contactus-center">
				<div class="contactus-center__map" id="map-location" style="background-image:url(https://maps.googleapis.com/maps/api/staticmap?markers=color:red|{!! $info[0]->latitude !!},{!! $info[0]->longitude !!}&zoom=16&size=300x300&key=AIzaSyBpsRuTBODOXVmWtKb1Yk6cMAvIMMXl_o4)">
					
				</div>
			</div>
			<div class="col-md-4 contactus-right">
				<div class="subscribe-wrapper">
					<p>Get Latest News, Update or Information from us</p>
					<div class="input-group ">
						<!-- <label for="subscribe">Subscribe</label> -->
						<input class="form-control form-contact" name="subscribe" type="text" placeholder="Email" id="email-subscribe">
						<span class="input-group-btn">
					        <button type="button" class="btn btn-primary btn-subscribe" type="button" data-loading-text="Saving Your Email...">Subscribe</button>
					      </span>
					</div>	
				</div>
				
				<div class="contact-form-wrapper">
					<p>Contact Us</p>
					<div class="form-group">
						<input type="text" placeholder="Name" name="contact-name-input" class="form-control form-contact">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Email" name="contact-email-input" class="form-control form-contact">
					</div>
					<div class="form-group">
						<textarea name="contact-message-input" placeholder="Message" id="" cols="30" rows="3" class="form-control form-contact"></textarea>
					</div>

					<div class="form-group">
						<button type="button" class="btn btn-primary btn-send-message"  data-loading-text="Sending Message...">Send Message</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="pattern-corner"></div>
</section>

{{-- 
<div class="row">
	@foreach($posts as $post)
		
		<div class="col-md-4">
			FOR ARTICLE TEMPLATE 
			 route('blog.post', [$post->id, $post->slug])
			AND ADD /article/{id}/{slug} on database page
			<h2><a href="#">{{ $post->title }}</a></h2>

			<p>
				{{ $post->author->name }} on {{ $post->published_at }}
			</p>

			{!! $post->excerpt_html or $post->body_html !!}
		</div>

	@endforeach
</div>

<!-- <div class="row" style="background:#CCC;height:2000px"></div>

<div class="row" id="about">
	ini about
</div>
 --> --}}


 