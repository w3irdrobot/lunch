<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    public function organizationOrder() {
        return $this->belongsTo('\App\OrganizationOrder');
    }

    public function userOrder() {
        return $this->belongsTo('\App\UserOrder', 'user_order');
    }
}