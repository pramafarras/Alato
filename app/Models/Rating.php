<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'user_rate';

    protected $fillable = ['user_id', 'workout_id', 'rating']; // Allow rating to be filled

    public $incrementing = true;
    public function users(){
        return $this->belongsTo(User::class);
    }


    public function workouts()
    {
        return $this->belongsTo(Workout::class);
    }

}
