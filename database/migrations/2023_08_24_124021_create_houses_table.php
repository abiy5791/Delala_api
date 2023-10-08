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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('delala_id');
            $table->foreign('delala_id')->references('id')->on('users')->onDelete("cascade");
            $table->string('status');
            $table->boolean('approval')->default(0);
            $table->double('price');
            $table->double('area');
            $table->integer('bathrooms');
            $table->integer('bedrooms');
            $table->integer('parking');
            $table->string('type');
            $table->string('location');
            $table->string('details');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};