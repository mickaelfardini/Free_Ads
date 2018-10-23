@extends('layouts.default')

@section('title', 'New Message')

@section('content')

<div class="mt-5 container text-left">
	<form method="POST" action="{{ route('message.store') }}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="receiver_id" value="{{$receiver->id}}">
		<div class="from-group">
			<label class="col-form-label"><b>To : {{$receiver->name}}</b></label>
		</div>

		<div class="form-group">
			<label class="col-form-label"><b>For Ad : {{$ad->title}}</b></label>
		</div>

		<div class="form-group">
			<label for="content" class="col-form-label">{{ __('Message') }}</label>

			<div class="col-md-12">
				<textarea id="content" rows="10" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required autofocus></textarea>

				@if ($errors->has('content'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('content') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-12">
				<button type="submit" class="btn btn-light">
					{{ __('Envoyer') }}
				</button>
			</div>
		</div>
	</form>
</div>
@endsection