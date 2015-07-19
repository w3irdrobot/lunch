<?php

Route::get('slack/outgoing-vote/{id}', ['uses' => 'SlackController@outgoingVote']);
Route::post('slack/incoming-vote', ['uses' => 'SlackController@incomingVote']);

Route::get('organizations/add', ['uses' => 'OrganizationsController@add', 'as' => 'newOrganizationForm']);
Route::post('organizations', ['uses' => 'OrganizationsController@create', 'as' => 'createOrganization']);

Route::get('organizations', ['uses' => 'OrganizationsController@show', 'as' => 'organization.default']);

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

Route::get('user-orders', ['uses' => 'UserOrdersController@index', 'as' => 'user_orders.index']);
Route::get('user-orders/create', ['uses' => 'UserOrdersController@create', 'as' => 'user_orders.create']);
Route::post('user-orders', ['uses' => 'UserOrdersController@store', 'as' => 'user_orders.store']);
Route::get('user-orders/{id}/default', ['uses' => 'UserOrdersController@makeDefault', 'as' => 'user_orders.makeDefault']);

Route::get('organizations/{orgId}/organizations-orders/{id}', ['uses' => 'OrganizationOrderController@show', 'as' => 'orgorder.show']);
Route::get('organizations/{orgId}/organizations-orders/{id}/close', ['uses' => 'OrganizationOrderController@close', 'as' => 'orgorder.close']);

Route::get('organizations-orders/{id}/lineitem/create', ['uses' => 'LineItemController@create', 'as' => 'lineitem.create']);
Route::post('organizations-orders/{id}/lineitem', ['uses' => 'LineItemController@store', 'as' => 'lineitem.store']);

Route::get('line-item/{id}/update', ['uses' => 'LineItemController@update', 'as' => 'lineitem.update']);
Route::post('line-item/{id}/update', ['uses' => 'LineItemController@save', 'as' => 'lineitem.save']);

Route::get('/', function () {
    return view('welcome');
});
