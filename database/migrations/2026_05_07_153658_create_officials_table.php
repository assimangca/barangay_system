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
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Added
            $table->string('position'); // Added
            $table->string('committee')->nullable(); // Added
            $table->string('photo_path')->nullable(); // Added
            $table->integer('rank')->default(0); // Added
            $table->boolean('is_active')->default(true); // Added
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officials');
    }
};