<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */

class Restaurant extends Model {

    protected $table = 'restaurants';

    protected $fillable = ['name'];

    protected $validations = ['name' => 'max:255|string'];

}