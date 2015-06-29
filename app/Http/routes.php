<?php

Route::get('/', 'HomeController@index');
Route::group(['prefix' => 'articles'], function () {
    Route::get('/', 'ArticlesController@index');
    Route::get('create', 'ArticlesController@create');
    Route::post('store', 'ArticlesController@store');
    Route::get('edit/{slug}', 'ArticlesController@edit');
    Route::post('update/{slug}', 'ArticlesController@update');
    Route::get('delete/{slug}', 'ArticlesController@destroy');
    Route::get('/{slug}', 'ArticlesController@show');
});

Route::get('categories/{slug}', 'CategoriesController@index');

Route::get('tags/{slug}', 'TagsController@index');

Route::group(['prefix' => 'knots'], function () {
    Route::get('/', 'KnotsController@index');
});

Route::group(['prefix' => 'projects'], function () {
    Route::get('/', 'ProjectsController@index');
});

Route::get('search/{words}', 'SearchController@index');

Route::get('setup', 'SetupController@setup');
Route::post('setup', 'SetupController@store');

// images
Route::get('images/{filename}', 'ImagesController@index');
Route::post('images/upload', 'ImagesController@upload');
Route::post('images/ckupload', 'ImagesController@ck_upload');

Route::get('dashboard/{slug?}', 'DashboardController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);