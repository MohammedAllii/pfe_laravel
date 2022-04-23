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
    //Authentification
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
    Route::post('addresume/{id}','CvController@addresume')->name('addresume');
    Route::post('addinteret/{id}','CvController@addinteret')->name('addinteret');
    Route::post('addskills/{id}','CvController@addskills')->name('addskills');
    Route::get('getUser/{id}', 'UserController@getUser');
    Route::post('updatename/{id}', 'UserController@updatename')->name('updatename');
    Route::post('updateemail/{id}', 'UserController@updateemail')->name('updateemail');
    Route::post('updateinfo/{id}', 'CvController@updateinfo')->name('updateinfo');
    Route::post('updatepassword/{id}', 'UserController@updatepassword')->name('updatepassword');
    Route::delete('deleteuser/{id}', 'UserController@deleteuser');
    //experience
    Route::get('getexperience/{id}','ExperienceController@getexperience');
    Route::get('afficheexperience/{id}','ExperienceController@afficheexperience');
    Route::post('addexperience','ExperienceController@addexperience')->name('addexperience');
    Route::post('modifierexperience/{id}','ExperienceController@modifierexperience')->name('modifierexperience');
    Route::delete('deleteexperience/{id}','ExperienceController@deleteexperience');
    //diplomes
    Route::get('getdiplome/{id}','DiplomeController@getdiplome');
    Route::get('affichediplome/{id}','DiplomeController@affichediplome');
    Route::post('adddiplome','DiplomeController@adddiplome')->name('adddiplome');
    Route::post('modifierdiplome/{id}','DiplomeController@modifierdiplome')->name('modifierdiplome');
    Route::delete('deletediplome/{id}','DiplomeController@deletediplome');
    //competence
    Route::get('getcompetence/{id}','CompetenceController@getcompetence');
    Route::get('affichecompetence/{id}','CompetenceController@affichecompetence');
    Route::post('addcompetence','CompetenceController@addcompetence')->name('addcompetence');
    Route::post('modifiercompetence/{id}','CompetenceController@modifiercompetence')->name('modifiercompetence');
    Route::delete('deletecompetence/{id}','CompetenceController@deletecompetence');
    //liens
    Route::get('getlien/{id}','LienController@getlien');
    Route::get('affichelien/{id}','LienController@affichelien');
    Route::post('addlien','LienController@addlien')->name('addlien');
    Route::post('modifierlien/{id}','LienController@modifierlien')->name('modifierlien');
    Route::delete('deletelien/{id}','LienController@deletelien');
    //langues
    Route::get('getlangue/{id}','LangueController@getlangue');
    Route::get('affichelangue/{id}','LangueController@affichelangue');
    Route::post('addlangue','LangueController@addlangue')->name('addlangue');
    Route::post('modifierlangue/{id}','LangueController@modifierlangue')->name('modifierlangue');
    Route::delete('deletelangue/{id}','LangueController@deletelangue');

});


