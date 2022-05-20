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
    //cv routes
    Route::post('registercv', 'CvController@registercv');
    Route::get('allCv/{id}', 'CvController@allCv');
    Route::get('allCvs', 'CvController@allCvs');
    Route::get('affichecv/{id}', 'CvController@affichecv');
    Route::delete('deletecv/{id}', 'CvController@deletecv');
    Route::post('uploadcv/{id}','CvController@uploadcv')->name('uploadcv');
    Route::post('downloadcv','CvController@downloadcv')->name('downloadcv');
    Route::post('addresume/{id}','CvController@addresume')->name('addresume');
    Route::post('addinteret/{id}','CvController@addinteret')->name('addinteret');
    Route::post('addskills/{id}','CvController@addskills')->name('addskills');
    Route::post('updateinfo/{id}', 'CvController@updateinfo')->name('updateinfo');
    Route::get('recherchecv/{recherche?}','CvController@recherchecv');
    
    //user routes
    Route::get('alluser', 'UserController@alluser');
    Route::get('allcompany', 'UserController@allcompany');
    Route::get('alladmins', 'UserController@alladmins');
    Route::get('afficheuser/{id}', 'UserController@afficheuser');
    Route::post('upload/{id}','UserController@upload')->name('upload');
    Route::get('getUser/{id}', 'UserController@getUser');
    Route::post('updatename/{id}', 'UserController@updatename')->name('updatename');
    Route::post('updateemail/{id}', 'UserController@updateemail')->name('updateemail');
    Route::post('updatepassword/{id}', 'UserController@updatepassword')->name('updatepassword');
    Route::post('updatecompany/{id}', 'UserController@updatecompany')->name('updatecompany');
    Route::post('updateuser/{id}', 'UserController@updateuser')->name('updateuser');
    Route::delete('deleteuser/{id}', 'UserController@deleteuser');
    Route::post('addskillsusers/{id}','UserController@addskillsusers')->name('addskillsusers');
    //experience routes
    Route::get('getexperience/{id}','ExperienceController@getexperience');
    Route::get('afficheexperience/{id}','ExperienceController@afficheexperience');
    Route::post('addexperience','ExperienceController@addexperience')->name('addexperience');
    Route::post('modifierexperience/{id}','ExperienceController@modifierexperience')->name('modifierexperience');
    Route::delete('deleteexperience/{id}','ExperienceController@deleteexperience');
    //diplomes routes
    Route::get('getdiplome/{id}','DiplomeController@getdiplome');
    Route::get('affichediplome/{id}','DiplomeController@affichediplome');
    Route::post('adddiplome','DiplomeController@adddiplome')->name('adddiplome');
    Route::post('modifierdiplome/{id}','DiplomeController@modifierdiplome')->name('modifierdiplome');
    Route::delete('deletediplome/{id}','DiplomeController@deletediplome');
    //competence routes
    Route::get('getcompetence/{id}','CompetenceController@getcompetence');
    Route::get('affichecompetence/{id}','CompetenceController@affichecompetence');
    Route::post('addcompetence','CompetenceController@addcompetence')->name('addcompetence');
    Route::post('modifiercompetence/{id}','CompetenceController@modifiercompetence')->name('modifiercompetence');
    Route::delete('deletecompetence/{id}','CompetenceController@deletecompetence');
    //liens routes
    Route::get('getlien/{id}','LienController@getlien');
    Route::get('affichelien/{id}','LienController@affichelien');
    Route::post('addlien','LienController@addlien')->name('addlien');
    Route::post('modifierlien/{id}','LienController@modifierlien')->name('modifierlien');
    Route::delete('deletelien/{id}','LienController@deletelien');
    //langues routes
    Route::get('getlangue/{id}','LangueController@getlangue');
    Route::get('affichelangue/{id}','LangueController@affichelangue');
    Route::post('addlangue','LangueController@addlangue')->name('addlangue');
    Route::post('modifierlangue/{id}','LangueController@modifierlangue')->name('modifierlangue');
    Route::delete('deletelangue/{id}','LangueController@deletelangue');
    //offres routes
    Route::get('getoffre/{id}','OffreController@getoffre');
    Route::get('alloffres/{id}','OffreController@alloffres');
    Route::get('afficheoffre/{id}', 'OffreController@afficheoffre');
    Route::get('afficheoffresimilaire/{poste?}', 'OffreController@afficheoffresimilaire');
    Route::get('enattente/{id}','OffreController@enattente');
    Route::get('accepter/{id}','OffreController@accepter');
    Route::get('statall/{id}','OffreController@statall');
    Route::get('statattente/{id}','OffreController@statattente');
    Route::get('stataccepter/{id}','OffreController@stataccepter');
    Route::post('registeroffre','OffreController@registeroffre')->name('registeroffre');
    Route::post('modifieroffre/{id}','OffreController@modifieroffre')->name('modifieroffre');
    Route::post('accepteroffre/{id}','OffreController@accepteroffre')->name('accepteroffre');
    Route::delete('deleteoffre/{id}','OffreController@deleteoffre');
    Route::get('toutoffres','OffreController@toutoffres');
    Route::get('toutoffresadmin','OffreController@toutoffresadmin');
    Route::get('offresaujordhui','OffreController@offresaujordhui');
    Route::get('rechercheposte/{recherche?}','OffreController@rechercheposte');
    Route::get('rechercheposteloc/{recherche?}','OffreController@rechercheposteloc');
    Route::post('updatepost/{id}','OffreController@updatepost')->name('updatepost');

    //lettres routes
    Route::get('getlettre/{id}','LettreController@getlettre');
    Route::get('allLettres/{id}','LettreController@allLettres');
    Route::post('registerlettre','LettreController@registerlettre')->name('registerlettre');
    Route::post('modifierlettre/{id}','LettreController@modifierlettre')->name('modifierlettre');
    Route::delete('deletelettre/{id}','LettreController@deletelettre');
    Route::post('downloadlettre','LettreController@downloadlettre')->name('downloadlettre');
    Route::get('affichelettre/{id}', 'LettreController@affichelettre');
    //favoris offre
    Route::post('addfavoris/{id_user}/{id_offre}','FavorisController@addfavoris')->name('addfavoris');
    Route::get('getoffres/{id}','FavorisController@getoffres');
    Route::delete('deleteoffresave/{id_offre}/{id_user}','FavorisController@deleteoffresave');
    Route::delete('deletealloffresave/{id_user}','FavorisController@deletealloffresave');
    //favoris cv
    Route::post('addfavoriscv/{id_user}/{id_cv}','FavorisCvController@addfavoriscv')->name('addfavoriscv');
    Route::get('getcvs/{id}','FavorisCvController@getcvs');
    Route::delete('deletecvsave/{id_cv}/{id_user}','FavorisCvController@deletecvsave');
    Route::delete('deleteallcvsave/{id_user}','FavorisCvController@deleteallcvsave');
    //company
    Route::get('getcompany', 'UserController@getcompany');
    Route::get('counttypecdi', 'OffreController@counttypecdi');
    Route::get('counttypecdd', 'OffreController@counttypecdd');
    Route::get('counttypecontrat', 'OffreController@counttypecontrat');
    Route::get('counttypestage', 'OffreController@counttypestage');
    Route::get('counttypevolontariat', 'OffreController@counttypevolontariat');
    Route::get('counttempsplein', 'OffreController@counttempsplein');
    Route::get('counttempspartiel', 'OffreController@counttempspartiel');
    Route::get('getoffrebycompany/{id}','OffreController@getoffrebycompany');
    Route::get('getoffrebytype/{type}','OffreController@getoffrebytype');
    Route::get('getoffrebytemps/{type}','OffreController@getoffrebytemps');
    //recrutement
    Route::post('postule/{id_user}/{id_offre}','RecrutementController@postule')->name('postule');
    Route::get('getoffrescandidat/{id}','RecrutementController@getoffrescandidat');
    Route::get('getcandidatdetails/{id_user}/{id_offre}','RecrutementController@getcandidatdetails');
    Route::get('countoffrescandidat/{id}','RecrutementController@countoffrescandidat');
    Route::get('getcandidatinfo/{id_user}','RecrutementController@getcandidatinfo');
    Route::get('getoffrepostuler/{id}','RecrutementController@getoffrepostuler');
    Route::delete('deleteoffrepostuler/{id_offre}/{id_user}','RecrutementController@deleteoffrepostuler');
    Route::delete('deletealloffrepostuler/{id_user}','RecrutementController@deletealloffrepostuler');
    
});


