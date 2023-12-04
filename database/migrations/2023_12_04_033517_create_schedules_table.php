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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();

            // $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->string('title')->nullable();
            // $table->string('start_time')->nullable();
            // $table->string('end_time')->nullable();
            // // Add other schedule-related columns

            // // Foreign key relationship
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
