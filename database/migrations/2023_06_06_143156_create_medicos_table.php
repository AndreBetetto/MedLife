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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('id_medico');
            $table->string('cpf');
            $table->string('rg');
            $table->date('data_nasc');
            $table->string('telefone');
            $table->string('crm');
            $table->string('especialidade');
            $table->string('sexo');
            $table->foreign('id_medico')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
