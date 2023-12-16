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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->int('patient_id')->references('id')->on('users');
            $table->int('doctor_id')->references('id')->on('staff');
            $table->int('admission_id')->references('id')->on('admissions');
            $table->string('diagnosis');
            $table->string('prescription');
            $table->int('price');
            $table->int('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
