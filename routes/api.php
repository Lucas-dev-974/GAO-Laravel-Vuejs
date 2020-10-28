<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('ordinateurs')->group(function () {
    Route::get('/', 'OrdinateurController@get');
    Route::post('/', 'OrdinateurController@add');
});

Route::prefix('clients')->group(function () {
    Route::get('/search', 'ClientController@search');
});

Route::prefix('attributions')->group(function () {
    Route::post('/', 'AttributionController@add');
    Route::delete('/{id}', 'AttributionController@remove')->where('id', "[0-9]+");
});
