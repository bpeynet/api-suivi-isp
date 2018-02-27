<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model {
	
	public $timestamps = false;

	protected $fillable = [
			'nom', 'prenom', 'est_ingenieur_secu', 'est_rsi_fab', 'est_architecte'
	];
	protected $hidden = ['pivot'];

	public function ligne_produit_as_inge_secu() {
		return $this->belongsTo('App\Models\LigneProduit', 'id_inge_secu');
	}
}
