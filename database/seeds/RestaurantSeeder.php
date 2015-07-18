<?php

use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        \App\Restaurant::truncate();
        \App\Restaurant::create([
            'name' => 'Testing1',
        ]);   
        
        \App\Restaurant::create([
            'name' => 'Testing2',
        ]);  
        
        \App\Restaurant::create([
            'name' => 'Testing3',
        ]);          
    }
}
