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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('codigoLaudo')->constrained('laudos');
            $table->foreignId('paciente_id')->constrained('patients');
            $table->foreignId('medico_id')->constrained('medicos');
            $table->foreignId('user_id')->constrained('users');
            $table->string('tipoAgendamento');
            $table->enum(
                'status',
                [
                    'agendado',
                    'realizado',
                    'cancelado',
                ]);
            $table->string('arquivoLaudo')->nullable();
            $table->time('horaAgendamento');
            $table->date('dataAgendamento');
            $table->time('tempoConsulta');
            $table->string('medicoSolicitante');
            $table->string('guiaConsulta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
