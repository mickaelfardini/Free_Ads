@extends('layouts.default')

@section('title', $ad->title)

@section('content')

<div class="mt-5 container text-left">
	<div class="card bg-dark">
		<div class="row ">
			<div class="col-md-4">
				<img src="{{ asset("storage/" . $ad->image[0]->image) }}" width="350" height="350" class="w-100" alt="{{$ad->title}}">
			</div>
			<div class="col-md-8 px-3">
				<div class="card-block px-3">
					<br><br>
					<h3 class="card-title">{{$ad->title}}
						@if ($ad->user->id == auth()->user()->id)
						<a href="{{ route('annonce.edit', ['id' => $ad->id]) }}" class="btn-sm btn-danger">Edit</a>
						@endif
					</h3>
					<p>$ {{$ad->price}} - <small>By <b>{{$ad->user->name}}</b> in the category - <b>{{$ad->category->name}}</b></small></p>

			<form action="{{route('message.create')}}" method="POST">
				@csrf
				<input type="submit" class="btn btn-success" value="Message">
				<input type="hidden" name="ad_id" value="{{$ad->id}}">
				<input type="hidden" name="receiver_id" value="{{$ad->user->id}}">
			</form>
					<br>
					<p class="card-text">{{$ad->content}}</p>
				</div>
			</div>

		</div>
	</div>

	<div class="row pl-3 pr-3">
		<div class="col-md-12 bg-light text-dark px-5">
			<div id="carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner m-auto">
					@foreach ($ad->image as $key => $image)
					<div class="carousel-item m-auto {{$key == 0 ? "active" : ""}}">
						<img class="d-block w-50 m-auto" src="{{ asset("storage/" . $image->image) }}" alt="{{$ad->title}}">
					</div>
					@endforeach
				</div>
				<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection