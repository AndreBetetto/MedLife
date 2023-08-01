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
        Schema::create('laudos', function (Blueprint $table) {
            $table->id();
            $table->string('codigoLaudo');
            $table->string('justificativaParaExame');
            $table->string('descricaoExame');
            $table->string('hipoteseDiagnostica');
            $table->string('conduta');
            $table->tinyInteger('idade');
            $table->double('peso');
            $table->double('altura');
            $table->string('observacoes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laudos');
    }
};
