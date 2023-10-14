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
        Schema::create('clinic_history', function (Blueprint $table) {
            $table->id();
            $table->string('medic_identification');
            $table->string('patient_identification');
            $table->string('allergies');
            $table->string('prosthesis');
            $table->string('pathologies');
            $table->string('nec_oxi');
            $table->string('nec_nutri');
            $table->string('nec_elim');
            $table->string('nec_mov');
            $table->string('nec_repo');
            $table->string('nec_ima');
            $table->string('nec_term');
            $table->string('nec_hig');
            $table->string('nec_seg');
            $table->string('nec_com');
            $table->string('nec_val');
            $table->string('nec_lud');
            $table->string('nec_sex');
            $table->string('punt_nova');
            $table->string('punt_barth');
            $table->string('hygiene');
            $table->string('feeding');
            $table->string('dress');
            $table->string('elimination');
            $table->string('wandering');
            $table->string('grooming');
            $table->string('observations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_history');
    }
};
