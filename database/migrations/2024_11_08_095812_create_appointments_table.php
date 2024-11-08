<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('doctor_id');  // Certifique-se de que esse campo está correto
        $table->string('patient_name');
        $table->dateTime('appointment_date');
        $table->timestamps();

        // Relacionamentos
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
