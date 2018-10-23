@extends('layouts.default')

@section('title', $ad->title)

@section('content')
<div class="mt-5 container text-left">
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
					<h3 class="card-title">{{$ad->title}}
					@if ($ad->user->id == auth()->user()->id)
						<a href="{{ route('annonce.edit', ['id' => $ad->id]) }}" class="btn-sm btn-danger">Edit</a>
					@endif
					</h3>
					<p>$ {{$ad->price}} - <small>By <b>{{$ad->user->name}}</b> in the category - <b>{{$ad->category->name}}</b></small></p>
					<br>
					<p class="card-text">{{$ad->content}}</p>
				</div>
			</div>

		</div>
	</div>

	<div class="row pl-3 pr-3">
		<div class="col-md-12 bg-light text-dark px-5">
			<form action="{{route('message.create')}}" method="POST">
			@csrf
				<input type="submit" class="btn btn-success" value="Message">
				<input type="hidden" name="ad_id" value="{{$ad->id}}">
				<input type="hidden" name="receiver_id" value="{{$ad->user->id}}">
			</form>
		</div>
	</div>
</div>
@endsection