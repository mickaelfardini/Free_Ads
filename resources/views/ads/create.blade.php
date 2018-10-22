@extends('layouts.default')

@section('title', 'Nouvel Annonce')

@section('content')
<div class="cover-container">
	<form method="POST" action="{{ route('annonce.store') }}" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<label for="title" class="col-form-label">{{ __('Title') }}</label>

			<div class="col-md-12">
				<input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

				@if ($errors->has('title'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('title') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label for="content" class="col-form-label">{{ __('Description') }}</label>

			<div class="col-md-12">
				<textarea id="content" rows="10" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required autofocus></textarea>

				@if ($errors->has('content'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('content') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<label class="custom-file">
					<input type="file" id="image" class="custom-file-input" name="image[]" multiple required autofocus>
					<span class="custom-file-control">Choose your pictures ..</span>
				</label>
				@if ($errors->has('image'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('image') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<label for="category" class="col-form-label col-sm-8">{{ __('Category') }}</label>
		<label for="price" class="col-form-label col-sm-3">{{ __('Price') }}</label>
		<div class="form-group row">

			<div class="col-md-8">
				<select id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="" autofocus required>
					<option></option>
					@foreach ($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>

				@if ($errors->has('category'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('category') }}</strong>
				</span>
				@endif
			</div>

			<div class="col-md-4">
				<input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" autofocus required />

				@if ($errors->has('price'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('price') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-12">
				<button type="submit" class="btn btn-light">
					{{ __('Poster') }}
				</button>
			</div>
		</div>
	</form>
</div>
@endsection