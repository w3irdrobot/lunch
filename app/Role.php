<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $organization_id
 * @property string $role
 * @property string $created_at
 * @property string $updated_at
 */

class Role extends Model {

    protected $table = 'roles';

    protected $fillable = ['user_id', 'organization_id', 'role'];

    protected $validations = [
        'user_id' => 'exists:users,id|integer|min:0|required',
        'organization_id' => 'exists:organizations,id|integer|min:0|required',
        'role' => 'max:255|string'
    ];

    public function organizations() {
        return $this->belongsTo('App\Organization');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }

}