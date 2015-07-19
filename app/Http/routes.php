<?php

Route::get('organizations/add', ['uses' => 'OrganizationsController@add', 'as' => 'newOrganizationForm']);
Route::post('organizations', ['uses' => 'OrganizationsController@create', 'as' => 'createOrganization']);

Route::get('organizations/{id}/users', ['uses' => 'OrganizationsController@users', 'as' => 'organizationUsers']);
Route::post('organizations/{id}/invite', ['uses' => 'OrganizationsController@sendInvite', 'as' => 'organizationInvite']);
Route::get('organizations/{id}', ['uses' => 'OrganizationsController@show', 'as' => 'organization.view']);

Route::get('organization/{orgId}/orders/{id}', ['uses' => 'OrganizationOrderController@show', 'as' => 'organization.']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('restaurants/create',  ['uses' => 'RestaurantsController@create', 'as' => 'restaurant.create']);
Route::post('restaurants',  ['uses' => 'RestaurantsController@store', 'as' => 'restaurant']);

Route::get('organizations/{orgId}/poll', ['uses' => 'PollsController@index', 'as' => 'poll.index']);
Route::get('organizations/{orgId}/poll/create', ['uses' => 'PollsController@create', 'as' => 'poll.create']);
Route::post('organizations/{orgId}/poll', ['uses' => 'PollsController@store', 'as' => 'poll.store']);

Route::get('organizations/{orgId}/order', ['uses' => 'OrganizationOrderController@index', 'as' => 'orgorder.index']);
Route::get('organizations/{orgId}/order/create', ['uses' => 'OrganizationOrderController@create', 'as' => 'orgorder.create']);
Route::post('organizations/{orgId}/order', ['uses' => 'OrganizationOrderController@store', 'as' => 'orgorder.store']);

Route::get('polls/{id}/restaurant/add', ['uses' => 'PollsController@addRestaurant', 'as' => 'poll.restaurantAdd']);
Route::post('polls/{id}/restaurant/store', ['uses' => 'PollsController@storeRestaurant', 'as' => 'poll.restaurantAdd']);

Route::get('polls/{id}', ['uses' => 'PollsController@show', 'as' => 'poll.view']);
Route::get('polls/vote/{id}', ['uses' => 'PollsController@vote', 'as' => 'poll.vote']);
Route::get('polls/{id}/close', ['uses' => 'PollsController@close', 'as' => 'poll.close']);

Route::get('organizations/{orgId}/restaurant', ['uses' => 'RestaurantsController@index', 'as' => 'restaurant.index']);
Route::get('organizations/{orgId}/restaurant/create',  ['uses' => 'RestaurantsController@create', 'as' => 'restaurant.create']);
Route::post('organizations/{orgId}/restaurant',  ['uses' => 'RestaurantsController@store', 'as' => 'restaurant']);

Route::get('organizations/{orgId}/restaurant/add/{id}',  ['uses' => 'OrganizationsController@addRestaurant', 'as' => 'organization.addRestaurant']);
Route::get('organizations/{orgId}/restaurant/remove/{id}',  ['uses' => 'OrganizationsController@removeRestaurant', 'as' => 'organization.removeRestaurant']);

Route::get('user-order', ['uses' => 'UserOrdersController@index', 'as' => 'user_orders.index']);
Route::post('user-order/{ordOrgId}/', ['uses' => 'UserOrdersController@create', 'as' => 'user_orders.create']);

Route::get('organization-order', ['uses' => 'OrganizationOrderController@index', 'as' => 'organization_order.index']);
Route::post('organization-order/{orgId}/', ['uses' => 'OrganizationOrderController@create', 'as' => 'organization_order.create']);

Route::get('/', function () {
    return view('welcome');
});
