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


Route::get('/', 'HomeController@index')->name('home');
Route::resources([
	"annonce" => "AdsController"]);
Route::resources([
	"user" => "UsersController"]);
Route::get("/user/myads", "UsersController@getAds");