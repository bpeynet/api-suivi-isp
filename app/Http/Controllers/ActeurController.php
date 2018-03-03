<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acteur;

class ActeurController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function get(Request $request) {
		$relations = [];
		if ($request->has('relations') && !empty($request->get('relations'))) {
			$relations_param = $request->get('relations');
			if (is_string($relations_param)) {
				$relations = explode(',', $relations_param);
			} elseif (is_array($relations_param)) {
				$relations = $relations_param;
			}
		}
		return Acteur::with($relations)->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function post(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Acteur $acteur
	 * @return \Illuminate\Http\Response
	 */
	public function show(Acteur $acteur) {
		return $acteur;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  Acteur $acteur
	 * @return \Illuminate\Http\Response
	 */
	public function put(Request $request, Acteur $acteur) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Acteur $acteur
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Acteur $acteur) {
		$acteur->delete();
	}

}
