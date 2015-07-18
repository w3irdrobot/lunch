<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        \App\User::truncate();
        \App\User::create([
            'email' => 'test1@testing.com',
            'password' => 'test1',
            'firstName' => 'ftesting1',
            'lastName' => 'ltesting1',
        ]); 
        
        \App\User::create([
            'email' => 'test2@testing.com',
            'password' => 'test2',
            'firstName' => 'ftesting2',
            'lastName' => 'ltesting2',
        ]);

        \App\User::create([
            'email' => 'test3@testing.com',
            'password' => 'test3',
            'firstName' => 'ftesting3',
            'lastName' => 'ltesting3',
        ]);        
    }
}
