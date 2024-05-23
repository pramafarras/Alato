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
            $table->longText('execution');
            $table->longText('tips');
            $table->string('video');
            $table->timestamps();

            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('workouts');
    }
};
