@extends('layouts.default')

@section('title', 'Browse Ads')

@section('content')
<div class="container text-left">
	@foreach ($ads as $ad)
	<div class="row">
			<div class="col-sm-12">
				
			<br>
			<br>
			<br>
			<h1>{{$ad->title}}</h1>
			<h2>$ {{$ad->price}}</h2>
			{{-- <img width="300" height="300" src="#" alt=""> --}}
			<p>Posted by <i>{{$ad->user->name}}</i>. Last edition {{$ad->updated_at}}
			</p>
		<hr>
		<br>

		<div>
			{{$ad->content}}
		</div>
		<br>
		<hr>
			</div>
	</div>
	@endforeach
</div>
@endsection