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
        Schema::create('labours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('delala_id');
            $table->foreign('delala_id')->references('id')->on('users')->onDelete("cascade");
            $table->string('name');
            $table->string('skills');
            $table->string('type');
            $table->double('salary');
            $table->string('details');
            $table->string('image');
            $table->string('Gender');
            $table->double('age');
            $table->boolean('approval')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labours');
    }
};