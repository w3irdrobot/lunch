<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

/**
 * @property integer $id
 * @property integer $organization_restaurant_id
 * @property string $due_by
 * @property string $closed_at
 * @property string $created_at
 * @property string $updated_at
 */

class OrganizationOrder extends Model {
    
    use ValidatingTrait;

    protected $table = 'organization_orders';

    protected $fillable = ['organization_restaurant_id','due_by','closed_at'];

    protected $rules = [
        'organization_restaurant_id' => 'exists:organizations_restaurants,id|integer|min:0|required',
        'due_by' => 'required|date',
        'closed_at' => 'date'
    ];

    public function userOrders() {
        return $this->hasMany('App\LineItem');
    }
    
    public function restaurant() {
        return \App\Restaurant::join('organizations_restaurants','restaurants.id','=','organizations_restaurants.restaurant_id')
            ->join('organization_orders','organization_orders.organization_restaurant_id','=','organizations_restaurants.id')
            ->where('organization_orders.id','=',$this->id)
            ->select('restaurants.*')
            ->first();
    }
    
    public function displayStatus() {
        if($this->closed_at) {
            return 'Complete';
        } else {
            return 'Open';
        }
    }
    
    public function lineItems() {
        return $this->hasMany('App\LineItem','organization_order_id');
    }

}