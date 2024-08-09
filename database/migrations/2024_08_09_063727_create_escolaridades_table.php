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
        Schema::create('escolaridade', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculo_id')->constrained('curriculos')->onDelete('cascade');
            $table->string('escola');
            $table->enum('tipo', ['presencial', 'online']);
            $table->date('periodo_inicio');
            $table->date('periodo_fim')->nullable();
            $table->boolean('estudando_atualmente')->default(false);
            $table->string('local');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('escolaridades');
    }
};
