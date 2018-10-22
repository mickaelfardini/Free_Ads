
@extends("layouts.default")

@section("title", "Accueil")

@section("content")

<div class="cover-container">
    <div class="inner cover">
        <h1 class="cover-heading">Welcome to Free Ads</h1>
        <p class="lead">
            <a href="{{ route('login') }}" class="btn btn-lg btn-outline-light">Connexion</a>
            <a href="{{ route('register') }}" class="btn btn-lg btn-outline-secondary">Inscription</a>
        </p>
        <p class="lead">
        </p>
    </div>
</div>

@endsection