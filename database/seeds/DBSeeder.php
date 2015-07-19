<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Seeder;

class DBSeeder extends Seeder
{
    public function run()
    {
        Artisan::call('migrate:refresh');
        
        $user = \App\User::create([
            'email' => 'test1@testing.com',
            'password' => '$2y$10$zhRDGljo5k5jn6oifVCA7.4GzB6OKmV1QkJfvErtcheR0m5jMLK9S',
            'firstName' => 'ftesting1',
            'lastName' => 'ltesting1',
        ]);
        
        $restaurant = \App\Restaurant::create([
            'name' => 'Burger King',
        ]);  
        
        $organization = \App\Organization::create([
            'name' => 'Testing1',            
        ]);        
        
        $poll = \App\Poll::create([
            'closed_at' => '2017-05-18 03:00:00',
            'closed_by' => '2017-05-18 04:00:00',
            'organization_id' => 1,
        ]);
 
        $organization->restaurants()->save($restaurant);
        $poll->restaurants()->save($restaurant);         
        
        $role = \App\Role::create([
            'user_id' => 1,
            'organization_id' => 1,
            'role' => 'Tester',
        ]);         
 
        $organization_order = \App\OrganizationOrder::create([
            'organization_restaurant_id' => 1,
            'due_by' => '2017-05-18 04:00:00',
            'closed_at' => '2017-05-18 03:00:00',
        ]);         
        
        $user_order = \App\UserOrder::create([
            'user_id' => 1,
            'restaurant_id' => 1,
            'default' => 1,
            'order' => 'Test Burger',         
        ]);         
 
        $polloption = \App\PollRestaurant::find(1);
        $polloption->users()->save($user);
    }
}
