<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class LineItem extends Model
{
    use ValidatingTrait;
    
    protected $table = 'line_items';

    protected $fillable = ['organization_order_id','user_order','cost','paid'];

    protected $rules = [
        'organization_order_id' => 'exists:organization_orders,id|integer|min:0|required',
        'user_order' => 'exists:user_orders,id|integer|min:0|required',
    ];
    
    public function organizationOrder() {
        return $this->belongsTo('\App\OrganizationOrder');
    }

    public function userOrder() {
        return $this->belongsTo('\App\UserOrder', 'user_order');
    }
}