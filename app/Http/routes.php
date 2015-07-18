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

Route::get('restaurant', ['uses' => 'RestaurantController@index', 'as' => 'restaurant.index']);
Route::get('restaurant/create',  ['uses' => 'RestaurantController@create', 'as' => 'restaurant.create']);
Route::post('restaurant',  ['uses' => 'RestaurantController@store', 'as' => 'restaurant']);
Route::get('organization/{orgId}/restaurant/add/{id}',  ['uses' => 'OrganizationsController@addRestaurant', 'as' => 'organization.addRestaurant']);
Route::get('organization/{orgId}/restaurant/remove/{id}',  ['uses' => 'OrganizationsController@removeRestaurant', 'as' => 'organization.removeRestaurant']);

Route::get('/', function () {
    return view('welcome');
});
