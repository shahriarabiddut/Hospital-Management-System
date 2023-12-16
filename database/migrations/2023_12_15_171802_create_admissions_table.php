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
            $table->int('patient_id')->references('id')->on('users');
            $table->int('doctor_id')->references('id')->on('staff');
            $table->int('nurse_id')->references('id')->on('staff');
            $table->string('accomodation_type');
            $table->string('room_id')->references('id')->on('rooms');
            $table->date('check_in');
            $table->date('check_out');
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
