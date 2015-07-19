<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $restaurant_id
 * @property string $default
 * @property string $order
 * @property string $created_at
 * @property string $updated_at
 */

class UserOrder extends Model {

    use ValidatingTrait;
    
    protected $table = 'user_orders';

    protected $fillable = ['user_id', 'restaurant_id', 'default', 'order'];

    protected $rules = [
        'user_id' => 'exists:users,id|integer|min:0|required',
        'restaurant_id' => 'integer|min:0|required',
        'default' => 'integer|required',
        'order' => 'string'
    ];

    public function organizationOrders() {
        return $this->belongsTo('App\OrganizationOrder');
    }

    public function users() {
        return $this->belongsTo('App\User','user_id');
    }
    
    public function restaurant() {
        return $this->belongsTo('App\Restaurant','restaurant_id');
    }

}