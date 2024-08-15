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
        Schema::create('jobinfos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->references('id')->on('users'); // Foreign key linking to the employers table
            $table->string('title');
            $table->text('description');
            $table->string('educational_level')->nullable();
            $table->string('location');
            $table->string('job_type');
            $table->string('salary');
            $table->date('date_posted');
            $table->text('benefits')->nullable(); // Adding benefits column
            $table->text('responsibilities')->nullable(); // Adding responsibilities column
            $table->text('qualifications')->nullable(); // Adding qualifications column
            $table->integer('vacancy'); // Adding vacancy column
            $table->string('company_name')->nullable(); // Adding company_name column
            $table->string('company_logo')->nullable(); // Adding company_logo column
            $table->integer('min_age'); // Adding min_age column
            $table->integer('max_age'); // Adding max_age column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobinfos');
    }
};
