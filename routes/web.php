<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => 'guest'], function() {
	Route::get('/', 'GuestController@index')->name('guest.index');
	
	Route::get('/indexajax', 'GuestController@indexAjax')->name('guest.indexajax');
	
	Route::post('/storeajax', 'GuestController@storeAjax')->name('guest.storeajax');

	Route::get('/showajax/{id}', 'GuestController@showAjax')->name('guest.showAjax');

	Route::get('/editajax/{id}', 'GuestController@editAjax')->name('guest.editajax');
	Route::put('/updateajax/{id}', 'GuestController@updateAjax')->name('guest.updateajax');

	Route::get('/deleteajax/{id}', 'GuestController@deleteAjax')->name('guest.deleteajax');
	Route::delete('/destroyajax/{id}', 'GuestController@destroyAjax')->name('guest.destroyajax');

	// Route::resource('posts', 'GuestController');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
