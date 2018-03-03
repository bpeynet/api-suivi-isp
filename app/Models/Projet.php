<?php

namespace App\Models;
use App\Exceptions\ElementSavingException;

class Projet extends AbstractModel {
	
	const CREATED_AT = 'date_creation';
	const UPDATED_AT = 'date_derniere_modif';

	protected $fillable = [
			'programme', 'code', 'nom', 'chef', 'commentaires'
	];
	protected $hidden = ['pivot'];
	protected $allMMRelations = ['versions', 'mesures'];
	protected $all11Relations = ['ligne_produit'];

	public function versions() {
		return $this->hasMany('App\Models\Version', 'id_projet');
	}

	public function ligne_produit() {
		return $this->belongsTo('App\Models\LigneProduit', 'id_ligne_produit');
	}

	public function mesures() {
		return $this->hasMany('App\Models\Mesure', 'id_projet');
	}
	
	public function saveCustom(array $parameters) {
		if (!$this->getAttribute('id_ligne_produit')) {
			throw new ElementSavingException("Une ligne produit doit être fournie.");
		}
		if (!$this->getAttribute('nom')) {
			throw new ElementSavingException("Un nom doit être fourni.");
		}
		parent::saveCustom($parameters);
	}

	public function updateCustom(array $params) {
		if (!$this->getAttribute('libelle')) {
			throw new ElementSavingException(static::$strings["libelle-requis"]);
		}
		parent::updateWithRelations($params);
	}
	
}
