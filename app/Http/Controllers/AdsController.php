<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Image;
use App\Category;
use Illuminate\Support\Facades\Auth;


class AdsController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth");
	}
	public function index()
	{
		$ads = Ad::with("Image")->get();
		return view("ads.index", compact("ads"));
	}

	public function create()
	{
		return view("ads.create");
	}

	public function store(Request $request)
	{
		$ad = new Ad;
		$image = new Image;


		$ad->user_id	= Auth::user()->id;
		$ad->title		= $request->title;
		$ad->content	= $request->content;
		$ad->price		= $request->price;
		if ($ad->save()) {
			$image->image 	= $request->file('image')->store('images', 'public');
			// $image->ad_id	= $ad->id;
			if ($ad->image()->save($image)) {
				session()->flash("flash", "Your ad is now online !");
				session()->flash("flash-type", "success");
				return redirect()->route('annonce.index');
			}
		}
		session()->flash("flash", "An error has occured ..");
		session()->flash("flash-type", "danger");
		return redirect()->route("home");
	}

	public function show(int $id)
	{
		$ad = Ad::find($id);
		return view("ads.show", compact('ad'));
	}

	public function edit(int $id)
	{
		$ad = Ad::find($id);
		return view("ads.edit", compact('ad'));
	}
}
