<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('', function() {
	return '';
});

Route::prefix('supra')->group(function() {
	Route::get('', 'SupraController@get');
	Route::get('{supra}', 'SupraController@show');
	Route::post('', 'SupraController@post');
	Route::put('{supra}', 'SupraController@put');
	Route::delete('{supra}', 'SupraController@delete');
});
Route::prefix('ligne_produit')->group(function() {
	Route::get('', 'LigneProduitController@get');
	Route::get('{ligneproduit}', 'LigneProduitController@show');
	Route::post('', 'LigneProduitController@post');
	Route::put('{ligneproduit}', 'LigneProduitController@put');
	Route::delete('{ligneproduit}', 'LigneProduitController@delete');
});
Route::prefix('acteurs')->group(function() {
	Route::get('', 'ActeurController@get');
	Route::get('{acteur}', 'ActeurController@show');
	Route::post('', 'ActeurController@post');
	Route::put('{acteur}', 'ActeurController@put');
	Route::delete('{acteur}', 'ActeurController@delete');
});
Route::prefix('jalons')->group(function() {
	Route::get('', 'JalonController@get');
	Route::get('{jalon}', 'JalonController@show');
});
Route::prefix('suivis')->group(function() {
	Route::get('', 'SuiviController@get');
	Route::get('{suivi}', 'SuiviController@show');
});
Route::prefix('avancement')->group(function() {
	Route::get('', 'AvancementController@get');
	Route::get('{avancement}', 'AvancementController@show');
});
Route::prefix('projet')->group(function() {
	Route::get('', 'ProjetController@get');
	Route::post('', 'ProjetController@post');
	Route::put('{projet}', 'ProjetController@put');
	Route::delete('{projet}', 'ProjetController@delete');
});
Route::prefix('versions')->group(function() {
	Route::get('', 'VersionController@get');
	Route::post('', 'VersionController@post');
	Route::put('{version}', 'VersionController@put');
	Route::delete('{version}', 'VersionController@delete');
});
Route::prefix('actions')->group(function() {
	Route::get('', 'ActionController@get');
	Route::post('', 'ActionController@post');
	Route::put('{action}', 'ActionController@put');
	Route::delete('{action}', 'ActionController@delete');
});
Route::prefix('mesures')->group(function() {
	Route::get('', 'MesureController@get');
	Route::post('', 'MesureController@post');
	Route::put('{mesure}', 'MesureController@put');
	Route::delete('{mesure}', 'MesureController@delete');
});