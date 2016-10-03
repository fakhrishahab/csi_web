@extends('layouts.backend')

@section('title', 'Company Info')

@section('content')
	{!! $info[0] !!}
	{!! 
		Form::model($info, [
			'method' => count($info) > 0 ? 'put' : 'post',
			'files' => true,
			'route' => count($info) > 0 ? ['backend.info.update', $info->id] : ['backend.info.store'] 
		])
	!!}
	
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				{!! Form::label('name','Company Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('address', 'Company Address') !!}
				{!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'company-address']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('phone', 'Phone') !!}
				{!! Form::text('phone', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('fax', 'Fax') !!}
				{!! Form::text('fax', null, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('image', 'Company Image') !!}
				{!! Form::file('image', null, ['class'=>'form-control']) !!}

				<div class="image-preview" style="background-image:url('{!! $app['config']['app.url'] !!}/{!! $info->image !!}')"></div>
			</div>

			<div class="form-group">
				{!! Form::label('longitude', 'Longitude') !!}
				{!! Form::text('longitude', null, ['class' => 'form-control', 'id' => 'longitude-input']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('latitude', 'Latitude') !!}
				{!! Form::text('latitude', null, ['class' => 'form-control', 'id' => 'latitude-input']) !!}

				<div class="map-location" id="map-location">
					
				</div>
			</div>
		</div>
	</div>
	

	{!! Form::submit($info ? 'Save Info' : 'Create New Info', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}
	<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpsRuTBODOXVmWtKb1Yk6cMAvIMMXl_o4&callback=initMap">
    </script>

	<script>
		var marker, markers=[];
		var elm = {
			imageLogo : $('input[name=image]'),
			companyAddress : $('#company-address'),
			latitudeInput : $('#latitude-input'),
			longitudeInput : $('#longitude-input')
		}

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

		jQuery(document).ready(function($) {
			elm.companyAddress.summernote(option);
			
			elm.imageLogo.on('change', function(evt){
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
		});

		function initMap(){
			var myLatLng = new google.maps.LatLng(elm.latitudeInput.val(), elm.longitudeInput.val());

			var map = new google.maps.Map(document.getElementById('map-location'), {
			    center: myLatLng,
          		zoom: 14
			});

			placeMarkerAndPanTo(myLatLng, map);

			var geocoder = new google.maps.Geocoder;		    

		    map.addListener('click', function (e) {
		        var latLng = {
		            lat: e.latLng.lat(),
		            lng: e.latLng.lng()
		        }
		        // console.log(latLng)
		        elm.latitudeInput.val(latLng.lat)
		        elm.longitudeInput.val(latLng.lng)

		        placeMarkerAndPanTo(e.latLng, map);
		    });

			

		    function placeMarkerAndPanTo(latLng, map) {
			    clearMarker()
			    marker = new google.maps.Marker({
			        position: latLng,
			        map: map,
			        draggable: true,
			        animation: google.maps.Animation.DROP
			    });
			    markers.push(marker)
			    map.setCenter(marker.getPosition())
			}

			function clearMarker() {
			    if (marker) {
			        marker.setMap(null)
			    }
			}
		}
	</script>
@endsection