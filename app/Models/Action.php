<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Action extends Model {
	
	public $timestamps = true;

	protected $fillable = [
			'libelle', 'type', 'terminee', 'commentaires'
	];
	protected $hidden = ['pivot'];

	public function version() {
		return $this->belongsTo('App\Models\Version', 'id_version');
	}
}
