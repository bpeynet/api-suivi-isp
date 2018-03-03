<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jalon;

class JalonController extends Controller {

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
		return Jalon::with($relations)->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Jalon $jalon
	 * @return \Illuminate\Http\Response
	 */
	public function show(Jalon $jalon) {
		return $jalon;
	}

}
