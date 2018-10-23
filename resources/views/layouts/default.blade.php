<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Free Ads - @yield("title")</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/cover.css') }}" rel="stylesheet">

</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md fixed-top navbar-light navbar-laravel">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					@yield("title")
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						
					</ul>
					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<form action="{{ route('annonce.search') }}" method="POST" class="form-inline">
							@csrf
							<div class="md-form mt-0">
								<select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="filter" name="filter">
									<option value="" selected>Choose...</option>
									<option value="title">Title</option>
									<option value="content">Content</option>
									<option value="category">Category</option>
								</select>
								<input class="form-control" type="text" placeholder="Search" name="search" aria-label="Search">
							</div>
						</form>
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						<li class="nav-item">
							@if (Route::has('register'))
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
							@endif
						</li>
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }} 
								@isset($new_message)
									@if ($new_message)
										<span class="badge badge-pill badge-danger">{{$new_message}}</span>
									@endif
								@endisset
								<span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('user.index') }}">Profile</a>
								<a class="dropdown-item" href="{{ route('message.index') }}">Messages
									@isset ($new_message)
										@if ($new_message)
										<span class="badge badge-pill badge-danger">New</span>
										@endif
									@endisset
								</a>
								<a class="dropdown-item" href="{{ route('annonce.myads') }}">
									My Ads
								</a>
								
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>

	<main class="mt-5 py-4">
		<div class="container">
			@if (session()->has('flash'))
			<div class="alert alert-{{ session()->get('flash-type')}}">
				{{ session()->get('flash') }}
			</div>
			@endif
		</div>
		@yield('content')
	</main>
</div>

	<!-- Scripts -->
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	{{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/bootstrap-4.1.3.min.js') }}"></script>
</body>
</html>
