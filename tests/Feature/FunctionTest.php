<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Workout;
use App\Models\Rating;
use App\Models\Playlist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FunctionTest extends TestCase
{
//     protected $user;
//     protected $workout;

//     protected function setUp(): void
//     {
//         parent::setUp();

//         // Retrieve an existing user from the database
//         $this->user = User::where('email', 'pramafarras4@gmail.com')->firstOrFail();;
//         $this->workout = Workout::findOrFail(2);
//         // If the user doesn't exist, you might want to create one
//         if (!$this->workout) {
//             $this->markTestSkipped('No existing workout found in the database.');
//         }
//     }
//         public function testAddRating()
//     {
//         $this->withoutExceptionHandling();
//         $this->actingAs($this->user);

//         $response = $this->post(route('workout.rate'), [
//             'workout_rating' => 4,
//             'workout_id' => $this->workout->id,
//         ]);

//         $response->assertStatus(302); // Redirect status

//         $this->assertDatabaseHas('user_rate', [
//             'user_id' => $this->user->id,
//             'workout_id' => $this->workout->id,
//             'rating' => 4,
//         ]);

//     }

//     public function testRemoveRating()
//     {
//         $this->actingAs($this->user);

//         $ratingId = Rating::where('user_id', $this->user->id)
//                                         ->where('workout_id', $this->workout->id)
//                                         ->first();
//         // $ratingId = 200;
//         // dd($ratingId);

//         $response = $this->delete(route('rating.remove', $ratingId));

//         $response->assertStatus(302); // Redirect status

//         $this->assertDatabaseMissing('user_rate', [
//             'id' => $ratingId,
//         ]);
//     }

// public function testAddToPlaylist()
// {
//     $this->actingAs($this->user);

//     $response = $this->post(route('workout.add-playlist', $this->workout->id), [
//         'playlist_name' => 'My New Playlist',
//     ]);

//     $response->assertStatus(302); // Redirect status

//     $this->assertDatabaseHas('playlists', [
//         'user_id' => $this->user->id,
//         'name' => 'My New Playlist',
//     ]);

//     $playlist = Playlist::where('user_id', $this->user->id)
//                                     ->where('name', 'My New Playlist')
//                                     ->first();
//     $this->assertNotNull($playlist);
//     // dd($playlist);
//     $this->assertTrue($playlist->workouts->contains($this->workout->id));
// }

// public function testRemoveFromPlaylist()
// {
//     $this->actingAs($this->user);

//     $playlist = Playlist::create([
//         'user_id' => $this->user->id,
//         'name' => 'Test Playlist',
//     ]);
//     $playlist->workouts()->attach($this->workout->id);

//     $response = $this->delete(route('playlist.remove', [$playlist->id, $this->workout->id]));

//     $response->assertStatus(302); // Redirect status
//     // Using assertDatabaseMissing
//     $this->assertDatabaseMissing('playlist_workout', [
//         'playlist_id' => $playlist->id,
//         'workout_id' => $this->workout->id,
//     ]);

//     // Or using doesntExist
//     // $this->assertTrue($playlist->fresh()->workouts()->where('workout_id', $this->workout->id)->doesntExist());
//     $this->assertFalse($playlist->workouts->contains($this->workout->id));
// }



}
