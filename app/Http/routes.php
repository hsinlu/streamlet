<?php

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    // Articles routes
    Route::group(['prefix' => 'articles'], function() {
        Route::any('hub/{slug?}', ['as' => 'articles_hub', 'uses' => 'ArticlesController@hub']);
        Route::get('create', 'ArticlesController@create');
        Route::post('store', 'ArticlesController@store');
        Route::get('edit/{slug}', 'ArticlesController@edit');
        Route::post('update/{slug}', 'ArticlesController@update');
        Route::get('delete/{slug}', 'ArticlesController@destroy');
    });

    // Settings routes
    Route::group(['prefix' => 'settings', 'namespace' => 'Settings'], function() {
        Route::group(['prefix' => 'general'], function() {
            Route::get('/', 'GeneralController@edit');
            Route::post('/', 'GeneralController@update');
        });
        Route::group(['prefix' => 'profile'], function() {
            Route::get('/', 'ProfileController@edit');
            Route::post('/', 'ProfileController@update');
        });
        Route::group(['prefix' => 'categories'], function() {
            Route::get('/', 'CategoriesController@index');
        });
        Route::group(['prefix' => 'tags'], function() {
            Route::get('/', 'TagsController@index');
        });
    });

    // Knots routes
    Route::group(['prefix' => 'knots'], function() {

    });

    // Projects routes
    Route::group(['prefix' => 'projects'], function() {

    });
});

// Home
Route::get('/', 'HomeController@index');

// Articles routes
Route::group(['prefix' => 'articles'], function () {
    Route::get('/', 'ArticlesController@index');
    Route::get('/{slug}', 'ArticlesController@show');
});

// Categories routes
Route::get('categories/{slug}', 'CategoriesController@index');

// Tags routes
Route::get('tags/{slug}', 'TagsController@index');

// Date routes
Route::get('date/{date}', 'DateController@index');

// Knots routes
Route::group(['prefix' => 'knots'], function () {
    Route::get('/', 'KnotsController@index');
});

// Projects routes
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', 'ProjectsController@index');
});

// Search routes
Route::get('search', 'SearchController@index');

// Setup routes
Route::get('setup', 'SetupController@setup');
Route::post('setup', 'SetupController@store');

// Images routes
Route::post('images/upload', 'ImagesController@upload');
Route::post('images/ckupload', 'ImagesController@ck_upload');

// Auth routes
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);