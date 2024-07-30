<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('message_id'); // Foreign key for the original message
            $table->text('message'); // The reply message
            $table->string('reply_to'); // Email or identifier of the person replying
            $table->string('reply_from'); // Email or identifier of the person who is being replied to
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint if you have a messages table
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
