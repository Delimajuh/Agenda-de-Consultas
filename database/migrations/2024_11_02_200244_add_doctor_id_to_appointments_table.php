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
    Schema::table('appointments', function (Blueprint $table) {
        $table->foreignId('doctor_id')->constrained()->after('patient_name')->onDelete('cascade'); // Adiciona a coluna doctor_id
    });
}

public function down(): void
{
    Schema::table('appointments', function (Blueprint $table) {
        $table->dropForeign(['doctor_id']); // Remove a chave estrangeira
        $table->dropColumn('doctor_id'); // Remove a coluna doctor_id
    });
}

};
