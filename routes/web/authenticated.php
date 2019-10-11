<?php


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::post('/search', 'UserController@search')->name('user.search');
});

Route::group(['prefix' => 'cio'], function () {
    Route::get('/', 'CioController@index')->name('cio.index');
    Route::get('/create/{id}', 'CioController@create')->name('cio.create');
    Route::post('/store', 'CioController@store')->name('cio.store');
    Route::get('/edit/{id}', 'CioController@edit')->name('cio.edit');
    Route::put('/update/{id}', 'CioController@update')->name('cio.update');
    Route::get('/show/{id}', 'CioController@show')->name('cio.show');
    Route::get('/destroy/{id}', 'CioController@destroy')->name('cio.destroy');
});

/* FLOCK // REBANHO */

Route::resource('/flock', 'FlockController');
Route::post('/flock/search', 'FlockController@search')->name('flock.search');
Route::get('/flock/status/{id}/{status}', 'AnimalStatus@status')->name('flock.status');

/* ** */

//Route::resource('/cio', 'CioController');
Route::namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->middleware('user-type:admin')
    ->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');

        Route::resource('/farm', 'FarmController');
    });

Route::namespace('Client')
    ->name('client.')
    ->prefix('client')
    ->middleware('user-type:client')
    ->group(function () {
        //
//        Route::get('/user', 'HomeController@teste');

    });
