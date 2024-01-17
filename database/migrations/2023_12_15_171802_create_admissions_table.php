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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->references('id')->on('users');
            $table->integer('doctor_id')->references('id')->on('staff');
            $table->integer('nurse_id')->references('id')->on('staff');
            $table->string('room_type_id')->references('id')->on('room_types');
            $table->string('room_id')->references('id')->on('rooms');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('seat');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
