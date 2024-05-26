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
        Schema::create('rubros_m2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->decimal('ancho', 8, 2);
            $table->decimal('longitud', 8, 2);
            $table->integer('cantidad');
            $table->decimal('area', 8, 2);
            $table->decimal('tiempo', 8, 2);
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
        Schema::dropIfExists('rubros_m2');
    }
};
