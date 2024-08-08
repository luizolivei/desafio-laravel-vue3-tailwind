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
            $table->dropColumn('experiencia_profissional');
            $table->dropColumn('escolaridade');
            $table->dropColumn('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curriculos', function (Blueprint $table) {
            $table->json('experiencia_profissional')->nullable();
            $table->json('escolaridade')->nullable();
            $table->json('cursos')->nullable();
        });
    }
};
