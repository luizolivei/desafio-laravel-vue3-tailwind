<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('users')->insert([
            'id' => 999,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$Grcn80xNxgMRyuQHza3JeeP1n2DoP2VytkOtGo4awZ1/Z238h6bdK', // Hash da senha
            'role' => 2,
            'created_at' => '2024-08-09 06:45:27',
            'updated_at' => '2024-08-09 06:45:27',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
