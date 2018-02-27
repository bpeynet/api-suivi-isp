<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Supra extends Model {
	
	public $timestamps = false;

	protected $fillable = [
			'nom'
	];
	protected $hidden = ['pivot'];

	public function ligne_produit() {
		return $this->hasMany('App\Models\LigneProduit', 'id_supra');
	}
}
