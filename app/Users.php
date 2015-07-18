<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $firstName
 * @property string $lastName
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */

class Users extends Model {

    protected $table = 'users';
    protected $fillable = ['email','password','firstName','lastName','remember_token'];
    protected $validations = ['email' => 'max:255|string',
                            'password' => 'max:60|string',
                            'firstName' => 'max:255|string',
                            'lastName' => 'max:255|string',
                            'remember_token' => 'max:100|string'];
    
    public function OrdersUsers() {
        return $this->hasMany('App\OrdersUsers');
    }
    public function OrganizationsUsers() {
        return $this->hasMany('App\OrganizationsUsers');
    }
    public function PollsResponses() {
        return $this->hasMany('App\PollsResponses');
    }

}