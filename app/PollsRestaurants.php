<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $poll_id
 * @property integer $restaurant_id
 * @property string $created_at
 * @property string $updated_at
 */

class PollsRestaurants extends Model {

    protected $table = 'polls_restaurants';
    protected $fillable = ['poll_id','restaurant_id'];
    protected $validations = ['poll_id' => 'exists:polls,id|integer|min:0|required',
                            'restaurant_id' => 'exists:restaurants,id|integer|min:0|required'];
    
    public function PollsResponses() {
        return $this->hasMany('App\PollsResponses');
    }
    public function Restaurants() {
        return $this->belongsTo('App\Restaurants');
    }
    public function Polls() {
        return $this->belongsTo('App\Polls');
    }

}