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

/*Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);*/

Route::resource('categories','CategoryController');
Route::resource('items','ItemController');
Route::resource('admin','AdminController');
Route::resource('bookings','BookingsController');

Route::get('bookings/{id}/add', 'BookingsController@addItems')->name('bookings.add');
Route::post('bookings/{id}/add', 'BookingsController@updateItems');
Route::post('bookings/changestate', 'BookingsController@changeState');
Route::get('bookings/{id}/submit', 'BookingsController@submitBooking')->name('bookings.submit');
Route::patch('bookings/{booking}/updateStatus', 'BookingsController@updateStatus')->name('bookings.updateStatus');

Route::get('bank', 'treasurerController@index')->name('bank.index');
Route::post('bank', 'treasurerController@submit')->name('bank.submit');

Route::get('/', 'publicController@index');

Route::get('/login', ['as'=>'login',function(){
   return view('login');
}]);

Route::post('/login', 'customAuth@checkAuth');
Route::post('/logout', 'customAuth@logout');
