<?php
/**
 * Created by PhpStorm.
 * User: lucka
 * Date: 17/08/19
 * Time: 23:53
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
//Auth::routes();

Route::group(['prefix' => '/procriare'], function () {
    Route::get('/terms-of-use', 'PagesController@terms')->name('procriare.terms');
    Route::get('/about', 'PagesController@about')->name('procriare.about');
    Route::get('/help', 'PagesController@help')->name('procriare.help');
});

