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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forms_id')->nullable();
            $table->foreign('forms_id')->references('id')->on('form_diarios');
            $table->string('idBulaProtegida', 255)->nullable();
            $table->string('nome');
            $table->string('razaoSocial');
            $table->longText('observacao')->nullable();
            $table->boolean('generico')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
