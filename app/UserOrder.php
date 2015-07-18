<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_organization_id
 * @property integer $restaurant_id
 * @property string $default
 * @property string $order
 * @property string $created_at
 * @property string $updated_at
 */

class UserOrder extends Model {

    protected $table = 'user_orders';

    protected $fillable = ['user_id', 'order_organization_id', 'restaurant_id', 'default', 'order'];

    protected $validations = [
        'user_id' => 'exists:users,id|integer|min:0|required',
        'order_organization_id' => 'exists:orders_organizations,id|integer|min:0|required',
        'restaurant_id' => 'integer|min:0|required',
        'default' => 'integer|required',
        'order' => 'string'
    ];

    public function organizationOrders() {
        return $this->belongsTo('App\OrganizationOrder');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }

}