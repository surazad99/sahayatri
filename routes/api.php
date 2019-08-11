<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
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
    return new UserResource($request->user());
});

Route::get('show-package', 'PackageController@show');

Route::get('show-destinations/{package}', 'DestinationController@showDestination');
Route::get('show-destinations','DestinationController@index');
Route::get('show-packages/{destination}','DestinationController@showPackages');

Route::post('select-package','PackageController@select');
Route::get('show-images/{destination}', 'DestinationController@showImages');

Route::get('user-groups/{user}','GroupController@showGroup');

Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');

Route::get('/package-details/{package}','PackageController@details');

Route::post('/bid','BidController@store');
Route::get('/show-bids','BidController@showBids');


Route::get('/maley', 'PackageController@toMaley');