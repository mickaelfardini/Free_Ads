<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Image;
use App\Category;
use Illuminate\Support\Facades\Auth;


class AdsController extends Controller
{
	public function index()
	{
		$potential = null;
		if (Auth::user()->favorite_category) {
			$potential = Ad::with("Image")
				->where('category_id', '=', Auth::user()->favorite_category)
				->orderByRaw('RAND()')
				->first();
		}
		$ads = Ad::with("Image", "Category")
			->orderByRaw('created_at DESC')
			->paginate(10);
		return view("ads.index", compact("ads", "potential"));
	}

	public function create()
	{
		$categories = Category::get(['name', 'id']);
		return view("ads.create", compact('categories'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
			'price'   => 'int'
		]);
		$ad = new Ad;

		$ad->user_id	= Auth::user()->id;
		$ad->title		= $request->title;
		$ad->category_id= $request->category;
		$ad->content	= $request->content;
		$ad->price		= $request->price;
		if ($ad->save()) {
			foreach ($request->file('image') as $img) {
				$image = new Image;
				$image->image 	= $img->store('images', 'public');
				$ad->image()->save($image);
			}
			session()->flash("flash", "Your ad is now online !");
			session()->flash("flash-type", "success");
			return redirect()->route('annonce.index');
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

	public function searchResult(Request $request, $keyword)
	{
		$ads = Ad::select('ads.*')
			->leftJoin('categories', 'category_id', '=', 'categories.id')
			->where(function ($query) use ($keyword, $request) {
				if ($request->has('category')) {
					$query->where('categories.name', '=', $keyword);
				} elseif ($request->has('title')) {
					$query->orWhere('title', 'LIKE', '%' . $keyword . '%');
				} elseif ($request->has('content')) {
					$query->orWhere('content', 'LIKE', '%' . $keyword . '%');
				} else {
					$query->where('categories.name', '=', $keyword);
					$query->orWhere('title', 'LIKE', '%' . $keyword . '%');
					$query->orWhere('content', 'LIKE', '%' . $keyword . '%');
				}
			})
			->orderByRaw('created_at DESC')
			->paginate(10);
		return view('ads.search', compact('ads', 'keyword'));
	}

	public function search(Request $request)
	{
		if ($request->get('search')) {
			if ($request->get('filter')) {
				return redirect('/annonce/search/' . $request->get("search"). "?".$request->get('filter'));
			}
			return redirect('/annonce/search/' .$request->get("search"));
		}
		return redirect()->back();
	}

	public function myAds()
	{
		$ads = Ad::with('Image', 'Category')
			->where('user_id', '=', Auth::user()->id)
			->orderByRaw('created_at DESC')
			->paginate(10);

		return view('users.myAds', compact('ads'));
	}
}
