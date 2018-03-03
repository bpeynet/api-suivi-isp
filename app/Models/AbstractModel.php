<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use App\Exceptions\ElementSavingException;

abstract class AbstractModel extends Model {

	protected $allMMRelations = [];
	protected $all11Relations = [];

	public function __construct($attributes = []) {
		parent::__construct($attributes);
		foreach ($this->all11Relations as $relation) {
			if (array_key_exists($this->$relation()->getForeignKey(), $attributes)) {
				$model = $this->$relation()->getRelated();
				$objet_a_associer = $model::find($attributes[$this->$relation()->getForeignKey()]);
				if (!$objet_a_associer) {
					throw new ElementSavingException($this->$relation()->getRelated()::nom . " n°" . $attributes[$this->$relation()->getForeignKey()] . " introuvable.");
				}
				$this->$relation()->associate($objet_a_associer);
			}
			if (array_key_exists($relation, $attributes)) {
				$model = $this->$relation()->getRelated();
				$objet_a_associer = $model::find(static::extractID($attributes[$relation]));
				if (!$objet_a_associer) {
					throw new ElementSavingException($this->$relation()->getRelated()::nom . " n°" . $attributes[$this->$relation()->getForeignKey()] . " introuvable.");
				}
				$this->$relation()->associate($objet_a_associer);
			}
		}
	}

	public static function filtreParametres($tableauDesParametres) {
		return array_filter($tableauDesParametres, function($key) {
			return in_array($key, static::cherchables);
		}, ARRAY_FILTER_USE_KEY);
	}

	private function extractIDs($arrayOfObjects) {
		$a = array();
		foreach ($arrayOfObjects as $object) {
			if (array_key_exists('id', $object)) {
				array_push($a, $object['id']);
			}
		}
		return array_unique($a);
	}

	private function extractID($param) {
		if (isset($param['id'])) {
			return $param['id'];
		} else {
			return $param;
		}
	}

	public function saveCustom(array $params) {
		parent::save();
		foreach ($this->allMMRelations as $value) {
			if (array_key_exists($value, $params) && $params[$value]) {
				$this->$value()->attach($this->extractIDs($params[$value]));
			}
		}
	}

	public function updateWithRelations(array $params) {
		foreach ($this->all11Relations as $relation) {
			if (array_key_exists($relation, $params) && $params[$relation]) {
				$class_name = "\\App\\Models\\" . static::$equivalences[$relation];
				$object = $class_name::find($params[$relation]['id']);
				$this->$relation()->associate($object);
			}
		}
		parent::update();
		foreach ($this->allMMRelations as $relation) {
			if (array_key_exists($relation, $params)) {
				$this->$relation()->sync($this->extractIDs($params[$relation]));
			}
		}
	}

}
