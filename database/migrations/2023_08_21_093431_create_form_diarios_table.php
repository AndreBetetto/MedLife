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
        Schema::create('form_diarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')
                ->references('id')->on('medicos')->onDelete('cascade');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
                ->references('id')->on('pacientes')->onDelete('cascade');
            $table->integer('numDias'); //numero de dias que o paciente deve responder o form
            $table->longText('observacoes')->nullable();
            $table->longText('medicamentos')->nullable();
            $table->string('diagnostico')->nullable();
            $table->enum(
                'status',
                [
                    'Aguardando',
                    'Em andamento',
                    'Finalizado'
                ]
            )->default('Aguardando');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_diarios');
    }
};
