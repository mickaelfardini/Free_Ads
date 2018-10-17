<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
	protected $fillable = [
		"user_id",
		"title",
		"content",
		"image",
		"price"
	];
}
