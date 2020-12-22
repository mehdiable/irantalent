<?php

use Illuminate\Support\Facades\Route;

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


// simple access check process
Route::group(['middleware' => ['access'], 'namespace' => 'App\Http\Controllers'], function ()
{
    Route::get('/seed', 'PositionController@runSeeders')->name('seeder');
    Route::get('/', 'PositionController@index')->name('index');
    Route::get('/view/{id}', 'PositionController@view')->name('view');
    Route::post('/create', 'PositionController@create')->name('create');
    Route::put('/update/{id}', 'PositionController@update')->name('update');
    Route::delete('/delete/{id}', 'PositionController@destroy')->name('destroy');
    
    Route::get('/search', 'PositionController@search')->name('search');
});
