<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supra;

class SupraController extends Controller {

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
		return Supra::with($relations)->get();
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
	 * @param  Supra $supra
	 * @return \Illuminate\Http\Response
	 */
	public function show(Supra $supra) {
		return $supra;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  Supra $supra
	 * @return \Illuminate\Http\Response
	 */
	public function put(Request $request, Supra $supra) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Supra $supra
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Supra $supra) {
		$supra->delete();
	}

}
