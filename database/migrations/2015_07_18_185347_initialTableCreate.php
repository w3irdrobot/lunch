<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTableCreate extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->timestamps();
        });
        
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });
        
        Schema::create('organizations_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->string('role');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
        
        Schema::create('organizations_restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
        
        Schema::create('orders_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_restaurant_id')->unsigned();
            $table->datetime('due_by');
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
            
            $table->foreign('organization_restaurant_id')->references('id')->on('organizations_restaurants');
        });
        
        Schema::create('orders_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('order_organization_id')->unsigned();
            $table->integer('restaurant_id')->unsigned();
            $table->boolean('default');
            $table->text('order');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_organization_id')->references('id')->on('orders_organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders_users');
        Schema::drop('orders_organizations');
        Schema::drop('organizations_restaurants');
        Schema::drop('organizations_users');
        
        Schema::drop('organizations');
        Schema::drop('restaurants');
    }
}
