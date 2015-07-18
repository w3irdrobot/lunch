<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'invitations';

    protected $fillable = ['email', 'token', 'organization_id'];

    public function organization() {
        return $this->belongsTo('\App\Organization');
    }
}
