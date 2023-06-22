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
        Schema::create('publico_votacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idvotacion');
            $table->unsignedBigInteger('idvotante');

            $table->foreign('idvotacion')
                ->references('id')->on('votaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('idvotante')
                ->references('id')->on('votantes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publico_votacions');
    }
};
