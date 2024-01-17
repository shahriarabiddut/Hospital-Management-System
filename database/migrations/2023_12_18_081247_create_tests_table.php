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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('test1');
            $table->string('normalrange1');
            $table->string('test2')->nullable();
            $table->string('normalrange2')->nullable();
            $table->string('test3')->nullable();
            $table->string('normalrange3')->nullable();
            $table->string('test4')->nullable();
            $table->string('normalrange4')->nullable();
            $table->string('test5')->nullable();
            $table->string('normalrange5')->nullable();
            $table->string('test6')->nullable();
            $table->string('normalrange6')->nullable();
            $table->string('test7')->nullable();
            $table->string('normalrange7')->nullable();
            $table->string('test8')->nullable();
            $table->string('normalrange8')->nullable();
            $table->string('test9')->nullable();
            $table->string('normalrange9')->nullable();
            $table->string('test10')->nullable();
            $table->string('normalrange10')->nullable();
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
