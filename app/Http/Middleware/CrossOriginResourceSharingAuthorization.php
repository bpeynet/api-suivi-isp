<?php

namespace App\Http\Middleware;

use Closure;

class CrossOriginResourceSharingAuthorization {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$next_request = $next($request);
		if ($request->isMethod('OPTIONS')) {
			$next_request = $next_request
							->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Content-Range, Content-Disposition, Content-Description, X-Auth-Token')
							->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
		}
		return $next_request->header('Access-Control-Allow-Origin', '*');
	}

}
