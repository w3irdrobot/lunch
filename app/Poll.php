<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

/**
 * @property integer $id
 * @property string $closed_at
 * @property string $closed_by
 * @property integer $organization_id
 * @property string $created_at
 * @property string $updated_at
 */

class Poll extends Model {
    
    use ValidatingTrait;

    protected $table = 'polls';

    protected $fillable = ['closed_at', 'closed_by', 'organization_id'];

    protected $rules = [
        'closed_at' => 'date',
        'closed_by' => 'required|date',
        'organization_id' => 'exists:organizations,id|integer|min:0|required'
    ];

    public function organizations() {
        return $this->belongsTo('App\Organization','organization_id');
    }
    
    public function restaurants() {
        return $this->belongsToMany('App\Restaurant','polls_restaurants');
    }

    public function displayStatus() {
        if($this->closed_at) {
            return 'Complete';
        } else {
            return 'Open';
        }
    }
}