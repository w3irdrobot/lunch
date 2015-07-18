<?php

use Illuminate\Database\Seeder;

class DBSeeder extends Seeder
{
    public function run()
    {
        //\App\Poll::truncate();
        //\App\Restaurant::truncate();
        
        $user = \App\User::create([
            'email' => 'test1@testing.com',
            'password' => 'test1',
            'firstName' => 'ftesting1',
            'lastName' => 'ltesting1',
        ]);
        
        $restaurant = \App\Restaurant::create([
            'name' => 'Burger King',
        ]);  
        
        $organization = \App\Organization::create([
            'name' => 'Testing1',
            'city' => 'Cincinnati',
            'state' => 'OH',
            'country' => 'USA',
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
        
        $user_order = \App\UserOrder::create([
            'user_id' => 1,
            'order_organization_id' => 1,
            'restaurant_id' => 1,
            'default' => 1,
            'order' => 'Test Burger',         
        ]);         
      
        $organization_order = \App\OrganizationOrder::create([
            'organization_restaurant_id' => 1,
            'due_by' => '2017-05-18 04:00:00',
            'closed_at' => '2017-05-18 03:00:00',
        ]);     
        
        $poll_restaurant = \App\PollRestaurant::create([
            'poll_id' => 1,
            'restaurant_id' => 1,
        ]);
        
        $poll->restaurants[0]->users()->save($user);
    }
}
