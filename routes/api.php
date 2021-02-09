<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', "API\Autentikasi@cekLogin");
Route::get('/wahana/{wahana_id?}', "API\WahanaApi@index");
Route::get('/topup/{id_visitor?}', "API\TopupApi@index");
Route::get('/transaction/{id_visitor?}', "API\TransactionApi@index");
Route::get('/visitor/{visitor_id?}', "API\VisitorApi@index");
Route::post('/registrasi', "API\VisitorApi@registrasi");
Route::post('/edit-profil/{visitor_id?}', "API\VisitorApi@editProfil");
Route::post('/historytopup', "API\TopupApi@store");
Route::post('/transaction', "API\TransactionApi@store");