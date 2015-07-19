<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */

class Organization extends Model {

    use ValidatingTrait;

    protected $table = 'organizations';

    protected $fillable = ['name'];

    protected $rules = [
        'name' => 'required|max:255|string'
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