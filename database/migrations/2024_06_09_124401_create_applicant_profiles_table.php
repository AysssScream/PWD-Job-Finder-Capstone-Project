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
        Schema::create('applicant_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('lastname', 20);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('firstname', 20);
            $table->string('middlename', 20)->nullable();
            $table->string('suffix')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('birthdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_profiles');
    }
};