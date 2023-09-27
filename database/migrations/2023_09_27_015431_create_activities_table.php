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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('temporality');
            $table->string('schedule');
            $table->string('temporality');
            $table->string('request');
            $table->string('status');
            $table->string('patient_identification');
            $table->integer('user_id');
            $table->integer('medicine_id');
            $table->string('dose');
            $table->string('via');
            $table->string('via');
            $table->string('observations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
