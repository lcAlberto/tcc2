<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::post('/search', 'UserController@search')->name('user.search');
});


Route::namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->middleware('user-type:admin')
    ->group(function () {
        Route::resource('/users', 'UserController');
    });

Route::namespace('Client')
    ->name('client.')
    ->prefix('client')
    ->middleware('user-type:client')
    ->group(function () {
        //
//        Route::get('/user', 'HomeController@teste');

    });