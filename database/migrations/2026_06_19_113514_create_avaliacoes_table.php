<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone');
            $table->string('email')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('matricula')->nullable();
            $table->year('ano')->nullable();
            $table->integer('quilometros')->nullable();
            $table->text('observacoes')->nullable();
            $table->date('data_agendada');
            $table->time('hora_agendada');
            $table->enum('estado', ['pendente', 'confirmada', 'concluida', 'cancelada'])->default('pendente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};
