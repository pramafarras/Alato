<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $table = 'workouts';

    protected $fillable = [
        'title',
        'execution',
        'tips',
        'video',
      ];

    public function equipments()
    {
        return $this->belongsTo(Equipments::class, 'equipment_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class, 'workout_id', 'id');
    }


    public function bodyparts(){
        return $this->belongsToMany(Bodyparts::class, 'bodypart_workout', 'workout_id', 'bodypart_id');
    }


    public function playlists(){
        return $this->belongsToMany(Playlist::class, 'playlist_workout', 'workout_id','playlist_id');
    }

}
