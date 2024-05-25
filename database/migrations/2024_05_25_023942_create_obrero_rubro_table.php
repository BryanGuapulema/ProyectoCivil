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
        Schema::create('obrero_rubro', function (Blueprint $table) {
            $table->foreignId('rubro_id')->constrained()->onDelete('cascade');
            $table->foreignId('obrero_id')->constrained()->onDelete('cascade');           
            $table->primary(['rubro_id', 'obrero_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obrero_rubro');
    }
};
