<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('civilStatus', 20);
            /*$table->string('city', 20); */
            $table->string('barangay', 20);
            $table->string('presentAddress', 50);
            $table->string('tin')->nullable()->default(null)->unique();
            $table->string('landlineNo', 8)->nullable()->default(null)->unique();
            $table->string('cellphoneNo', 11)->nullable()->default(null)->unique();
            ;
            $table->string('religion');

            $table->string('beneficiary_4ps');
            $table->string('ofw_status')->nullable()->default(null);
            $table->string('ofw_country')->nullable()->default(null);
            $table->string('ofw_return')->nullable()->default(null);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_infos');
    }
}
