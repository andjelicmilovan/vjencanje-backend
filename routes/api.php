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

Route::get('/svi', 'vjencanjeController@show');
Route::get('/vjencanje/{id}', 'vjencanjeController@findById');
Route::post('/dodaj-novi', 'vjencanjeController@novi');
Route::post('uzmi-suprug', 'vjencanjeController@pretraziPoSuprugu');
Route::post('uzmi-supruga', 'vjencanjeController@pretraziPoSupruzi');
Route::post('edit', 'vjencanjeController@edit');
Route::get('/maticari', 'maticarController@show');
Route::get('/maticar/{id}', 'maticarController@showById');
Route::get('/dokumenta', 'dokumentaController@show');
Route::get('/dokumenta/{id}', 'vjencanjeController@showById');
Route::get('/odbornici', 'odbornikController@show');
Route::get('/odbornik/{id}', 'odbornikController@showById');
Route::post('/pivot', 'pivotController@dodaj');
Route::get('/pivot-obrisi', 'pivotController@obrisi');
Route::post('/maticar-dodaj', 'maticarController@dodaj');
Route::post('maticar-deaktiviraj/{id}', 'maticarController@deaktiviraj');
Route::post('odbornik-dodaj', 'odbornikController@dodaj');
Route::post('odbornik-deaktiviraj/{id}', 'odbornikController@deaktiviraj');
Route::post('register','authController@register');
Route::post('login', 'authController@login');
Route::get('rezervacije', 'reservationController@show');
Route::post('dodaj-rezervaciju', 'reservationController@addReservation');
Route::get('obrisi-rezervaciju/{id}', 'reservationController@delete');
Route::middleware('auth:sanctum')->group(function ()
{
    //Route::get('user', 'authController@user');
    Route::get('user', function (){
        return auth()->user();
    });
    Route::post('logout', 'authController@logout');
});


