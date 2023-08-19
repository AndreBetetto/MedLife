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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')
                ->references('id')->on('medicos')->onDelete('cascade');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
                ->references('id')->on('pacientes')->onDelete('cascade');
            $table->double('nivelDor')->nullable();
            $table->double('nivelFebre')->nullable();
            $table->longText('sintomas')->nullable();
            $table->longText('observacoes')->nullable();
            $table->enum(
                'status', [
                    'pendente',
                    'em andamento',
                    'finalizado'
                ]);
            $table->boolean('prioridadeMedico')->nullable();
            $table->string('grupo')->nullable();
            $table->string('tipo')->nullable();
            $table->enum(
                'sangramento', [
                    'muito',
                    'medio',
                    'pouco',
                    'nenhum'
                ]);
            $table->longText('medicamentos')->nullable();
            $table->longText('alergias')->nullable();
            $table->string('diagnotico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
