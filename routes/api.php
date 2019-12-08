<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
// Route::group(['middleware' => 'jwt.auth'], function ($router) {

Route::get('paket', 'PaketController@all');
Route::get('paket/{id}', 'PaketController@get');
Route::post('paket/new', 'PaketController@new');
// });
