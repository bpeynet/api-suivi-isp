<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LigneProduit extends Model {
	
	public $timestamps = false;
	public $table = 'lignes_produit';

	protected $fillable = [
			'libelle'
	];
	protected $hidden = ['pivot'];

	public function supra() {
		return $this->belongsTo('App\Models\Supra', 'id_supra');
	}

	public function inges_secu() {
		return $this->belongsToMany('App\Models\Acteur', 'ingessecu_lignesproduit', 'id_ligne_produit', 'id_ingesecu');
	}

	public function rsis_fab() {
		return $this->belongsToMany('App\Models\Acteur', 'rsisfab_lignesproduit', 'id_ligne_produit', 'id_rsifab');
	}

	public function architectes() {
		return $this->belongsToMany('App\Models\Acteur', 'architectes_lignesproduit', 'id_ligne_produit', 'id_architecte');
	}
}
