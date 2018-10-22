<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
	public function index()
	{
		$user = User::find(Auth::user()->id);
		return view("users.index", compact('user'));
	}
}
