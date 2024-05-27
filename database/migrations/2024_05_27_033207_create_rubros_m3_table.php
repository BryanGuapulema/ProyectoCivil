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
        Schema::create('rubros_m3', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->decimal('b', 8, 2);
            $table->decimal('h', 8, 2);
            $table->decimal('l', 8, 2);
            $table->integer('cantidad');
            $table->decimal('hlosa', 8, 2);
            $table->decimal('factor_conversion', 8, 2);
            $table->decimal('volumen', 8, 2);
            $table->decimal('tiempo', 8, 2);
            $table->integer('EO_E2')->nullable();
            $table->integer('EO_D2')->nullable();
            $table->integer('EO_C2')->nullable();
            $table->integer('EO_C1')->nullable();
            $table->integer('EO_B3')->nullable();
            $table->integer('EO_B1')->nullable();
            $table->integer('GRUPO_I_EO_C1')->nullable();
            $table->integer('GRUPO_II_EO_C2')->nullable();
            $table->integer('total_personas');
            $table->decimal('rendimiento', 8, 2);
            $table->decimal('productividad', 8, 2);
            $table->string('evidencia')->nullable();            
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubros_m3');
    }
};
