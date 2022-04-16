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
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

    Route::post('registercv', 'CvController@registercv');
    Route::get('allCv/{id}', 'CvController@allCv');
    Route::get('affichecv/{id}', 'CvController@affichecv');
    Route::get('afficheuser/{id}', 'UserController@afficheuser');
    Route::post('upload/{id}','UserController@upload')->name('upload');
    Route::post('uploadcv/{id}','CvController@uploadcv')->name('uploadcv');
    Route::get('getUser/{id}', 'UserController@getUser');
    Route::post('updatename/{id}', 'UserController@updatename')->name('updatename');
    Route::post('updateemail/{id}', 'UserController@updateemail')->name('updateemail');
    Route::post('updatepassword/{id}', 'UserController@updatepassword')->name('updatepassword');
    Route::delete('deleteuser/{id}', 'UserController@deleteuser');

});


