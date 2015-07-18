<?php

Route::get('organizations/{id}/users', ['uses' => 'OrganizationsController@users', 'as' => 'organizationUsers']);
Route::post('organizations/{id}/invite', ['uses' => 'OrganizationsController@sendInvite', 'as' => 'organizationInvite']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('restaurant', 'RestaurantController');
Route::get('organization/restaurant/add/{id}', 'OrganziationController@addRestaurant');
Route::get('organization/restaurant/remove/{id}', 'OrganziationController@removeRestaurant');

Route::get('/', function () {
    return view('welcome');
});
