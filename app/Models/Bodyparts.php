<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodyparts extends Model
{
    use HasFactory;


    protected $table = 'bodyparts';
    // protected $fillable = [
    //     'name',
    //     'category',
    //   ];
    public function category()
    {
        return $this->belongsTo(BodypartCategory::class, 'category_id');
    }

    public function equipments(){
        return $this->belongsToMany(Equipments::class,'equipment_bodypart', 'bodyparts_id' ,'equipments_id');
    }

    public function workouts(){
        return $this->belongsToMany(Workout::class, 'bodypart_workout', 'bodyparts_id', 'workouts_id');
    }
}
