<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
// Register
// Route::get("/register", "UsersController@register")->name("users.register");
// Route::post("/register", "UsersController@create");

// Login
// Route::get("/login", "UsersController@login")->name("users.login");
// Route::post("/login", "UsersController@connect");


Route::get('/activate/{code}', 'Auth\RegisterController@activate')->name('activate.user');
Route::get('/', 'HomeController@index')->name('home');
Route::middleware(['auth', 'verified'])->group(function() {
	Route::resource("annonce", "AdsController", ["parameters" => [
		'annonce' => 'id'
	]]);
	
	Route::get("/annonce/my-ads", "AdsController@myAds")
		->name('annonce.myads');

	Route::prefix('admin')->group(function() {
		Route::resource("user", "UsersController", ["parameters" => [
			'user' => 'id'
		]]);
	});

	Route::get("/annonce/search/{keyword}", "AdsController@searchResult");
	Route::post("/annonce/search", "AdsController@search")
		->name('annonce.search');
	// Message
});