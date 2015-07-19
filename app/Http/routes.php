<?php

Route::get('organizations/add', ['uses' => 'OrganizationsController@add', 'as' => 'newOrganizationForm']);
Route::post('organizations', ['uses' => 'OrganizationsController@create', 'as' => 'createOrganization']);

Route::get('organizations/{id}/users', ['uses' => 'OrganizationsController@users', 'as' => 'organizationUsers']);
Route::post('organizations/{id}/invite', ['uses' => 'OrganizationsController@sendInvite', 'as' => 'organizationInvite']);
Route::get('organizations/{id}', ['uses' => 'OrganizationsController@show', 'as' => 'organization.view']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('restaurant/create',  ['uses' => 'RestaurantsController@create', 'as' => 'restaurant.create']);
Route::post('restaurant',  ['uses' => 'RestaurantsController@store', 'as' => 'restaurant']);

Route::get('organization/{orgId}/poll', ['uses' => 'PollsController@index', 'as' => 'poll.index']);
Route::get('organization/{orgId}/poll/create', ['uses' => 'PollsController@create', 'as' => 'poll.create']);
Route::post('organization/{orgId}/poll', ['uses' => 'PollsController@store', 'as' => 'poll.store']);

Route::get('poll/{id}/restaurant/add', ['uses' => 'PollsController@addRestaurant', 'as' => 'poll.restaurantAdd']);
Route::post('poll/{id}/restaurant/store', ['uses' => 'PollsController@storeRestaurant', 'as' => 'poll.restaurantAdd']);

Route::get('poll/{id}', ['uses' => 'PollsController@show', 'as' => 'poll.view']);
Route::get('poll/vote/{id}', ['uses' => 'PollsController@vote', 'as' => 'poll.vote']);

Route::get('organization/{orgId}/restaurant', ['uses' => 'RestaurantsController@index', 'as' => 'restaurant.index']);
Route::get('organization/{orgId}/restaurant/create',  ['uses' => 'RestaurantsController@create', 'as' => 'restaurant.create']);
Route::post('organization/{orgId}/restaurant',  ['uses' => 'RestaurantsController@store', 'as' => 'restaurant']);

Route::get('organization/{orgId}/restaurant/add/{id}',  ['uses' => 'OrganizationsController@addRestaurant', 'as' => 'organization.addRestaurant']);
Route::get('organization/{orgId}/restaurant/remove/{id}',  ['uses' => 'OrganizationsController@removeRestaurant', 'as' => 'organization.removeRestaurant']);

Route::get('user-order', ['uses' => 'UserOrdersController@index', 'as' => 'user_orders.index']);
Route::post('user-order/{ordOrgId}/', ['uses' => 'UserOrdersController@create', 'as' => 'user_orders.create']);

Route::get('organization-order', ['uses' => 'OrganizationOrderController@index', 'as' => 'organization_order.index']);
Route::post('organization-order/{orgId}/', ['uses' => 'OrganizationOrderController@create', 'as' => 'organization_order.create']);

Route::get('/', function () {
    return view('welcome');
});
