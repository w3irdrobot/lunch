<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $poll_restaurant_id
 * @property string $created_at
 * @property string $updated_at
 */

class PollsResponses extends Model {

    protected $table = 'polls_responses';
    protected $fillable = ['user_id','poll_restaurant_id'];
    protected $validations = ['user_id' => 'exists:users,id|integer|min:0|required',
                            'poll_restaurant_id' => 'exists:polls_restaurants,id|integer|min:0|required'];
    
    public function PollsRestaurants() {
        return $this->belongsTo('App\PollsRestaurants');
    }
    public function Users() {
        return $this->belongsTo('App\Users');
    }

}