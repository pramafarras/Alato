<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{


    //     private function performLogin(): \App\Models\User
    // {
    //     $user = User::factory()->create();
    //     $credentials = [
    //         'email' => $user->email,
    //         'password' => 'password', // Use the correct password for your application
    //     ];

    //     $response = $this->post('/login', $credentials);

    // //     // Add assertions or checks to ensure that the login was successful
    //     $response->assertStatus(302); // Assuming a successful login redirects
    //     $response->assertRedirect('/'); // Assuming a successful login redirects to the '/home' route

    //     return $user;
    // }
    // //     public function test_bodyparts_page_requires_authentication()
    // // {
    // //     $response = $this->get('/bodyparts/1');

    // //     $response->assertStatus(302);
    // //     $response->assertRedirect('/login');
    // // }

    // public function test_authenticated_user_can_access_bodyparts_page()
    // {
    //     $user = $this->performLogin();

    //     $response = $this->actingAs($user)
    //                  ->get('/bodyparts/1');

    //     $response->assertStatus(200);
    //     $response->assertSee('CHOOSE BODY PARTS');
    //     $response->assertSee('SUBMIT');
    //     $response->assertSee('Biceps');
    // }

}
