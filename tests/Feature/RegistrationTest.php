<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{

// public function testRegistrationPageIsAccessible()
//     {
//         $response = $this->get('/register');
//         $response->assertStatus(200);
//     }

//     /**
//      * Test that a user can register successfully.
//      *
//      * @return void
//      */
//     public function testUserCanRegister()
//     {
//         $userData = [
//             'username' => 'testuser1',
//             'email' => 'testuser1@gmail.com',
//             'password' => 'password',
//             'password_confirmation' => 'password',
//         ];

//         $response = $this->post('/register', $userData);
//         $response->assertRedirect('/login'); // Assuming successful registration redirects to the home page

//         $this->assertDatabaseHas('users', [
//             'username' => 'testuser1',
//             'email' => 'testuser1@gmail.com',
//         ]);
//     }

//     /**
//      * Test that the registration form validates required fields.
//      *
//      * @return void
//      */
//     public function testRegistrationFormValidatesRequiredFields()
//     {
//         $userData = [
//             'username' => '',
//             'email' => '',
//             'password' => '',
//             'password_confirmation' => '',
//         ];

//         $response = $this->post('/register', $userData);
//         $response->assertSessionHasErrors(['username', 'email', 'password']);
//     }

}
