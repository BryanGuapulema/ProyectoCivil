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
        Schema::table('rubros_m2', function (Blueprint $table) {
            $table->integer('EO_E2')->nullable();
            $table->integer('EO_D2')->nullable();
            $table->integer('EO_C2')->nullable();
            $table->integer('EO_C1')->nullable();
            $table->integer('EO_B3')->nullable();
            $table->integer('EO_B1')->nullable();
            $table->integer('GRUPO_I_EO_C1')->nullable();
            $table->integer('GRUPO_II_EO_C2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rubros_m2', function (Blueprint $table) {
            //
        });
    }
};
