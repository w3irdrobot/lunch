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

class Organizations extends Model {

    protected $table = 'organizations';
    protected $fillable = ['name','city','state','country'];
    protected $validations = ['name' => 'max:255|string',
                            'city' => 'max:255|string',
                            'state' => 'max:255|string',
                            'country' => 'max:255|string'];
    
    public function OrganizationsRestaurants() {
        return $this->hasMany('App\OrganizationsRestaurants');
    }
    public function OrganizationsUsers() {
        return $this->hasMany('App\OrganizationsUsers');
    }
    public function Polls() {
        return $this->hasMany('App\Polls');
    }

}