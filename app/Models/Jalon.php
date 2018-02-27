<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jalon extends Model {
	
	public $timestamps = false;

	protected $fillable = [
			'nom'
	];
	protected $hidden = ['pivot'];

}
