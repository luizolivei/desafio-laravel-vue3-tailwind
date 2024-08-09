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
        Schema::create('curriculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nome');
            $table->string('email');
            $table->string('cpf');
            $table->date('data_nascimento');
            $table->enum('sexo', ['masculino', 'feminino', 'outro']);
            $table->enum('estado_civil', ['solteiro', 'casado', 'divorciado', 'viuvo']);
            $table->decimal('pretencao_salarial', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('curriculos');
    }
};
