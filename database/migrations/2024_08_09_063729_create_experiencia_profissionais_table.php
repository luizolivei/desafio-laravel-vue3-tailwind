<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('experiencia_profissional', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculo_id')->constrained('curriculos')->onDelete('cascade');
            $table->string('empresa');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->boolean('emprego_atual')->default(false);
            $table->string('localizacao');
            $table->enum('tipo', ['estagio', 'temporario', 'efetivo', 'freelance', 'voluntario']);
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('experiencia_profissionais');
    }
};
