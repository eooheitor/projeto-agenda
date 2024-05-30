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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->string('telefone')->nullable(false); 
            $table->date('data')->nullable(false);
            $table->time('hora')->nullable(false);
            $table->unsignedInteger('mesa')->nullable(false);
            $table->unsignedInteger('nropessoas')->nullable(false);
            $table->string('ocasiao', 100)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
