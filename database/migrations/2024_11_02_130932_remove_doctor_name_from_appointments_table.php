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
    Schema::table('appointments', function (Blueprint $table) {
        $table->dropColumn('doctor_name');
    });
}

public function down()
{
    Schema::table('appointments', function (Blueprint $table) {
        $table->string('doctor_name')->nullable(); // Adiciona de volta caso precise reverter
    });
}

};
