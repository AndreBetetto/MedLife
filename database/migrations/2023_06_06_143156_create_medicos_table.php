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
            $table->string('sobrenome');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->date('dataNasc');
            $table->enum(
                'sexo',[
                    'Masc',
                    'Fem'
                    ]);
            $table->string('cpf');
            $table->string('rg');
            $table->string('fone');
            $table->enum(
                'estadoCivil',[
                    'Solteiro',
                    'Casado',
                    'Separado',
                    'Divorciado',
                    'Viuvo'
                    ]);
            $table->string('especialidade');
            $table->string('crm');
            $table->date('primeiraConsulta'); //n precisa ser not null
            $table->date('ultimaConsulta'); //n precisa ser not null
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
