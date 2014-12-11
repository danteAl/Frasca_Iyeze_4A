<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::missing(function($exception) {
	return 'Cette page n\'existe pas !';
});

Route::get('/', array('as' => 'accueil', 'uses' => 'HomeController@showAccueil'));
Route::get('top10','HomeController@showTop');
Route::get('cat/{id}', 'HomeController@showCategories');
Route::get('blag/{cat_id}/{blag_id}', 'HomeController@showJoke');
Route::get('myJokes', 'HomeController@myJokes');


Route::group(array('prefix' => 'api/'), function() {
	
	Route::get('newJoke', 'HomeController@newJoke');
	Route::post('addJoke', 'HomeController@addNewJoke');
	Route::get('like/{blag_id}', 'HomeController@likeJoke');
	Route::get('deleteJoke/{blag_id}', 'HomeController@deleteJoke');
	Route::get('modifJoke/{blag_id}', 'HomeController@modifJoke');
	Route::post('updateJoke', 'HomeController@updateJoke');
	
});

//contrôleurs RESTful
Route::controller('auth', 'AuthController');

Route::controller('remind', 'RemindersController');