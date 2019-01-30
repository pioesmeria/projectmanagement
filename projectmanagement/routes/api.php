<?php

use Illuminate\Http\Request;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

// ACCOUNT CONTROLLER
// LIST THE ACCOUNTS
Route::get('accounts', 'AccountController@index');
// LIST SINGLE ACCOUNT
Route::get('account/{account_id}', 'AccountController@show');
// CREATE NEW ACCOUNT
Route::post('account/', 'AccountController@store');
// UPDATE ACCOUNT via PUT
// Route::put('account/{account_id}', 'AccountController@store');
// UPDATE ACCOUNT via UPDATE
Route::put('account/{account_id}', 'AccountController@update');
// DELETE ACCOUNT
Route::delete('account/{account_id}', 'AccountController@destroy');

//ACCOUNT INFO CONTROLLER
// LIST THE ACCOUNT INFOS
Route::get('accountinfos', 'AccountInfoController@index');
// LIST SINGLE ACCOUNT INFO
Route::get('accountinfo/{accountinfo_id}', 'AccountInfoController@show');
// CREATE NEW ACCOUNT INFO
Route::post('accountinfo', 'AccountInfoController@store');
// UPDATE ACCOUNT INFO
Route::put('accountinfo/{accountinfo_id}', 'AccountInfoController@store');
// DELETE ACCOUNT INFO
Route::put('accountinfo/{id}', 'AccountInfoController@destroy');