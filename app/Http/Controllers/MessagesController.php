<?php

namespace App\Http\Controllers;

use App\Message;
use App\Ad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$messages = Message::with(['User'])->where('receiver_id', '=', Auth::user()->id)
		->orderByRaw('created_at DESC')
		->get();
		return view('messages.index', compact('messages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{	
		if (!$request->has('ad_id') || !$request->has('receiver_id')) {
			return redirect()->back();
		}
		$ad = Ad::find($request->get('ad_id'));
		$receiver = User::find($request->get('receiver_id'));
		return view('messages.create', compact('receiver', 'ad'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$message = new Message();

		$message->receiver_id 	= $request->get('receiver_id');
		$message->sender_id 	= Auth::user()->id;
		$message->ad_id 	= $request->get('ad_id');
		$message->content		= $request->get('content');

		if ($message->save()) {
			session()->flash("flash", "Message Sent !");
			session()->flash("flash-type", "success");
			return redirect("/annonce");
		}
		session()->flash("flash", "Error !");
		session()->flash("flash-type", "danger");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$message = Message::where('id', '=', $id)
			->where('receiver_id', Auth::user()->id)
			->first();
		if (!$message) {
			return redirect()->route('message.index');
		}
		$message->read_count = $message->read_count + 1;
		$message->save();
		return view('messages.show', compact('message'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Message $message)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Message $message)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Message $message)
	{
		//
	}
}
