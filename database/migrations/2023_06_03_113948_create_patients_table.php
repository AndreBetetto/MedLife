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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('nome');
            $table->string('cpf');
            $table->string('rg');
            $table->date('data_nasc');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('plano_saude');
            $table->string('sexo');
            $table->string('email');
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');



        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
