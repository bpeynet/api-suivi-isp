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

	public function inge_secu() {
		return $this->belongsTo('App\Models\Acteur', 'id_inge_secu');
	}
}
