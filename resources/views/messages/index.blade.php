@extends('layouts.default')

@section('title', 'Messages')

@section('content')

<div class="mt-5 container text-left">
	<h2>Messages</h2>
	<ul class="list-group list-group-flush mt-5">
		@forelse ($messages as $message)
		@if ($message->read_count <= 0)
			<b><a href="{{ route('message.show', ['id' => $message->id]) }}" class="list-group-item text-truncate" max-width="500" style="background-color: #333">{{$message->user->name}} : <span class="badge badge-pill badge-danger">&nbsp;</span> {{$message->content}}</a>
			</b>
		@else
		<a href="{{ route('message.show', ['id' => $message->id]) }}" class="list-group-item text-truncate" style="background-color: #333">{{$message->user->name}} : {{$message->content}}</a>
		@endif
		@empty
		<h5>Pas de message</h5>
		@endforelse
	</ul>
</div>
@endsection