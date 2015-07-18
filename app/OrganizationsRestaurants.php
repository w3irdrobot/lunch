<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $restaurant_id
 * @property integer $organization_id
 * @property string $created_at
 * @property string $updated_at
 */

class OrganizationsRestaurants extends Model {

    protected $table = 'organizations_restaurants';
    protected $fillable = ['restaurant_id','organization_id'];
    protected $validations = ['restaurant_id' => 'exists:restaurants,id|integer|min:0|required',
                            'organization_id' => 'exists:organizations,id|integer|min:0|required'];
    
    public function OrdersOrganizations() {
        return $this->hasMany('App\OrdersOrganizations');
    }
    public function Organizations() {
        return $this->belongsTo('App\Organizations');
    }
    public function Restaurants() {
        return $this->belongsTo('App\Restaurants');
    }

}