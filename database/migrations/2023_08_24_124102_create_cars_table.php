<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('delala_id');
            $table->foreign('delala_id')->references('id')->on('users')->onDelete("cascade");
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('mileage');
            $table->string('fueltype');
            $table->string('color');
            $table->double('price');
            $table->string('details');
            $table->string('image');
            $table->boolean('approval')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};