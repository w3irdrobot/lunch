<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $closed_at
 * @property string $closed_by
 * @property integer $organization_id
 * @property string $created_at
 * @property string $updated_at
 */

class Polls extends Model {

    protected $table = 'polls';
    protected $fillable = ['closed_at','closed_by','organization_id'];
    protected $validations = ['closed_at' => 'date',
                            'closed_by' => 'required|date',
                            'organization_id' => 'exists:organizations,id|integer|min:0|required'];
    
    public function PollsRestaurants() {
        return $this->hasMany('App\PollsRestaurants');
    }
    public function Organizations() {
        return $this->belongsTo('App\Organizations');
    }

}