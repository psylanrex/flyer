@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<h1>{!! $flyer->street !!}</h1>
			<h2>{!! $flyer->price !!}</h2>

			<hr>

			<div class="description">
				{!! nl2br($flyer->description) !!}
			</div>
		</div>

		<div class="col-md-8 gallery">
			@foreach($flyer->photos->chunk(4) as $set)
				<div class="row">
					@foreach($set as $photo)
						<div class="col-sm-3 col-md-3 gallery__image">
							<a href="#" class="thumbnail">
								<img src="/{{$photo->thumbnail_path}}" alt="">
							</a>
						</div>	
					@endforeach
				</div>
			@endforeach
		</div>

		<hr>
	</div>

	<hr>

	<div class="row">
		<h2>Drop in new photos</h2>
		<form id="addPhotoForm" class="dropzone" method="POST" action="/{{$flyer->zip}}/{{$flyer->street}}/photos">
			{{ csrf_field() }}
		</form>
	</div>


@stop

@section('script.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
<script>
	Dropzone.options.addPhotosForm = {
		paramName: 'photo',
		maxFilesize: 3,
		acceptedFiles: '.jpg, .jpeg, .png, .bmp'
	}
</script>
@stop