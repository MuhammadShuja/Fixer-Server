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

/*
|-------------------------
| API - v1
|-------------------------
*/
Route::group(['prefix' => '/v1', 'namespace' => 'API'], function(){
	/*
	|-------------------------
	| Register
	|-------------------------
	*/
	Route::post('/register', 'Auth\RegisterController@register');

	/*
	|-------------------------
	| Middleware auth:api
	|-------------------------
	*/
	Route::group(['middleware' => 'auth:api'], function(){
		/*
		|-------------------------
		| User
		|-------------------------
		*/
		Route::group(['prefix' => '/profile'], function(){
			Route::get('/', 'ProfileControllerForAPI@profile');
			Route::post('/update', 'ProfileControllerForAPI@update');
		});
		/*
		|-------------------------
		| Services
		|-------------------------
		*/
		Route::group(['prefix' => '/services'], function(){
			Route::get('/categories', 'ServicesControllerForAPI@categories');
			Route::get('/index', 'ServicesControllerForAPI@services');
		});

		/*
		|-------------------------
		| Sales
		|-------------------------
		*/
		Route::group(['prefix' => '/sales'], function(){
			Route::post('/jobs/new', 'SalesControllerForAPI@jobRequest');
			Route::get('/jobs/index', 'SalesControllerForAPI@jobs');
			Route::get('/jobs/payment', 'SalesControllerForAPI@payment');
		});
	});
});

Route::fallback('API\APIController@fallback');