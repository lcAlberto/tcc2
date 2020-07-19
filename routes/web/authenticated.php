<?php


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile/{id}', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile/{id}', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

/* animals // REBANHO */
Route::group(['prefix' => 'animals'], function () {
    Route::get('/index', 'AnimalController@index')->name('animals.index');
    Route::get('/create', 'AnimalController@create')->name('animals.create');
    Route::post('/store', 'AnimalController@store')->name('animals.store');
    Route::get('/edit/{id}', 'AnimalController@edit')->name('animals.edit');
    Route::put('/update/{id}', 'AnimalController@update')->name('animals.update');
    Route::get('/show/{id}', 'AnimalController@show')->name('animals.show');
    Route::get('/destroy/{id}', 'AnimalController@destroy')->name('animals.destroy');
    Route::get('/search', 'AnimalController@search')->name('animals.search');
    Route::get('/reports/all', 'AnimalController@animalsReports')->name('animals.report');
});

Route::group(['prefix' => 'cio'], function () {
    Route::get('/', 'AnimalHeatController@index')->name('cio.index');
    Route::get('/create/{id}', 'AnimalHeatController@create')->name('cio.create');
    Route::post('/store', 'AnimalHeatController@store')->name('cio.store');
    Route::get('/edit/{id}', 'AnimalHeatController@edit')->name('cio.edit');
    Route::put('/update/{id}', 'AnimalHeatController@update')->name('cio.update');
    Route::get('/show/{id}', 'AnimalHeatController@show')->name('cio.show');
    Route::post('/search', 'AnimalHeatController@search')->name('cio.search');
    Route::get('/animal/{id}', 'AnimalHeatController@heatByAnimal')->name('cio.heatByAnimal');

});

/* HEALTH */
Route::group(['prefix' => 'health'], function () {
    Route::get('/', 'HealthController@index')->name('health.index');
    Route::get('/create', 'HealthController@create')->name('health.create');
    Route::post('/store', 'HealthController@store')->name('health.store');
    Route::get('/edit/{id}', 'HealthController@edit')->name('health.edit');
    Route::post('/update/{id}', 'HealthController@update')->name('health.update');
    Route::get('/show/{id}', 'HealthController@show')->name('health.show');
    Route::get('/destroy/{id}', 'HealthController@destroy')->name('health.destroy');
    Route::get('/healthByAnimal/{id}', 'HealthController@healthByAnimal')->name('health.byAnimal');
    Route::post('/search', 'HealthController@search')->name('health.search');
});

/* MEDICAMENT */
Route::group(['prefix' => 'medicament'], function () {
    Route::get('/', 'MedicamentController@index')->name('medicament.index');
    Route::get('/create', 'MedicamentController@create')->name('medicament.create');
    Route::post('/store', 'MedicamentController@store')->name('medicament.store');
    Route::get('/edit/{id}', 'MedicamentController@edit')->name('medicament.edit');
    Route::post('/update/{id}', 'MedicamentController@update')->name('medicament.update');
    Route::get('/show/{id}', 'MedicamentController@show')->name('medicament.show');
    Route::get('/destroy/{id}', 'MedicamentController@destroy')->name('medicament.destroy');
    Route::post('/search', 'MedicamentController@search')->name('medicament.search');
    Route::get('/flyer/{id}', 'MedicamentController@loadFlyer')->name('medicament.loadFlyer');
});


//Route::resource('/medicament', 'MedicamentController');


Route::namespace('Admin')//rotas do admin
->name('admin.')
    ->prefix('admin')
    ->middleware('user-type:admin')
    ->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
        Route::post('/search', 'UserController@search')->name('user.search');
        Route::resource('/farm', 'FarmController');
        Route::get('profile/{id}', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    });

Route::namespace('Client')//rotas do cliente
->name('client.')
    ->prefix('client')
    ->middleware('user-type:client')
    ->group(function () {
    });


Route::group(['prefix' => '/procriare'], function () {
    Route::get('/terms-of-use', 'PagesController@terms')->name('procriare.terms');
    Route::get('/about', 'PagesController@about')->name('procriare.about');
    Route::get('/help', 'PagesController@help')->name('procriare.help');
});
