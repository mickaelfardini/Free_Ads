
@extends("layouts.default")

@section("title", "Accueil")

@section("content")

<div class="clearfix"><br><br><br></div>
<div class="container">
	{{-- <div class="inner cover"> --}}
		<div class="row">
			<div class="col-lg-4">
			  <img class="rounded-circle" src="{{ asset('img/refresh.png') }}" alt="Generic placeholder image" width="100" height="100">
			  <h3>My Message</h3>
			  <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
			  <p><a class="btn btn-secondary" href="#" role="button">&laquo; My Message</a></p>
		  </div><!-- /.col-lg-4 -->
		  <div class="col-lg-4">
			  <img class="rounded-circle" src="{{ asset('img/money.png') }}" alt="Generic placeholder image" width="150" height="150">
			  {{-- https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrWpCloHi7xvEMUo2j1A30WPsrJYNja_GR1h70HubfJLWbdaAdZQ --}}
			  {{-- http://cdn.onlinewebfonts.com/svg/img_544623.png --}}
			  <h1>Browse Ads</h1>
			  <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
			  <p><a class="btn btn-secondary" href="{{ route('annonce.index') }}" role="button">Browse</a></p>
		  </div><!-- /.col-lg-4 -->
		  <div class="col-lg-4">
			  <img class="rounded-circle" src="{{ asset('img/search.png') }}" alt="Generic placeholder image" width="100" height="100">
			  <h3>My Ads</h3>
			  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			  <p><a class="btn btn-secondary" href="#" role="button">My Ads &raquo;</a></p>
		  </div><!-- /.col-lg-4 -->
	  </div><!-- /.row -->
  {{-- </div> --}}
</div>

@endsection