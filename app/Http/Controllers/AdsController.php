<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use Illuminate\Support\Facades\Auth;


class AdsController extends Controller
{
	public function index()
	{
		return view("ads.index");
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
		$ad->image		= $request->image;
		$ad->price		= $request->price;

		$ad->save();
		dd($ad);
	}
}
