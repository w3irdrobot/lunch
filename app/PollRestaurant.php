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

class PollRestaurant extends Model {

    protected $table = 'polls_restaurants';

    protected $fillable = ['poll_id', 'restaurant_id'];

    protected $validations = [
        'poll_id' => 'exists:polls,id|integer|min:0|required',
        'restaurant_id' => 'exists:restaurants,id|integer|min:0|required',
    ];

    public function restaurants() {
        return $this->belongsTo('App\Restaurants');
    }
    
    public function polls() {
        return $this->belongsTo('App\Polls');
    }    
    
    public function users() {
        return $this->belongsToMany('App\User','polls_responses');
    }

}