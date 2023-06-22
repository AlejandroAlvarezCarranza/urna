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
        Schema::create('votaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_votacion',100);
            $table->string('fecha_inicio',100);
            $table->string('fecha_termino',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votaciones');
    }
};
