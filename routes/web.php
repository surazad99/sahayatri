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

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::post('/add-destination', 'DestinationController@store')->name('destination.add');
    Route::get('/add-package', 'PackageController@add');
    Route::post('/store-package', 'PackageController@store');
    Route::get('/groups','BidController@showGroups');
    Route::get('/bids/{group}','BidController@showBids');
    Route::get('/assign-bid/{bid}','BidController@assignBid');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
