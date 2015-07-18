<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $email
 * @property string $token
 * @property string $created_at
 */

class PasswordResets extends Model {

    protected $table = 'password_resets';
    protected $fillable = ['email','token'];
    protected $validations = ['email' => 'max:255|string',
                            'token' => 'max:255|string'];
    

}