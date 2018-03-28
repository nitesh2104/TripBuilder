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
Route::get('/viewTrips', 'TripController@viewTrips');
Route::post('search', 'TripController@get_Trips');
Route::post('addTrip', 'TripController@add_Trips');
Route::post('deleteTrip', 'TripController@delete_Trips');
Route::get('recreateAirports', 'AirportController@create_airports');

Route::prefix('airports')->group(function () {
    Route::get('/', 'AirportController@get_airports');
    Route::get('autocomplete/{input}', 'AirportController@autocomplete');
    Route::get('/create_airports', 'AirportController@create_airports');


});

