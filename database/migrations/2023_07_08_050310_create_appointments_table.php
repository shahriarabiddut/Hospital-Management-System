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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->references('id')->on('users');
            $table->string('purpose');
            $table->string('department_id')->references('id')->on('departments');
            $table->string('doctor_id')->references('id')->on('staff');
            $table->date('date');
            $table->string('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
