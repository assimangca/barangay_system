<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('donor_phone')->nullable();
            $table->string('project_name');
            $table->text('purpose');
            $table->decimal('amount', 10, 2);
            $table->string('reference_number')->unique();
            $table->enum('payment_method', ['gcash', 'bank_transfer', 'cash'])->default('cash');
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->string('proof_of_payment')->nullable();
            $table->text('message')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};