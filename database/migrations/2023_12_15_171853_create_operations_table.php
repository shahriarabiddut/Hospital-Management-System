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
            $table->integer('operation_id')->references('id')->on('operation_types');
            $table->integer('patient_id')->references('id')->on('users');
            $table->integer('doctor_id')->references('id')->on('staff');
            $table->integer('admission_id')->references('id')->on('admissions');
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
