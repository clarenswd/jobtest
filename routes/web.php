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


//Shows the races
Route::get('/', function () {
    return redirect()->action('RaceController@index');
});

Route::resource('races', 'RaceController');
Route::resource('competitors', 'CompetitorController');
Route::resource('meetings', 'MeetingController');
//Ajax call
Route::get('js-get-next-five','RaceController@getNextFive');
Route::post('close-race','RaceController@closeRace');

//"Dev" routes
Route::get('seedraces','RaceController@runSeeder');

