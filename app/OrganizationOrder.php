<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $organization_restaurant_id
 * @property string $due_by
 * @property string $closed_at
 * @property string $created_at
 * @property string $updated_at
 */

class OrganizationOrder extends Model {

    protected $table = 'organization_orders';

    protected $fillable = ['organization_restaurant_id','due_by','closed_at'];

    protected $validations = [
        'organization_restaurant_id' => 'exists:organizations_restaurants,id|integer|min:0|required',
        'due_by' => 'required|date',
        'closed_at' => 'date'
    ];

    public function userOrders() {
        return $this->hasMany('App\UserOrder');
    }

}