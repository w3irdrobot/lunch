<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Watson\Validating\ValidatingTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ValidatingTrait;

    protected $table = 'users';
    
    protected $fillable = ['email', 'password', 'firstName', 'lastName'];

    protected $hidden = ['password', 'remember_token'];

    protected $validations = [
        'email' => 'max:255|string',
        'password' => 'max:60|string',
        'firstName' => 'max:255|string',
        'lastName' => 'max:255|string',
        'remember_token' => 'max:100|string'
    ];

    public function getFullName() {
        return $this->firstName . " " . $this->lastName;
    }
    
    public function pollResponses() {
        return $this->belongsToMany('App\PollRestaurant','polls_responses');
    }
}
