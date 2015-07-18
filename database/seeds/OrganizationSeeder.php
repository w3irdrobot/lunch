<?php

use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        \App\Organization::truncate();
        \App\Organization::create([
            'name' => 'Testing1',
            'city' => 'Cincinnati',
            'state' => 'OH',
            'country' => 'USA',
        ]);
        
        \App\Organization::create([
            'name' => 'Testing2',
            'city' => 'Dayton',
            'state' => 'OH',
            'country' => 'USA',
        ]);
        
        \App\Organization::create([
            'name' => 'Testing3',
            'city' => 'Columbus',
            'state' => 'OH',
            'country' => 'USA',
        ]);        
    }
}
