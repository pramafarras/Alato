<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bodypart_workout', function (Blueprint $table) {
            $table->unsignedBigInteger('bodypart_id');
            $table->unsignedBigInteger('workout_id');

            $table->foreign('bodypart_id')->references('id')->on('bodyparts')->onDelete('cascade');
            $table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bodypart_workout');
    }
};
