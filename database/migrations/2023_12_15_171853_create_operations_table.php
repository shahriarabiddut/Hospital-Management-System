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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->int('patient_id')->references('id')->on('users');
            $table->int('doctor_id')->references('id')->on('staff');
            $table->int('admission_id')->references('id')->on('admissions');
            $table->string('ot_type');
            $table->date('date');
            $table->string('instruction');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
