<?php

use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        //\App\Organization::truncate();
        //\App\Restaurant::truncate();
        
        $organization = \App\Organization::create([
            'name' => 'Testing1',
            'city' => 'Cincinnati',
            'state' => 'OH',
            'country' => 'USA',
        ]);
        
        $restaurant = \App\Restaurant::create([
            'name' => 'Burger King',
        ]);
        
        $organization->restaurants()->save($restaurant);
       
    }
}
