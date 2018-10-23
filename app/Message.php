<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public function user()
	{
		return $this->belongsTo('App\User', 'sender_id', 'id');
	}

	public function ad()
	{
		return $this->belongsTo('App\Ad', 'ad_id', 'id');
	}
}
