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

Route::group([
    'middleware' => 'auth:api'
        ], function() {
      Route::get('logout', 'Api\AuthController@logout');
      Route::get('user', 'Api\AuthController@user');
  });

Route::get('show-package', 'PackageController@show');

Route::get('show-destinations/{package}', 'DestinationController@showDestination');
Route::get('show-destinations','DestinationController@index');
Route::get('show-packages/{destination}','DestinationController@showPackages');

Route::post('select-package','PackageController@select');
Route::get('show-images/{destination}', 'DestinationController@showImages');

Route::get('user-groups/{user}','GroupController@showGroup');
Route::get('active-groups','GroupController@showActiveGroups');


Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');
Route::get('/logout/{user}','Api\AuthController@logout');


Route::get('/package-details/{package}','PackageController@details');

Route::post('/bid','BidController@store');
Route::get('/show-bids','BidController@showBids');
Route::get('/confirmed-group/{user}','GroupController@showConfirmedGroups');
Route::get('/show-agent-user/{user}','GroupController@showAgentToUser');



Route::get('/maley', 'PackageController@toMaley');