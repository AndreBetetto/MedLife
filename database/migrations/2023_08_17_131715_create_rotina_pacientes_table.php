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
        Schema::create('rotina_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
                ->references('id')->on('pacientes')->onDelete('cascade');
            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')
                ->references('id')->on('medicos')->onDelete('cascade');
            $table->date('dataCheckup');
            $table->integer('nivelDor'); 
            $table->double('febre'); 
            $table->integer('sangramento');
            $table->string('observacoes');
            $table->string('medicamentos');
            $table->unsignedBigInteger('exame_id')->nullable();
            $table->foreign('exame_id')
                ->references('id')->on('exames')->onDelete('cascade');
            $table->enum(
                'grupo',
                [
                    'pos-operatorio',
                    'pre-operatorio',
                    'exameRotina',
                    'consultaRotina',
                    'consultaEspecializada',
                    'outros'
                ]
                );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotina_pacientes');
    }
};
