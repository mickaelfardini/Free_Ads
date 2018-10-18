<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
	protected $fillable = [
		"user_id",
		"title",
		"content",
		"price"
	];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
