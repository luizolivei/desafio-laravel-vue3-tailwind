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
        Schema::create('experiencia_profissional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculo_id');
            $table->string('empresa');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->boolean('emprego_atual')->default(false);
            $table->string('localizacao');
            $table->enum('tipo', ['presencial', 'remoto', 'hibrido']);
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
        Schema::dropIfExists('experiencia_profissional');
    }
};
