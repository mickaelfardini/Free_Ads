<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
	public function index()
	{
		$user = User::find(Auth::user()->id);
		return view("users.index", compact('user'));
	}

	public function edit()
	{
		$user = User::find(Auth::user()->id);
		$categories = Category::all();
		return view('users.edit', compact('user', 'categories'));
	}

	public function update(Request $request, $id)
	{
		if (is_null($request->password) || is_null($request->name) || is_null($request->email)) {
			return redirect()->route('user.edit');
		}
		$user = User::find(Auth::user()->id);
		$user->name 				= $request->get('name');
		$user->email 				= $request->get('email');
		$user->password 			= bcrypt($request->get('password'));
		$user->favorite_category	= $request->favorite_category;
		if ($user->save()) {
			session()->flash('flash', 'Profile Updated !');
			session()->flash('flash-type', 'success');
			return redirect()->route('user.index');
		}
	}

	public function show($id)
	{
		return redirect()->back();
	}

	public function destroy($id)
	{
		$user = User::find(Auth::user()->id);
		$user->email_verified_at = null;
		if ($user->save()) {
			return redirect("/");
		}
	}
}
