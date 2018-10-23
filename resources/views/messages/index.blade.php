@extends('layouts.default')

@section('title', 'Messages')

@section('content')

<div class="mt-5 container text-left">
	<h2>Messages</h2>
	@forelse ($messages as $element)
		test
	@empty
		<h5>Pas de message</h5>
	@endforelse
</div>
@endsection