<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 */

class Organization extends Model {

    protected $table = 'organizations';

    protected $fillable = ['name', 'city', 'state', 'country'];

    protected $validations = [
        'name' => 'max:255|string',
        'city' => 'max:255|string',
        'state' => 'max:255|string',
        'country' => 'max:255|string'
    ];

    public function roles() {
        return $this->hasMany('App\Role');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'roles');
    }

    public function polls() {
        return $this->hasMany('App\Poll');
    }
    
    public function restaurants() {
        return $this->belongsToMany('App\Restaurant','organizations_restaurants');
    }

}