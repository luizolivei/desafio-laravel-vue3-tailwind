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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculo_id')->constrained('curriculos')->onDelete('cascade');
            $table->string('nome');
            $table->string('local');
            $table->integer('carga_horaria');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
