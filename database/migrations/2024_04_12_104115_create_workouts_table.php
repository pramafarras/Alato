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
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id');
            $table->string('title');
            $table->text('execution');
            $table->text('tips');
            $table->string('bodypart');
            $table->longBlob('video')->nullable();
            $table->decimal('rate')->nullable();
            $table->timestamps();

            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
