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
		$categories = Category::get(['name', 'id']);
		return view("ads.create", compact('categories'));
	}

	public function store(Request $request)
	{
		$ad = new Ad;
		$image = new Image;


		$ad->user_id	= Auth::user()->id;
		$ad->title		= $request->title;
		$ad->category_id= $request->category;
		$ad->content	= $request->content;
		$ad->price		= $request->price;
		if ($ad->save()) {
			$image->image 	= $request->file('image')->store('images', 'public');
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
		if ($ad->user->id != Auth::user()->id) {
			return redirect()->back();
		}
		return view("ads.edit", compact('ad'));
	}

	public function update(Request $request, int $id)
	{
		if(Ad::find($id)->update($request->all()))
		{
			session()->flash("flash", "Edited");
			session()->flash("flash-type", "success");
			return redirect("/annonce/$id");
		}
	}
}
