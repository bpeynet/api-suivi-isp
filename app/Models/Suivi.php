<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Suivi extends Model {
	
	public $timestamps = false;

	protected $fillable = [
			'type'
	];
	protected $hidden = ['pivot'];

}
