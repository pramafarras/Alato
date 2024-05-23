<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function workouts(){
        return $this->belongsToMany(Workout::class, 'playlist_workout', 'playlist_id', 'workout_id');
    }
}