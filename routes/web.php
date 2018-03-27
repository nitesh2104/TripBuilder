<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Controller@landing_page');
Route::get('/main', 'Controller@main_page');
Route::prefix('airports')->group(function () {
    Route::get('autocomplete/{input}', 'AirportController@autocomplete');
    Route::get('/', 'AirportController@get_airports');
//    Route::get('/search', 'AirportController@get_flights');
    Route::post('/search', 'TripController@getTrips');
});

