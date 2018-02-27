<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Version extends Model {
	
	const CREATED_AT = 'date_creation';
	const UPDATED_AT = 'date_derniere_modif';

	protected $fillable = [
			'code_colibri', 'CNIL', 'homologation_RGS', 'exigences_metier'
	];
	protected $hidden = ['pivot'];

	public function projet() {
		return $this->belongsTo('App\Models\Projet', 'id_projet');
	}

	public function jalon() {
		return $this->hasOne('App\Models\Jalon', 'id_jalon');
	}
	
	public function type_de_suivi() {
		return $this->hasOne('App\Models\Suivi', 'id_type_de_suivi');
	}
	
	public function avancement() {
		return $this->hasOne('App\Models\Avancement', 'avancement');
	}
	
	public function actions() {
		return $this->hasMany('App\Models\Action', 'id_version');
	}
}
