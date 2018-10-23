@extends('layouts.default')

@section('title', 'Message Form ' . $message->user->name)

@section('content')
<div class="mt-5 container text-left">

	<h2>From {{$message->user->name}} -- for {{$message->ad->title}}</h2>
	Date : {{$message->created_at}}

	<hr>

	Message : {{$message->content}}

	<hr>

	<form action="{{ route('message.create') }}">
		@csrf
		<input type="hidden" name="ad_id" value="{{$message->ad->id}}">
		<input type="hidden" name="receiver_id" value="{{$message->user->id}}">
		<input class="btn btn-default" type="submit" value="Answer">
	</form>
</div>
@endsection