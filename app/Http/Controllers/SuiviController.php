<?php

namespace App\Http\Controllers;

use App\Models\Suivi;

class SuiviController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function get(Request $request) {
		return Suivi::all();
	}

	/**
	 * Display the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Suivi $suivi) {
		return $suivi;
	}

}
