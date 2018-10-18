@extends('layouts.default')

@section('title', 'Browse Ads')

@section('content')
<br><br><br><br>
<div class="container text-left">
	@foreach ($ads as $ad)
		<div class="card bg-dark">
			<div class="row ">
				<div class="col-md-4">
					@isset ($ad->image[0])
						<img src="{{ asset("storage/" . $ad->image[0]->image) }}" width="350" height="350" class="w-100">
					@else
						<img src="https://placeholdit.imgix.net/~text?txtsize=38&txt=400%C3%97400&w=400&h=400" class="w-100">
					@endisset
				</div>
				<div class="col-md-8 px-3">
					<div class="card-block px-3">
						<br><br>
						<h4 class="card-title">{{$ad->title}}</h4>
						<p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
						<p class="card-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>

			</div>
		</div>
		<br>
		<br>
@endforeach
</div>
@endsection