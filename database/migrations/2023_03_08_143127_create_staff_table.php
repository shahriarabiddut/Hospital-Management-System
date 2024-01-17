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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('type');
            $table->string('mobile');
            $table->string('address');
            $table->longText('bio')->nullable();
            $table->string('speciality_id')->nullable();
            $table->string('degree_id')->nullable();
            $table->string('fee')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
