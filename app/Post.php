<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	protected $dates = ['created_at', 'updated_at'];

	protected $table = 'posts';

	protected $fillable = [
		'title', 'body',
	];

	protected $hidden = [
		// 
	];

	protected $guarded = [
		'created_at', 'updated_at',
	];
}
