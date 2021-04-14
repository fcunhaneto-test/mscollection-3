<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registro', 'Auth\AuthenticatorController@register');
Route::post('login', 'Auth\AuthenticatorController@login');
Route::post('logout', 'Auth\AuthenticatorController@logout');

Route::prefix('title')->group(function() {
    Route::post('/store', 'TitleController@store');
});

Route::prefix('media')->group(function() {
    Route::get('', 'Qualifiers\MediaController@index');
});

Route::prefix('category')->group(function() {
    Route::get('', 'Qualifiers\CategoryController@index');
});

Route::prefix('cast')->group(function() {
    Route::get('/store', 'Cast\CastController@store');
});



