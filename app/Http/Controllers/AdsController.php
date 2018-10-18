<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use Illuminate\Support\Facades\Auth;


class AdsController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth");
	}
	public function index()
	{
		$ads = Ad::get();
		return view("ads.index", compact("ads"));
	}

	public function create()
	{
		return view("ads.create");
	}

	public function store(Request $request)
	{
		$ad = new Ad;

		$ad->user_id	= Auth::user()->id;
		$ad->title		= $request->title;
		$ad->content	= $request->content;
		$ad->price		= $request->price;

		if ($ad->save()) {
			session()->flash("flash", "Your ad is now online !");
			session()->flash("flash-type", "success");
			return redirect()->route('annonce.index');
		}
		session()->flash("flash", "An error has occured ..");
		session()->flash("flash-type", "danger");
		return redirect()->route("home");
	}
}
