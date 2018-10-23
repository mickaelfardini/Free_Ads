<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Message;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		$this->middleware(function ($request, $next) {
			$new_message = Message::where('receiver_id', '=', Auth::user()->id)
				->where('read_count', '0')
				->first();
			view()->share(compact('new_message'));

			return $next($request);
		});

	}
}
