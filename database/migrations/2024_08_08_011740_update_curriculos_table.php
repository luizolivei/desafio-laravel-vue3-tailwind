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
        Schema::table('curriculos', function (Blueprint $table) {
            $table->string('nome')->after('user_id');
            $table->string('email')->after('nome');
            $table->string('login')->after('email');
            $table->string('senha')->after('login');
            $table->string('cpf')->after('senha');
            $table->date('data_nascimento')->after('cpf');
            $table->string('sexo')->after('data_nascimento');
            $table->string('estado_civil')->after('sexo');
            $table->string('escolaridade')->after('estado_civil');
            $table->text('cursos')->nullable()->after('escolaridade');
            $table->text('experiencia_profissional')->nullable()->after('cursos');
            $table->decimal('pretencao_salarial', 8, 2)->nullable()->after('experiencia_profissional');
            $table->dropColumn('titulo');
            $table->dropColumn('descricao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curriculos', function (Blueprint $table) {
            //
        });
    }
};
