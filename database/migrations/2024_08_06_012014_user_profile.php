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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('cpf')->unique();
            $table->date('birth_date');
            $table->enum('gender', ['masculino', 'feminino', 'outro']);
            $table->string('marital_status');
            $table->string('education');
            $table->text('courses_specializations')->nullable();
            $table->text('professional_experience')->nullable();
            $table->decimal('salary_expectation', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
