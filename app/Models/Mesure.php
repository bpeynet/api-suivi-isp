<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Mesure extends Model {
	
	public $timestamps = true;

	protected $fillable = [
			'libelle', 'prise_en_compte', 'commentaires', 'risque'
	];
	protected $hidden = ['pivot'];

	public function projet() {
		return $this->belongsTo('App\Models\Projet', 'id_projet');
	}
}
