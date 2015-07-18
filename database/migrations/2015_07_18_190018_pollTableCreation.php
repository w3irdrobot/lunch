<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PollTableCreation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('closed_at')->nullable();
            $table->datetime('closed_by');
            $table->integer('organization_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
        
        Schema::create('poll_restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poll_id')->unsigned();
            $table->integer('restaurant_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('poll_id')->references('id')->on('polls');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
        
        Schema::create('poll_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('poll_restaurant_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('poll_restaurant_id')->references('id')->on('poll_restaurants');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('polls');
        Schema::drop('poll_restaurants');
        Schema::drop('poll_responses');
    }
}
