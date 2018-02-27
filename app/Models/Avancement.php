<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Avancement extends Model {
	
	public $timestamps = false;

	protected $fillable = [
			'nom', 'pourcentage'
	];
	protected $hidden = ['pivot'];

}
