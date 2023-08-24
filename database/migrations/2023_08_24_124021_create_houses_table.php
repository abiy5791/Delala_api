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
            $table->boolean('approval');
            $table->double('price');
            $table->double('area');
            $table->string('location');
            $table->string('details');
            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete("cascade");
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