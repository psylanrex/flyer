
@extends('layout')

@section('content')

	<h1>Selling Stuff</h1>
	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="/flyers" enctype="multipart/form-data" class="col-md-6">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="street">Street: </label>
					<input type="text" name="street" id="street" class="form-control" value="" required>
				</div>
				<div class="form-group">
					<label for="city">City: </label>
					<input type="text" name="city" id="city" class="form-control" value="" required>
				</div>
				<div class="form-group">
					<label for="zip">Zip/Postal Code: </label>
					<input type="text" name="zip" id="zip" class="form-control" value="" required>
				</div>
				<div class="form-group">
					<label for="country">Country: </label>
					<select id="country" name="country" class="form-control" required>
						<option value="us">United States</option>
						<option value="ca">Canada</option>
						<option value="eu">Europe</option>
					</select>
				</div>
				<div class="form-group">
					<label for="state">State: </label>
					<select id="state" name="state" class="form-control">
						<option value="CA">California</option>
						<option vlaue="NV">Nevada</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="price">Price: </label>
					<input type="text" name="price" id="price" class="form-control" value="">
				</div>
				<div class="form-group">
					<label for="description">Description: </label>
					<textarea name="description" id="description" class="form-control" rows="10"></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Create a flyer</button>
				</div>
			</div>
		</form>
	</div>

	<div class="row">
		@if(count($errors) > 0) 
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
@stop