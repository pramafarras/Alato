<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class PerformanceTest extends TestCase
{

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Retrieve an existing user from the database
        $this->user = User::where('email', 'pramafarras3@gmail.com')->first();

        // If the user doesn't exist, you might want to create one
        if (!$this->user) {
            $this->user = User::factory()->create([
                'email' => 'pramafarras3@gmail.com',
                // Add other necessary fields
            ]);
        }
    }

        private function simulateSelectionProcess($equipment, $bodyparts)
    {
        $this->get('/equipments'); // Simulate visiting the equipment selection page
        $this->get('/bodyparts/' . $equipment); // Simulate visiting the bodyparts selection page

        // Simulate storing the selections in the session
        session([
            'selectedEquipment' => $equipment,
            'filterworkout' => $bodyparts
        ]);
    }

    /**
     * Test the response time of the home page.
     *
     * @return void
     */
    public function testHomePageResponseTime()
    {
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

    public function testRegisterPageResponseTime()
    {
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/register');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

    public function testLoginPageResponseTime()
    {
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/login');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

    public function testEquipmentsPageResponseTime()
    {
        $this->actingAs($this->user);
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/equipments');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

    public function testBodypartsPageResponseTime()
    {
        $this->actingAs($this->user);
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/bodyparts/1');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

    public function testWorkoutPageResponseTime()
    {
        $this->actingAs($this->user);
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/workout');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Workout page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

        public function testFilteredWorkoutPageResponseTime()
    {
        $this->actingAs($this->user);

        // Simulate the selection process
        $selectedEquipment = 1; // Replace with an actual equipment ID from your database
        $selectedBodyParts = [16]; // Replace with actual bodypart IDs from your database
        $this->simulateSelectionProcess($selectedEquipment, $selectedBodyParts);

        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the workout page with filters
        $response = $this->get('/workout?equipment=' . $selectedEquipment . '&filterworkout[]=' . implode('&filterworkout[]=', $selectedBodyParts));

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Filtered workout page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(20, count($queries), 'Too many SQL queries executed');

        // Additional assertions to ensure the filtering worked correctly
        $response->assertStatus(200);
        $response->assertViewHas('workouts');
        $workouts = $response->viewData('workouts');
        $this->assertNotEmpty($workouts, 'No workouts returned after filtering');

        // You can add more specific assertions here to check if the returned workouts
        // match the selected equipment and bodyparts
    }

    public function testWorkoutDetailPageResponseTime()
    {
        $this->actingAs($this->user);
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/workout/1');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

    // public function testRateResponseTime()
    // {
    //     $this->actingAs($this->user);
    //     // Start the SQL query log
    //     DB::enableQueryLog();

    //     // Get the start time
    //     $startTime = microtime(true);

    //     // Make the request to the home page
    //     $response = $this->post('/addrating');

    //     // Get the end time
    //     $endTime = microtime(true);

    //     // Calculate the response time
    //     $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

    //     // Assert that the response time is within an acceptable limit
    //     $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

    //     // Check the number of SQL queries executed
    //     $queries = DB::getQueryLog();
    //     $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    // }

    public function testRatedlistPageResponseTime()
    {
        $this->actingAs($this->user);
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/ratedlist');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }

    public function testPlaylistPageResponseTime()
    {
        $this->actingAs($this->user);
        // Start the SQL query log
        DB::enableQueryLog();

        // Get the start time
        $startTime = microtime(true);

        // Make the request to the home page
        $response = $this->get('/myplaylist');

        // Get the end time
        $endTime = microtime(true);

        // Calculate the response time
        $responseTime = ($endTime - $startTime) * 1000; // Convert to milliseconds

        // Assert that the response time is within an acceptable limit
        $this->assertLessThan(500, $responseTime, 'Home page response time exceeds 500ms');

        // Check the number of SQL queries executed
        $queries = DB::getQueryLog();
        $this->assertLessThan(10, count($queries), 'Too many SQL queries executed');
    }


}
