<?php

Route::get('/', 'FrontController@index')->name('front.home');

Route::redirect('/home', '/admin');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('photos/destroy', 'PhotosController@massDestroy')->name('photos.massDestroy');

    Route::get('photos/review', 'PhotosController@indexReview')->name('photos.indexReview'); 

    Route::post('photos/media', 'PhotosController@storeMedia')->name('photos.storeMedia');

    Route::resource('photos', 'PhotosController');
});
