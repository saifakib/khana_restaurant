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

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/wellcome', function () {
    return view('welcome');
});
Route::post('/reservation', 'ReservationController@store')->name('reservation.store');
Route::post('/contact', 'ContactController@store')->name('contact.store');



Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']],function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('slider', 'SliderController');
    Route::resource('item','ItemController');

    Route::get('/reservation','ReservationController@index')->name('reservation.index');
    Route::put('/reservation/{id}','ReservationController@update')->name('reservation.update');
    Route::delete('/reservation/delete/{id}','ReservationController@destroy')->name('reservation.destroy');

    Route::get('/contact','ContactController@index')->name('contact.index');
    Route::delete('/contact/delete/{id}','ContactController@destroy')->name('contact.destroy');



});


