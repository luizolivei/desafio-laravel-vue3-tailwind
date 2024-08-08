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
        Schema::table('curriculos', function (Blueprint $table) {
            $table->dropColumn('login');
            $table->dropColumn('senha');
        });
    }

    public function down()
    {
        Schema::table('curriculos', function (Blueprint $table) {
            $table->string('login')->after('email');
            $table->string('senha')->after('login');
        });
    }

};
