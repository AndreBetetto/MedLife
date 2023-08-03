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
        Schema::create('exame_laudos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exame_id');
            $table->foreign('exame_id')
                ->references('id')->on('exames')->onDelete('cascade');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
                ->references('id')->on('pacientes')->onDelete('cascade');
            $table->date('dataLaudo');
            $table->string('nomearquivo');
            $table->date('random');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exame_laudos');
    }
};
