@extends('layouts.default')

@section('title', 'Profile')

@section('content')

<div class="mt-5 cover-container">
	<h2>Profile</h2>
	<ul class="list-group list-group-flush mt-5">
		<li class="list-group-item" max-width="500" style="background-color: #333">
			<p class="h5"><b>Name : </b></p>
			<p>{{$user->name}}</p>
		</li>

		<li class="list-group-item" max-width="500" style="background-color: #333">
			<p class="h5"><b>Email : </b></p>
			<p>{{$user->email}}</p>
		</li>

		<li class="list-group-item" max-width="500" style="background-color: #333">
			<p class="h5"><b>Favorite Category : </b></p>
			<p>{{$user->category->name}}</p>
		</li>
	</ul>
	<a href="{{ route('user.edit') }}" class="btn btn-light">Edit</a>
</div>
@endsection