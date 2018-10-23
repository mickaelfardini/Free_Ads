@extends('layouts.default')

@section('title', 'Edit Profile')

@section('content')

<div class="mt-5 cover-container">
	<h2>Profile</h2>
	<form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
		@csrf
		@method("PUT")
		<ul class="list-group list-group-flush mt-5">
			<li class="list-group-item" max-width="500" style="background-color: #333">
				<p class="h5"><b>Name : </b></p>
				<input id="name" type="text" class="rounded{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

				@if ($errors->has('name'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
				@endif
			</li>

			<li class="list-group-item" max-width="500" style="background-color: #333">
				<p class="h5"><b>Email : </b></p>
				<input id="email" type="text" class="rounded {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>

				@if ($errors->has('email'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif
			</li>

			<li class="list-group-item" max-width="500" style="background-color: #333">
				<p class="h5"><b>Password : </b></p>
				<input id="password" type="password" class="rounded {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>

				@if ($errors->has('password'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</li>

			<li class="list-group-item" max-width="500" style="background-color: #333">
				<p class="h5"><b>Favorite Category : </b></p>
				<select name="favorite_category" class="form-control col-sm-2 offset-5">
					@foreach ($categories as $cat)
					<option value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>
			</li>
		</ul>
		<input type="submit" class="btn btn-light" value="Edit" />
	</form>
	<br><br><br>
	<form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="POST">
		@csrf
		@method('DELETE')
		<input type="submit" value="delete" class="btn btn-danger">
	</form>
</div>
@endsection