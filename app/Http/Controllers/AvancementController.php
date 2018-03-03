<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avancement;

class AvancementController extends Controller {

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
		return Avancement::with($relations)->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Avancement $avancement
	 * @return \Illuminate\Http\Response
	 */
	public function show(Avancement $avancement) {
		return $avancement;
	}

}
