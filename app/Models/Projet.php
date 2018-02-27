<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model {
	
	const CREATED_AT = 'date_creation';
	const UPDATED_AT = 'date_derniere_modif';

	protected $fillable = [
			'programme', 'code', 'nom', 'chef', 'commentaires'
	];
	protected $hidden = ['pivot'];

	public function versions() {
		return $this->hasMany('App\Models\Version', 'id_projet');
	}

	public function ligne_produit() {
		return $this->belongsTo('App\Models\LigneProduit', 'id_ligne_produit');
	}

	public function mesures() {
		return $this->hasMany('App\Models\Mesure', 'id_projet');
	}
}
