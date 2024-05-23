<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    use HasFactory;

    /**
 * Get the instance as an array.
 *
 * @return array
 */
public function toArray()
{
    $attributes = parent::toArray();
    unset($attributes['image']);
    return $attributes;
}
    protected $table = 'equipments';

    // protected $fillable = [
    //     'name',
    //     'image',
    //   ];

    protected $fillable = ['name', 'image'];

    public function workouts()
    {
        return $this->hasMany(Workout::class, 'equipment_id');
    }
    public function bodyparts(){
        return $this->belongsToMany(Bodyparts::class, 'equipment_bodypart', 'equipment_id', 'bodypart_id');
    }


}
