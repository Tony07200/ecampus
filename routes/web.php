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

//Route::get('/', function () {
  //  return view('welcome');
//});



Auth::routes();


Route::get('/', 'HomeController@index')->name('front-index');

Route::get('/categorie','PublicationController@index')->name('listing-categorie');
Route::get('/categorie/{name}','PublicationController@show');

Route::get('/tutoriel/','PublicationController@allTutorials')->name('listing-all');
Route::get('/tutoriel/ajout', 'PublicationController@create')->middleware('auth');
Route::get('/tutoriel/{slug}','PublicationController@showTutorial')->name('front-tutorial');

Route::get('/post','PublicationController@listingPost')->name('front-listing-all');
Route::get('/post/ajout', 'PublicationController@createPost')->name('post-ajout');
Route::get('/tuto/ajout', 'PublicationController@createTuto')->name('tuto-ajout');
Route::post('/post/post', 'PublicationController@storePost')->name('store-post');
Route::post('/tuto/post', 'PublicationController@storeTuto')->name('store-puto');
//Route::get('/post/{slug}','PublicationController@ ???')->name('front-listing-all');


Route::get('/recherche/','SearchController@index')->name('search');


Route::get('/profil','UserController@index')->name('front-profil');
Route::get('/profil/infos','UserController@infos')->name('front-config-infos');
Route::post('/profil/infos/update','UserController@update')->name('update-info');
Route::get('/profil/message', 'UserController@message')->name('front-config-message');
Route::get('/profil/preference', 'UserController@preference')->name('front-config-preference');
Route::get('/profil/{firstname}', 'UserController@show')->name('user-profil');

Route::post('/profil/publication/delete/{slug}', 'PublicationController@upStatus')->name('publication.delete');

Route::get('/panier', 'HomeController@panier')->name('front-panier');

//Route::get('/home', 'HomeController@index')->name('home');

// todo changer HomeContoller par ContentController (redirect page fix useless)
Route::get('/cgu', 'ContentController@cgu')->name('front-cgu');
Route::get('/aboutus','ContentController@aboutus')->name('front-aboutus');
Route::get('/contact','ContentController@contact')->name("front-contact");
Route::get('/rgpd', 'ContentController@rgpd')->name('front-rgpd');