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

Route::get('/', function () {
    // return view('welcome');
    return view('index');
});


Route::get('/compare-images', 'ImageCompareController@index');



Route::get('/buildings-map/{id}', 'BuildingsMapController@index');

// Route::get('/buildings-map-data', 'BuildingsMapController@processData')->name('buildings-map-data');


Route::get('/put-markers-map', 'AlertMapController@putMarkers');
Route::post('/save-alert-marker', 'AlertMapController@saveMarker');

Route::get('/earthquakes/all-romania', 'RecentEarthquakeController@allRomania');
Route::get('/earthquakes/raw', 'RecentEarthquakeController@raw');
// Route::get('/cutremure', 'RecentEarthquakeController@index');

