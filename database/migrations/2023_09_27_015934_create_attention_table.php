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
        Schema::create('attention', function (Blueprint $table) {
            $table->id();
            $table->integer('activity');
            $table->string('activity_name');
            $table->string('user_id');
            $table->string('hour');
            $table->date('date_for');
            $table->string('comments');
            $table->string('permissions');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attention');
    }
};
