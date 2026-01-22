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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');

            // FK a areas
            $table->foreignId('departamento')
                  ->constrained('areas')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            // FK a tipos_documentos
            $table->foreignId('tipo')
                  ->constrained('tipos_documentos')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('clave')->nullable();
            $table->string('revision')->nullable();

            $table->date('vigencia')->nullable();
            $table->date('fecha_revision')->nullable();

            $table->string('sustituye')->nullable();

            // Nombre o ruta del archivo
            $table->string('documento');

            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
