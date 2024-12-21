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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('businessname', 100);
            $table->string('tinnumber', 15)->unique(); // Make tinnumber unique
            $table->string('tradename')->nullable();
            $table->enum('locationtype', ['Main', 'Branch']);
            $table->enum('employertype', ['Government', 'Private']);
            $table->enum('totalworkforce', ['1-10', '11-50', '51-100', '101-500', '501-1000', '1001+']);
            $table->string('address', 100);
            $table->string('city', 50);
            $table->string('contact_person', 50);
            $table->string('position', 50);
            $table->string('telephone_no', 8)->nullable();
            $table->string('mobile_no', 11);
            $table->string('fax_no')->nullable();
            $table->string('email_address', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
