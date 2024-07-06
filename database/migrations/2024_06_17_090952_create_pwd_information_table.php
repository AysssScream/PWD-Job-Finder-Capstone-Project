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
        Schema::create('pwd_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('disability')->nullable(false);
            $table->string('disabilityDetails')->nullable()->default(null);
            $table->string('disabilityOccurrence')->nullable(false);
            $table->string('otherDisabilityDetails')->nullable()->default(null);
            $table->string('pwdIdPicture')->nullable(false);
            $table->string('profilePicture')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pwd_information');
    }
};
