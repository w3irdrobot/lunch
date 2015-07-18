<?php

use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    public function run() {
        \App\Poll::truncate();
        
        $poll = \App\Poll::create([
            'closed_at' => '2017-05-18 03:00:00',
            'closed_by' => '2017-05-18 04:00:00',
            'organization_id' => 1,
        ]);
        
        $restaurant = \App\Restaurant::create([
            'name' => 'Testing1',
        ]);
        
        $poll->polloptions()->associate($restaurant);
        
        \App\Poll::create([
            'closed_at' => '2017-05-18 03:00:00',
            'closed_by' => '2017-05-18 04:00:00',
            'organization_id' => 2,
        ]);
        
        \App\Poll::create([
            'closed_at' => '2017-05-18 03:00:00',
            'closed_by' => '2017-05-18 04:00:00',
            'organization_id' => 3,
        ]);        
    }
   
}
