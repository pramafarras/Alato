<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function ratings(){
        return $this->belongsToMany(Rating::class, 'user_rate', 'user_id', 'id');
    }

    public function playlists(){
        return $this->hasMany(Playlist::class);
    }

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'user_workout', 'user_id', 'workout_id')
            ->withPivot('is_rated')
            ->withTimestamps();
    }

    public function ratedWorkouts()
    {
        return $this->belongsToMany(Workout::class, 'user_rate')
            ->withPivot('rating')
            ->withTimestamps();
    }


}
