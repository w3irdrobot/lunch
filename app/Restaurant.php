<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */

class Restaurant extends Model 
{
    use ValidatingTrait;
    
    protected $table = 'restaurants';

    protected $fillable = ['name'];

    protected $rules = ['name' => 'max:255|string|required|unique:restaurants'];
    
    public function pollRestaurants($poll_id) {
        $pollRestaurant = \App\PollRestaurant::where('restaurant_id','=',$this->id)->where('poll_id','=',$poll_id)->first();
        return $pollRestaurant;
    }

}