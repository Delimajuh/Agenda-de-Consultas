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
        $table->dropColumn('doctor_name'); // Remover a coluna doctor_name
        $table->foreignId('doctor_id')->constrained()->after('patient_name')->onDelete('cascade'); // Adicionar a coluna doctor_id
    });
}

public function down(): void
{
    Schema::table('appointments', function (Blueprint $table) {
        $table->string('doctor_name'); // Adicionar a coluna doctor_name de volta
        $table->dropForeign(['doctor_id']); // Remover a chave estrangeira
        $table->dropColumn('doctor_id'); // Remover a coluna doctor_id
    });
}

};
