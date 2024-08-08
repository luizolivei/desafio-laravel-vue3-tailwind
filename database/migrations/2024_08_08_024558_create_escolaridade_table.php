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
        Schema::create('escolaridade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculo_id');
            $table->string('escola');
            $table->string('tipo');
            $table->date('periodo_inicio');
            $table->date('periodo_fim')->nullable();
            $table->boolean('estudando_atualmente')->default(false);
            $table->string('local');
            $table->text('descricao')->nullable();
            $table->timestamps();

            $table->foreign('curriculo_id')->references('id')->on('curriculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolaridade');
    }
};
